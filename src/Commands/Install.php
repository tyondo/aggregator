<?php

namespace Tyondo\Aggregator\Commands;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Exception;
use Tyondo\Aggregator\Models\User;
use Tyondo\Aggregator\Helpers\ConfigHelper;

class Install extends AggregatorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aggregator:install {--y|y : Skip question?} {--views : Also publish Aggregator views.} {--f|force : Overwrite existing files.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Aggregator install wizard';

    /**
     * Create a new command instance.
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * If the aggregator_installed.lock file is found in the storage/ directory
     * the installer will not execute.
     *
     * @return mixed
     */
    public function handle()
    {
        if (file_exists(storage_path('aggregator_installed.lock'))) {
            $this->line('<info>✔</info> Aggregator has already been installed.');
        } else {
           // $config = ConfigHelper::getWriter();

            // Gather the options...
            $force = $this->option('force') ?: false;
            $withViews = $this->option('views') ?: false;

            $this->comment(PHP_EOL.'Welcome to the Tyondo Aggregator Install Wizard! You\'ll be up and running in no time...');

            // Attempt to link storage/app/public folder to public/storage;
            // This won't work on an OS without symlink support (e.g. Windows)
            try {
                Artisan::call('storage:link');
            } catch (Exception $e) {
                $this->line(PHP_EOL.'Could not link <info>storage/app/public</info> folder to <info>public/storage</info>:');
                $this->line("<error>✘</error> {$e->getMessage()}");
            }


            try {
                // Publish config files...
                Artisan::call('aggregator:publish:config', [
                    '--y' => true,
                    '--force' => true,
                ]);
                // Publish migration files...
             /*   Artisan::call('aggregator:publish:migrations', [
                    '--y' => true,
                    '--force' => true,
                ]);
             */
                // Publish public assets...
                Artisan::call('aggregator:publish:assets', [
                    '--y' => true,
                    '--force' => true,
                ]);
                // Publish aggregator extra package files...
                Artisan::call('aggregator:publish:packages', [
                    '--y' => true,
                    '--force' => true,
                ]);
                // Publish view files...
                if ($withViews) {
                    Artisan::call('aggregator:publish:views', [
                        '--y' => true,
                        '--force' => $force,
                    ]);
                }

                // Set up the database...
               // if (! (SetupHelper::requiredTablesExists())) {
                    $this->comment(PHP_EOL.'Setting up your database...');
                    $exitCode = Artisan::call('migrate', [
                        //'--path' => realpath(__DIR__.'/../Database/migrations'),
                    ]);
                    $exitCode = Artisan::call('db:seed', [
                        '--class' => 'Tyondo\Aggregator\Database\seeds\DatabaseSeeder',
                    ]);
                    $this->progress(5);
                    $this->line(PHP_EOL.'<info>✔</info> Success! Your database is set up and configured.');
               // }

                $createUser = $this->option('y') ?: false;
                if (! $createUser) {
                    $createUser = $this->confirm('Do you want to create Admin?');
                }
                if($createUser){
                    $this->comment(PHP_EOL.'Please provide the following information. Don\'t worry, you can always change these settings later.');

                    // Admin user information...
                    $this->comment(PHP_EOL.'<info>Step 1/6: Creating the admin user account</info>');
                    $email = $this->ask('Email');
                    $password = $this->secret('Password');
                    $firstName = $this->ask('First name');
                    $lastName = $this->ask('Last name');
                    $this->createUser($email, $password, $firstName, $lastName);
                    $this->line(PHP_EOL.'<info>✔</info> Success! Your admin user account has been created.');

                    $this->progress(5);
                }else{
                    $this->progress(5);
                }
                $this->info('Adding Aggregator routes to routes/web.php');
                File::append(
                    base_path('routes/web.php'),
                    "\n\nRoute::group(['prefix' => 'aggregator'], function () {\n    Aggregator::routes();\n});\n"
                );


                // Clear the caches...
                Artisan::call('cache:clear');
                Artisan::call('view:clear');
                Artisan::call('route:clear');

                $this->line(PHP_EOL.'<info>✔</info> Aggregator has been installed. Pretty easy huh?'.PHP_EOL);

                $this->line(PHP_EOL);

               // $config->save();
            } catch (Exception $e) {
                // Rollback migrations
                // Artisan::call('migrate:rollback');
                // Remove install file
                //$this->uninstalled();
                // Display message
                $this->line(PHP_EOL.'<error>An unexpected error occurred. Installation could not continue.</error>');
                $this->error("✘ {$e->getMessage()}");
                $this->comment(PHP_EOL.'Please run the installer again.');
                $this->line(PHP_EOL.'If this error persists please consult tyondo Enterprise.'.PHP_EOL);
            }
        }
    }
}

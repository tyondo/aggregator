<?php

namespace Tyondo\Aggregator\Commands;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Exception;
use Tyondo\Aggregator\Models\User;
use Illuminate\Console\Command;

class AggregatorCommand extends Command
{
    /**
     * @constant(ROLE_ADMINISTRATOR)
     */
    const ROLE_ADMINISTRATOR = 1;
    /**
     * @constant(INSTALLED_FILE)
     */
    const INSTALLED_FILE = 'aggregator_installed.lock';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function progress($tasks)
    {
        $bar = $this->output->createProgressBar($tasks);

        for ($i = 0; $i < $tasks; $i++) {
            time_nanosleep(0, 200000000);
            $bar->advance();
        }

        $bar->finish();
    }

    protected function title($blogTitle)
    {
        $settings = new Settings();
        $settings->setting_name = 'blog_title';
        $settings->setting_value = $blogTitle;
        $settings->save();
        $this->comment('Saving blog title...');
        $this->progress(1);
    }

    protected function subtitle($blogSubtitle)
    {
        $settings = new Settings();
        $settings->setting_name = 'blog_subtitle';
        $settings->setting_value = $blogSubtitle;
        $settings->save();
        $this->comment('Saving blog subtitle...');
        $this->progress(1);
    }

    protected function description($blogDescription)
    {
        $settings = new Settings();
        $settings->setting_name = 'blog_description';
        $settings->setting_value = $blogDescription;
        $settings->save();
        $this->comment('Saving blog description...');
        $this->progress(1);
    }

    protected function seo($blogSeo)
    {
        $settings = new Settings();
        $settings->setting_name = 'blog_seo';
        $settings->setting_value = $blogSeo;
        $settings->save();
        $this->comment('Saving blog SEO keywords...');
        $this->progress(1);
    }

    protected function postsPerPage($postsPerPage, $config)
    {
        $config->set('posts_per_page', intval($postsPerPage));
        $this->comment('Saving posts per page...');
        $this->progress(1);
    }

    protected function disqus()
    {
        $settings = new Settings();
        $settings->setting_name = 'disqus_name';
        $settings->setting_value = null;
        $settings->save();
    }

    protected function googleAnalytics()
    {
        $settings = new Settings();
        $settings->setting_name = 'ga_id';
        $settings->setting_value = null;
        $settings->save();
    }

    protected function twitterCardType()
    {
        $settings = new Settings();
        $settings->setting_name = 'twitter_card_type';
        $settings->setting_value = 'none';
        $settings->save();
    }

    protected function socialHeaderIcons()
    {
        $settings = new Settings();
        $settings->setting_name = 'social_header_icons_user_id';
        $settings->setting_value = 1;
        $settings->save();
    }

    protected function installed()
    {
        $settings = new Settings();
        $settings->setting_name = 'installed';
        $settings->setting_value = time();
        $settings->save();

        // Write installed lock file.
        File::put(storage_path($this::INSTALLED_FILE), $settings->setting_value);
    }

    protected function uninstalled()
    {
        // Remove installed lock file.
        try {
            File::delete(storage_path($this::INSTALLED_FILE));
        } catch (Exception $e) {
            $this->line(PHP_EOL.'Could not delete install file. You may need to delete '
                .storage_path($this::INSTALLED_FILE).' manually.');
            $this->line("<error>✘</error> {$e->getMessage()}");
        }
    }



    protected function createUser($email, $password, $firstName, $lastName)
    {
        $user = User::firstOrCreate(['email' => $email]);
        $user->password = bcrypt($password);
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->name = $firstName.' '.$lastName;
        $user->role = $this::ROLE_ADMINISTRATOR;
        $user->save();

        //$this->author($user->name);
        $this->comment('Saving admin user account...');
        $this->progress(1);
    }

    protected function author($blogAuthor)
    {
        $settings = new Settings();
        $settings->setting_name = 'blog_author';
        $settings->setting_value = $blogAuthor;
        $settings->save();
    }

    protected function rebuildSearchIndexes()
    {
        $this->comment(PHP_EOL.'Building the search index...');

        // Remove existing index files, could possibly throw an exception
        try {
            if (file_exists(storage_path('canvas_posts.index'))) {
                unlink(storage_path('canvas_posts.index'));
            }
            if (file_exists(storage_path('canvas_users.index'))) {
                unlink(storage_path('canvas_users.index'));
            }
            if (file_exists(storage_path('canvas_tags.index'))) {
                unlink(storage_path('canvas_tags.index'));
            }
        } catch (Exception $e) {
            $this->line(PHP_EOL.'<error>✘</error> '.$e->getMessage());
        }

        // Build the new indexes...
        $exitCode = Artisan::call('canvas:index');
        $this->progress(5);
        $this->line(PHP_EOL.'<info>✔</info> Success! The application search index has been built.');
    }
}

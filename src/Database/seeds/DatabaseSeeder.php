<?php

namespace Tyondo\Aggregator\Database\seeds;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('Tyondo\Aggregator\Database\seeds\CategoriesTableSeeder');
         $this->call('Tyondo\Aggregator\Database\seeds\PostsTableSeeder');

    }
}

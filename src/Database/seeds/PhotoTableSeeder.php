<?php
namespace Tyondo\Aggregator\Database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('photos')->insert([
          'file' => 'user.png',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
       // $this->runQuery();
    }

    private function runQuery (){
        $conn = new \mysqli(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE'));

        $file_handle = fopen(realpath(__DIR__.'/rawPhoto.sql'),"r");
        while (!feof($file_handle)) {
            $sql = fgets($file_handle);
            $conn->query($sql);
        }
        fclose($file_handle);
        $conn->close();
    }
}

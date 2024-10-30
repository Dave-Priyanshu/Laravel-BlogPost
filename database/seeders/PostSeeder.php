<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //json path
        $jsonFilePath = database_path('posts.json');

        //check if the file exists
        if(File::exists($jsonFilePath)){
            //read the json file
            $jsonData = File::get($jsonFilePath);

            //decode the json file
            $data = json_decode($jsonData,true);

            //insert data into the database
            foreach($data as $item){
                DB::table('posts')->insert($item);
            }
        }
        else{
            echo "File not found: ".$jsonFilePath ."\n";
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
                'post_id'=>'1',
                'image_url'=>'https://res.cloudinary.com/dd1zbryx2/image/upload/v1692620969/img.score1_aj2bjz.jpg',
            ]);
        DB::table('images')->insert([
                'post_id'=>'2',
                'image_url'=>'https://res.cloudinary.com/dd1zbryx2/image/upload/v1692620969/img.score1_aj2bjz.jpg',
            ]);
        DB::table('images')->insert([
                'post_id'=>'3',
                'image_url'=>'https://res.cloudinary.com/dd1zbryx2/image/upload/v1692620969/img.score1_aj2bjz.jpg',
            ]);
        DB::table('images')->insert([
                'post_id'=>'4',
                'image_url'=>'https://res.cloudinary.com/dd1zbryx2/image/upload/v1692620969/img.score1_aj2bjz.jpg',
            ]);
    }
}

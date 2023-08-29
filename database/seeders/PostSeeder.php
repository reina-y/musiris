<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('posts')->insert([
                'user_id'=> '1',
                'title' => 'title1',
                'image_url' => 'sample.png',
                'instruments' => 'piano,vocal',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
            
            DB::table('posts')->insert([
                'user_id'=> '1',
                'title' => 'title2',
                'image_url' => 'sample.png',
                'instruments' => 'trumpetto,piano',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
            
            DB::table('posts')->insert([
                'user_id'=> '2',
                'title' => 'title3',
                'image_url' => 'sample.png',
                'instruments' => 'violin,viola,cello',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
            
            DB::table('posts')->insert([
                'user_id'=> '4',
                'title' => 'title4',
                'image_url' => 'sample.png',
                'instruments' => 'flute,violin,viola,cello',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
    }
}

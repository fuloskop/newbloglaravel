<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'user_id' => random_int(1,1) ,
            'title' =>  Str::random(32),
            'content' =>  Str::random(32)
        ]);
        Post::create([
            'user_id' => random_int(1,1) ,
            'title' =>  Str::random(32),
            'content' =>  Str::random(32)
        ]);
        Post::create([
            'user_id' => random_int(1,1) ,
            'title' =>  Str::random(32),
            'content' =>  Str::random(32)
        ]);
        Post::create([
            'user_id' => random_int(1,1) ,
            'title' =>  Str::random(32),
            'content' =>  Str::random(32)
        ]);Post::create([
        'user_id' => random_int(1,1) ,
        'title' =>  Str::random(32),
        'content' =>  Str::random(32)
    ]);
    }
}

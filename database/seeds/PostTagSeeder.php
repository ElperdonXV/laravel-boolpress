<?php

use Illuminate\Database\Seeder;
use App\Model\Post;
use App\Model\Tag;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //associare ad ogni tag più di un post 
        $tags = Tag::all();
        foreach($tags as $tag){
            $posts = Post::inRandomOrder()->limit(3)->get();
            $tag->posts()->attach($posts);
        }
    }
}

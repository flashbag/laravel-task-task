<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
        	[
        		'title' => 'bridge',
        		'body' => 'some text'
        	],
        	[
        		'title' => 'car',
        		'body' => 'some text'
        	],
        	[
        		'title' => 'cat',
        		'body' => 'some text'
        	],
        	[
        		'title' => 'nature',
        		'body' => 'some text'
        	],
        	[
        		'title' => 'bitcoin',
        		'body' => 'some text'
        	],
        	[
        		'title' => 'tech',
        		'body' => 'some text'
        	],
        	[
        		'title' => 'bike',
        		'body' => 'some text'
        	],
        	[
        		'title' => 'lenovo',
        		'body' => 'some text'
        	],
        	[
        		'title' => 'phone',
        		'body' => 'some text'
        	],
        	[
        		'title' => 'secret',
        		'body' => 'some text'
        	],
        	[
        		'title' => 'buddha',
        		'body' => 'some text'
        	],
        	[
        		'title' => 'clock',
        		'body' => 'some text'
        	],
        	[
        		'title' => 'death',
        		'body' => 'some text'
        	],

        ];

        foreach ($posts as $key => $value) {
        	Post::create($value);
        }


    }
}

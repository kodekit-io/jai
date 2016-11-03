<?php

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
        factory(App\Models\Post::class, 50)->create()->each(function($u) {
            $image = rand(51, 55);
            $u->details()->save(factory(App\Models\PostDetail::class)->make());
            $u->medias()->attach($image, ['media_type' => 'featured']);
        });
    }
}

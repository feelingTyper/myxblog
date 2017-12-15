<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::truncate();
        \App\Post::truncate();
        \App\Category::truncate();
        \App\Tag::truncate();
        Model::unguard();

        factory(App\Category::class)->create(['name' => 'Android']);
        factory(App\Category::class)->create(['name' => 'Java']);
        factory(App\Category::class)->create(['name' => 'Php']);
        factory(App\Category::class)->create(['name' => 'Spring']);
        factory(App\Category::class)->create(['name' => 'Laravel']);
        factory(App\Category::class)->create(['name' => 'Vue']);
        factory(App\Category::class)->create(['name' => 'Js']);
        
        factory(App\User::class, 'admin')->create();
    }
}

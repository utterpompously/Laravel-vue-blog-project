<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,10)->create();
        factory(App\Model\Categorie::class,20)->create();
        factory(App\Model\Post::class,20)->create();
    }
}

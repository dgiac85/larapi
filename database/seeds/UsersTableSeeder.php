<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,50)->create(); //con make si creerebbe un array sul quale ciclare senza metterlo ne db
        
    }
}

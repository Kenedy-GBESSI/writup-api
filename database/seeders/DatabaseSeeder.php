<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

         \App\Models\Role::create([
            'name' => 'user',
            'description' => 'A simple user',
         ]);
        
         \App\Models\Role::create([
            'name' => 'user',
            'description' => 'A manager of the website',
         ]);
        
    }
}

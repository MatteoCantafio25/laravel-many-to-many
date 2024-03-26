<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();

        
        \App\Models\User::factory()->create([
            'name' => 'Matteo',
            'email' => 'matteo@ciao.it',
        ]);
        
        $this->call([TypeSeeder::class, TechnologySeeder::class]);
        
        \App\Models\Project::factory(5)->create();

    }
}

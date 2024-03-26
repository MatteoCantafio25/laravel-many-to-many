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
        
        // Se uso la factory per fare l'attach delle tecnologie devo creare le tecnologie prima di creare il project
        $this->call([TypeSeeder::class, TechnologySeeder::class]);
        
        \App\Models\Project::factory(5)->create();
        
        // Se voglio usare il seeder per fare l'attach delle tecnologie prima devo creare il Project
        //$this->call(TechnologySeeder::class);
    }
}

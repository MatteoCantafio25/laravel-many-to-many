<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $project_ids = Project::pluck('id')->toArray();
        
        $technologies = [
            ['label' => 'HTML', 'color' => 'danger'],
            ['label' => 'CSS', 'color' => 'primary'],
            ['label' => 'ES6', 'color' => 'warning'],
            ['label' => 'Bootstrap', 'color' => 'danger'],
            ['label' => 'Vue', 'color' => 'success'],
            ['label' => 'SQL', 'color' => 'secondary'],
            ['label' => 'PHP', 'color' => 'info'],
            ['label' => 'Laravel', 'color' => 'danger'],
        ];

        foreach($technologies as $tech){
            $new_tech = new Technology();

            $new_tech->label = $tech['label'];
            $new_tech->color = $tech['color'];

            $new_tech ->save();

            $tech_projects = [];

            //? primo metodo 
            /* foreach($project_ids as $project_id){
                if(rand(0, 1))$tech_projects[] = $project_id;
            } */

            //? secondo metodo
            // $tech_projects = array_filter($project_ids, fn() => rand(0,1));

            // $new_tech->projects()->attach($tech_projects);
        }
    }
}

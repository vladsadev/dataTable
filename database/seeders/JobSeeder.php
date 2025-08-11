<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creamos la etiqueta
        $tag = Tag::factory(3)->create();

        //ejecutamos la factoría de JOB asignando la etiqueta creada anteriormente
        Job::factory(10)->hasAttached($tag)->create();
    }
}

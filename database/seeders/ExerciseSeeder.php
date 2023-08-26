<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('exercises')->insert([
            [
                'exercise'=>'This is the first question.',
                'title'=>'title1'
            ],
            [
                'exercise'=>'This is the second question11111111111111',
                'title'=>'title2'
            ]

        ]);

    }
}

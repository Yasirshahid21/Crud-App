<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $courses = [
            'React js',
            'Laravel',
            'Dot Net',
            'Angular'
         ];
      
         foreach ($courses as $course) {
              Course::create(['name' => $course ]);
         }
    }
}

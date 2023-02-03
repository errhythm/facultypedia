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
        \App\Models\User::factory(50)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // create courses

        \App\Models\Courses::create([
            'course_code' => 'CSE100',
            'course_title' => 'INTRODUCTION TO COMPUTING',
            'course_credit' => 3,
        ]);
        \App\Models\Courses::create([
            'course_code' => 'CSE101',
            'course_title' => 'INTRODUCTION TO COMPUTER SCIENCE',
            'course_credit' => 3,
        ]);
        \App\Models\Courses::create([
            'course_code' => 'CSE110',
            'course_title' => 'PROGRAMMING LANGUAGE I',
            'course_credit' => 3,
        ]);
        \App\Models\Courses::create([
            'course_code' => 'CSE111',
            'course_title' => 'PROGRAMMING LANGUAGE-II',
            'course_credit' => 3,
        ]);
        \App\Models\Courses::create([
            'course_code' => 'CSE115',
            'course_title' => 'INTRODUCTION TO COMPUTER SCIENCE',
            'course_credit' => 3,
        ]);
        \App\Models\Courses::create([
            'course_code' => 'CSE120',
            'course_title' => 'PROGRAMMING LANGUAGE II',
            'course_credit' => 3,
        ]);
        \App\Models\Courses::create([
            'course_code' => 'CSE121',
            'course_title' => 'CIRCUITS AND ELECTRONICS',
            'course_credit' => 3,
        ]);
        \App\Models\Courses::create([
            'course_code' => 'CSE161',
            'course_title' => 'COMPUTER PROGRAMMING',
            'course_credit' => 3,
        ]);
        \App\Models\Courses::create([
            'course_code' => 'CSE163',
            'course_title' => 'COMPUTER PROGRAMMING II',
            'course_credit' => 3,
        ]);
        \App\Models\Courses::create([
            'course_code' => 'CSE210',
            'course_title' => 'DATA STRUCTURES',
            'course_credit' => 3,
        ]);
        \App\Models\Courses::create([
            'course_code' => 'CSE211',
            'course_title' => 'DISCRETE MATHEMATICS',
            'course_credit' => 3,
        ]);
        \App\Models\Courses::create([
            'course_code' => 'CSE220',
            'course_title' => 'DATA STRUCTURES',
            'course_credit' => 3,
        ]);
        \App\Models\Courses::create([
            'course_code' => 'CSE221',
            'course_title' => 'ALGORITHMS',
            'course_credit' => 3,
        ]);
        \App\Models\Courses::create([
            'course_code' => 'CSE230',
            'course_title' => 'DISCRETE MATHEMATICS',
            'course_credit' => 3,
        ]);

        \App\Models\Faculties::factory(50)->create();
    }
}

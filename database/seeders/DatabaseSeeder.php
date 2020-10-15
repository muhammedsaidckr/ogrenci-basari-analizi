<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        Exam::factory(150)->create();
        Student::factory(100)->create();
//        User::factory(1000)->create();
    }
}

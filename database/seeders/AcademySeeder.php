<?php

namespace Database\Seeders;

use App\Models\Academy;
use Illuminate\Database\Seeder;

class AcademySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Academy::create([
            'name' => 'Backend Development'
        ]);
        Academy::create([
            'name' => 'Frontend Development'
        ]);
        Academy::create([
            'name' => 'Marketing'
        ]);
        Academy::create([
            'name' => 'Data Science'
        ]);
        Academy::create([
            'name' => 'Design'
        ]);
        Academy::create([
            'name' => 'QA'
        ]);
        Academy::create([
            'name' => 'UX/UI'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['nama_departemen' => 'IT'],
            ['nama_departemen' => 'HR'],
            ['nama_departemen' => 'Finance'],
            ['nama_departemen' => 'Marketing'],
            ['nama_departemen' => 'Operations'],
        ];

        foreach ($departments as $dept) {
            Department::create($dept);
        }
    }
}
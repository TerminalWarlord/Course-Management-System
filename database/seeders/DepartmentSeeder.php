<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $depts = [
            [
                'name' => 'Computer Science & Engineering', 
                'short_name' => 'CSE', 
                'campus' => 'LAW', 
            ],
            [
                'name' => 'Electrical and Electronics Engineering', 
                'short_name' => 'EEE', 
                'campus' => 'LAW', 
            ]
        ];
  
        foreach ($depts as $dept) {
            Department::create($dept);
        }
    }
}
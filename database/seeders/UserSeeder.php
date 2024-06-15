<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name' => 'Nurul', 
                'last_name' => 'Huda', 
                'email' => 'admin@puc.ac.bd', 
                'password' => md5('1'), 
                'contact_no' => '01864762754', 
                'dob' => '2023-08-01', 
                'role' => 'super_admin', 
                'department_id' => 1, 
            ]
        ];
  
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
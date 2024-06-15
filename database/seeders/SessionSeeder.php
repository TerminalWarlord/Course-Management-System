<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Session;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sessions = [
            [
                'session_name' => 'Spring 2023', 
                
            ],
            [
                'session_name' => 'Fall 2023', 
                
            ]
        ];
  
        foreach ($sessions as $session) {
            Session::create($session);
        }
    }
}
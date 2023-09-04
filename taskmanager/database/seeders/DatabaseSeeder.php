<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       

         $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

        \App\Models\Task::factory(10)->create([
            'user_id' => $user->id()
        ]);

 
    }
}

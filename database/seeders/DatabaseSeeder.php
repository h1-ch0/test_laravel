<?php

namespace Database\Seeders;

use App\Models\TestLists;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        TestLists::factory(10)->create();
        // User::factory(10)->create();
            // [
            // 'name' => 'Test User',
            // 'email' => 'test@example.com'
// ]);  
            // TestLists::create([
            //     'subject' => 'Good Morning',
            //     'email' => 'good@mail.com',
            //     'content' =>'Good Content Life is too short',
            // ]);            
            // TestLists::create([
            //     'subject' => 'Good afternoon',
            //     'email' => 'after@mail.com',
            //     'content' =>'Bad Content Art is too long',
            // ]);
        
    }
}
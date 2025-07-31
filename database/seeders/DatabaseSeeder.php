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

        User::factory()->create([
        "name"=> "Admin",
        "email"=> "admin@example.com",
        "is_admin" => true,
        // 'email_verified_at' => null,
        // 'remember_token' => null,
        'password' => bcrypt('password'), // 비밀번호는 bcrypt로 해시 처리
        ]);

        User::factory()->create([
        "name"=> "Test User1",
        "email"=> "test1@example.com",
        // "is_admin" => true,
        // 'email_verified_at' => null,
        // 'remember_token' => null,
        'password' => bcrypt('password'), // 비밀번호는 bcrypt로 해시 처리
        ]);

        User::factory()->create([
        "name"=> "Test User2",
        "email"=> "test2@example.com",
        // "is_admin" => true,
        // 'email_verified_at' => null,
        // 'remember_token' => null,
        'password' => bcrypt('password'), // 비밀번호는 bcrypt로 해시 처리
        ]);
    }
}
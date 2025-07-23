<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //put example db in here
        DB::table("users")->insert([
            ['name' => '뉴턴', 'email' => 'Mavity@example.com', 'password' => bcrypt('pass')],
            ['name' => '블랙', 'email' => 'Quants@example.com', 'password' => bcrypt('pass')],
            ['name' => '피셔', 'email' => 'brown@example.com', 'password' => bcrypt('pass')]
        ]);
    }
}

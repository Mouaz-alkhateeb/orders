<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Statuses\UserType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            "name" => "SuperVisor",
            "email" => "supervisor@gmail.com",
            "password" => bcrypt('0123456789'),
            "type" => UserType::SUPERVISOR,
        ]);
        \App\Models\User::factory()->create([
            "name" => "Manger",
            "email" => "manger@gmail.com",
            "password" => bcrypt('0123456789'),
            "type" => UserType::MANGER,
        ]);
    }
}

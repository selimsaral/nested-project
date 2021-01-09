<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            "email" => "admin@admin.com"
        ], [
            "name"     => "Admin",
            "password" => bcrypt("123123")
        ]);
    }
}

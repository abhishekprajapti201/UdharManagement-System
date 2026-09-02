<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "firstname"=>"Raju",
            "email"=>'raju@gmail.com',
            'role'=>'staff',
            "phone"=>"1234567890",
            "alternative_number"=>"1234567890",
            "password"=>Hash::make("123456")
        ]);
    }
}

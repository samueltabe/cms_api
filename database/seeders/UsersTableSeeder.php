<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'stabi1602@gmail.com')->first();

        if(!$user){
            User::create([
             'name' => 'Samuel Tabe',
             'email' => 'stabi1602@gmail.com',
             'role' => 'admin',
             'password' => Hash::make('12345678'),
            ]);
        }
    }
}

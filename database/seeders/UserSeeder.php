<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::create([
        'name'=>'Muskan Gupta',
        'email'=>'kumuskangupta821@gmail.com',
        'password'=>Hash::make('Muskan@123'),
       ]);
    }
}

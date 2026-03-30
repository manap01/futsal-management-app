<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'putsall123',
            'email' => 'putsall123@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('putsall123'),
        ]);
    }
}

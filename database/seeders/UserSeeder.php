<?php

namespace Database\Seeders;

use App\Models\Data;
use App\Models\User;
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
            'email' => 'a@test.com',
            'username' => 'a',
            'name' => 'Andri',
            'role' => 'admin',
            'avatar' => 'avatar_user.jpg',
            'phone' => '0888122345',
            'address' => 'parung-bogor, parung-bogor',
            'password' => 'passw'
        ]);
        User::create([
            'email' => 'staff@test.com',
            'username' => 'b',
            'name' => 'Andristaff',
            'role' => 'staff',
            'avatar' => 'avatar_user.jpg',
            'phone' => '0888122345',
            'address' => 'parung-bogor, parung-bogor',
            'password' => 'passw'
        ]);
        User::create([
            'email' => 'mahasiswa@test.com',
            'username' => 'c',
            'name' => 'Andrimhs',
            'role' => 'staff',
            'avatar' => 'avatar_user.jpg',
            'phone' => '0888122345',
            'address' => 'parung-bogor, parung-bogor',
            'password' => 'passw'
        ]);
    }
}

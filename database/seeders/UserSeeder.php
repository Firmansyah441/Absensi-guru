<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_user' => 'Nama admin',
                'role_id' => '1',
                'username' => 'admin',
                'password' => bcrypt('1'),
                'email' => 'admin@gmail.com',
            ],
            [
                'nama_user' => 'Nama guru',
                'role_id' => '2',
                'username' => 'guru',
                'password' => bcrypt('12'),
                'email' => 'guru@gmail.com',
            ],
            [
                'nama_user' => 'Nama kepsek',
                'role_id' => '3',
                'username' => 'kepsek',
                'password' => bcrypt('0'),
                'email' => 'kepsek@gmail.com',
            ],
        ];
        foreach ($data as $value) {
            User::create([
                'nama_user' => $value['nama_user'],
                'role_id' => $value['role_id'],
                'username' => $value['username'],
                'password' => $value['password'],
                'email' => $value['email'],
            ]);

        }
    }
}

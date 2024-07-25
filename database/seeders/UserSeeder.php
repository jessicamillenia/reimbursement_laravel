<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nip' => '1234',
            'nama' => 'Doni',
            'jabatan' => 'Direktur',
            'password' => '123456'
        ]);

        User::create([
            'nip' => '1235',
            'nama' => 'Dono',
            'jabatan' => 'Finance',
            'password' => '123456'
        ]);

        User::create([
            'nip' => '1236',
            'nama' => 'Dona',
            'jabatan' => 'Staff',
            'password' => '123456'
        ]);
    }
}

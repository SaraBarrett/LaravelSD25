<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //função que insere um admin por defeito na nossa base de dados

        User::insert([
            'name'=> 'Administrador',
            'email' =>'myadmin@gmail.com',
            'password'=> Hash::make('myadmin@gmail.com'),
            'user_type' =>1
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function addUser(){
        $users = $this->getAllUsers();

        return view('users.add_user', compact('users'));
    }

    public function listUsers(){
        $usersThatWillComeFromDB = ['Manuela', 'Vítor', 'Alexandre', 'Bruno'];

       $usersFromDB = User::get();


        return view('users.all_users', compact('usersThatWillComeFromDB', 'usersFromDB'));
    }

    private function getAllUsers(){

        //no futuro carregamos dados da base de dados (query À BD)
        $users = ['Francisco', 'Luís','Rafaela', 'Maria'];
        return $users;
    }

    private function insertUserIntoDB(){

        DB::table('users')->updateOrinsert(
            ['email' =>'teste1@gmail.com'],
            [
            'name' =>'Sara',
            'updated_at'=>now(),
            'password' => '1234444'
        ]);
    }

    private function deleteUserFromDB(){
        Db::table('users')
        ->where('id',4)
        ->delete();

    }

}

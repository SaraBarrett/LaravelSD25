<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function home(){
        //consulta à base de dados pelo nome do login
        $myName = 'Sara';
        $age = 39;
        $students = ['Rafael', 'Luísa', 'Luís'];

        $userData = [
            'name' => 'Sara',
            'age'=> 39
        ];


        $cesaeInfo = $this->getCesaeInfo();

        return view('homepage',compact(
        'myName',
        'age','students', 'userData', 'cesaeInfo'));
    }

    private function getCesaeInfo(){
        $cesaeInfo = [
            'name' => 'Cesae',
            'address' => 'Rua Ciríaco Cardoso 186, 4150-212 Porto',
            'email' => 'cesae@cesae.pt'
        ];

        return  $cesaeInfo;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function allTasks(){
        $tasks = $this->getAllTasks();


        return view('tasks.all_tasks', compact('tasks'));
    }

    public function viewTask($id){
          $task=  Db::table('tasks')
            ->where('tasks.id', $id)
            ->join('users', 'users.id', '=', 'tasks.user_id')
            ->select("tasks.*","users.name as username")
            ->first();

    return view('tasks.view_task', compact('task'));


    }

    public function deleteTask($id){

        //se tiver tasks associadas, apaga
        Db::table('tasks')
        ->where('id', $id)
        ->delete();


        return back();

    }

    //função que faz a query à base de dados
    protected function getAllTasks(){
        $tasks = DB::table('tasks')
        ->join('users', 'users.id', '=', 'tasks.user_id')
        ->select("tasks.*","users.name as username")
        ->get();


        return $tasks;

    }
}

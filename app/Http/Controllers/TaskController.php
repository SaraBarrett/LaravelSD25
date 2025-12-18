<?php

namespace App\Http\Controllers;

use App\Models\Task;
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

     public function addTask(){


        return view('tasks.add_task');
    }

       //função que recebe os dados do form
    public function storeTask(Request $request){
        //dd($request->all());
        //validar se os dados recebidos estão em conformidade com a BAse de dados
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'user_id' =>'exists:users,id'
        ]);

        //inserir user na base de dados
        Task::insert([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('tasks.all')->with('message', 'Tarefa adicionada com sucesso!');
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

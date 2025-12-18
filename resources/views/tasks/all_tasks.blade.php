@extends('layouts.fe_master')
@section('content')
    <h5>Aqui estão todas as Tarefas da Base de Dados</h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Estado</th>
                <th scope="col">Data de Conclusão</th>
                <th scope="col">User</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->due_at }}</td>
                    <td>{{ $task->username }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

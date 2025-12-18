@extends('layouts.fe_master')
@section('content')
    <h4>Olá, aqui podes adicionar tarefas</h4>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('name')
            <p class="text-danger"> Erro de nome</p>
        @enderror
         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required name="description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('description')
            <p class="text-danger"> Erro de descrição</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input required name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        @error('password')
            <p class="text-danger"> Erro de user</p>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

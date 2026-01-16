@extends('layouts.fe_master')
@section('content')
    <h6>Aqui vamos carregar todos os users que estão na base de dados</h6>

    <ul>
        @foreach ($usersThatWillComeFromDB as $user)
            <li>{{ $user }}</li>
        @endforeach
    </ul>

    <h6>Users vindos da BD</h6>
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form action="" method="get">
        <input type="text" name="search">
        <button type="submit" class="btn btn-secondary">Pesquisar</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th></th>
                <th scope="col">Nome</th>

                <th scope="col">Email</th>
                <th scope="col">Nif</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersFromDB as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td><img src="{{$user->photo? asset('storage/'.$user->photo): asset('images/nophoto.jpg')  }}" alt=""></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nif }}</td>
                    @auth
                        <td><a href="{{ route('users.view', $user->id) }}" class="btn btn-info">Ver / Editar</a></td>
                        @if (Auth::user()->email == 'admin@gmail.com')
                            <td><a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">Apagar</a></td>
                        @endif

                    @endauth

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

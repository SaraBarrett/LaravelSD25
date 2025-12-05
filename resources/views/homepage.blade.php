<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
</head>

<body>
    @php
        //consulta à base de dados pelo nome do login
        $myName = 'Sara';
    @endphp


    <h5>Bem vindo {{ $myName }}</h5>
    <ul>
        <li><a href="{{ route('welcome') }}">Welcome Page</a></li>
        <li><a href="{{ route('hello') }}">Hello Page</a></li>
    </ul>

</body>

</html>

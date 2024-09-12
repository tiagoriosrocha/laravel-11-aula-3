<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{ $tituloPagina}}</h1>
    <h3>Nome do Aluno : {{$nomeAluno}}</h3>

    @if(\Session::has('success'))
    <h3><b>{{\Session::get('success')}}</b></h3>
    @endif


    <hr>
    <ul>
        @foreach($listaAtividades as $umaAtividade)
        
        <li> <a href="/atividades/{{$umaAtividade->id}}">{{ $umaAtividade ->title }}</a></li>
        @endforeach
    </ul>
</body>
</html>
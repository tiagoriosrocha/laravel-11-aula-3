<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Detalhes da atividade ID:{{$atividade->id}}</h1>
    <hr>
    <p>Titulo:{{$atividade->title}}</p>
    <p>Dscriçao:{{$atividade->description}}</p>
    <p>Agendado Para: {{ $atividade->scheduledto->format('d/m/Y h:m') }}</p>
    <br>
    <p>Criado em:{{ $atividade->created_at->format('d/m/Y h:m') }}</p>
    <p>Atualizado em:{{ $atividade->updated_at->format('d/m/Y h:m') }}</p>
    <br>
    <a href="/atividades/{{ $atividade->id }}/edit">Editar</a>
</body>
</html>
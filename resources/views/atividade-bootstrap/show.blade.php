<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Atividade</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 700px;
            margin-top: 30px;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        hr {
            margin: 20px 0;
            border-top: 2px solid #e0e0e0;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="display-5">Detalhes da Atividade ID: {{ $atividade->id }}</h1>
        <hr>
        <p><strong>Título:</strong> {{ $atividade->title }}</p>
        <p><strong>Descrição:</strong> {{ $atividade->description }}</p>
        <p><strong>Agendado Para:</strong> {{ $atividade->scheduledto->format('d/m/Y H:i') }}</p>
        <br>
        <p><strong>Criado em:</strong> {{ $atividade->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Atualizado em:</strong> {{ $atividade->updated_at->format('d/m/Y H:i') }}</p>
        <br>
        <a href="/atividades/{{ $atividade->id }}/edit" class="btn btn-custom">Editar</a>
        <a href="/atividades/{{ $atividade->id }}/delete" class="btn btn-danger">Deletar</a>
    </div>

    <!-- Bootstrap 5.3 JS and Popper (Optional for interactions) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Registro de Atividade</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin-top: 30px;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .btn-delete:hover {
            background-color: #c82333;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="display-5 text-center">Excluir Registro de Atividade</h1>
        <hr>

        <!-- Formulário de Exclusão -->
        <form action="/atividades/{{ $atividade->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <p class="text-center mb-4">Você realmente deseja excluir o registro <strong>{{ $atividade->id }}</strong>?</p>

            <button type="submit" class="btn btn-delete">Deletar</button>
        </form>
    </div>

    <!-- Bootstrap 5.3 JS and Popper (Optional for interactions) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

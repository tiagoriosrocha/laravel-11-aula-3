<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Atividades</title>
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

        .list-group-item {
            border: none;
            padding: 15px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .list-group-item:hover {
            background-color: #f1f1f1;
        }

        .alert-success {
            border-radius: 5px;
        }

        hr {
            margin: 20px 0;
            border-top: 2px solid #e0e0e0;
        }

        .display-4 {
            font-size: 2.5rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="text-center mb-4">
            <h1 class="display-4">Lista de Atividades</h1>
            <h3 class="text-secondary">Nome do Aluno: <span class="text-primary">Nome do Aluno</span></h3>

            @if(\Session::has('success'))
                <div class="alert alert-success mt-3" role="alert">
                    <h4 class="alert-heading"><strong>{{ \Session::get('success') }}</strong></h4>
                </div>
            @endif
        </div>

        <hr>

        <!-- List of Activities -->
        <ul class="list-group list-group-flush">
            @foreach($listaAtividades as $umaAtividade)
                <li class="list-group-item">
                    <a href="/atividades/{{ $umaAtividade->id }}" class="text-dark text-decoration-none">
                        {{ $umaAtividade->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Bootstrap 5.3 JS and Popper (Optional for interactions) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

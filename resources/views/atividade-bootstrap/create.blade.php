<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro de Atividade</title>
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

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert-danger {
            border-radius: 5px;
        }

        hr {
            margin: 20px 0;
            border-top: 2px solid #e0e0e0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-3">Formulário de Cadastro de Atividade</h1>
        <hr>

        <!-- EXIBE MENSAGENS DE ERROS -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulário -->
        <form action="/atividades" method="post">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="title" class="form-label">Título:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                    placeholder="Digite o título da atividade">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição:</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="{{ old('description') }}" placeholder="Digite a descrição da atividade">
            </div>
            <div class="mb-3">
                <label for="scheduledto" class="form-label">Agendado para:</label>
                <input type="datetime-local" class="form-control" id="scheduledto" name="scheduledto"
                    value="{{ old('scheduledto') }}">
            </div>
            <button type="submit" class="btn btn-primary w-100">Salvar</button>
        </form>
    </div>

    <!-- Bootstrap 5.3 JS and Popper (Optional for interactions) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

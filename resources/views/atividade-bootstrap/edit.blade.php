<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Atividade</title>
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
            margin-bottom: 15px;
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
        <h1 class="display-5">Formulário de Edição da Atividade {{ $atividade->id }}</h1>
        <hr>

        <!-- Exibe Mensagens de Erros -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulário de Edição -->
        <form action="/atividades/{{ $atividade->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="mb-3">
                <label for="title" class="form-label">Título:</label>
                <input type="text" 
                       name="title" 
                       class="form-control" 
                       id="title" 
                       value="{{ old('title', $atividade->title) }}" 
                       placeholder="Insira o título da atividade">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrição:</label>
                <input type="text" 
                       name="description" 
                       class="form-control" 
                       id="description" 
                       value="{{ old('description', $atividade->description) }}" 
                       placeholder="Insira a descrição da atividade">
            </div>

            <div class="mb-3">
                <label for="scheduledto" class="form-label">Agendado para:</label>
                <input type="datetime-local" 
                       name="scheduledto" 
                       class="form-control" 
                       id="scheduledto" 
                       value="{{ old('scheduledto', $atividade->scheduledto ? $atividade->scheduledto->format('Y-m-d\TH:i') : '') }}">
            </div>

            <button type="submit" class="btn btn-custom w-100">Salvar</button>
        </form>
    </div>

    <!-- Bootstrap 5.3 JS and Popper (Optional for interactions) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

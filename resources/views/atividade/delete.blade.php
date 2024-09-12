<h1>Excluir Registro de Atividade</h1>
<hr>
<form action="/atividades/{{ $atividade->id }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <p>Você realmente deseja excluir o registro {{ $atividade->id }}?</p>
    <input type="submit" value="Deletar">
</form>
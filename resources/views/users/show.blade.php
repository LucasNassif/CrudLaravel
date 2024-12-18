<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>
<body>

    <h2> Mostrar Usuários Cadastrados</h2>

    @if (session('success'))
    <p style="color:green">
        {{ session('success') }};
    </p>
    @endif


    id: {{ $user->id}}<br>
    nome: {{ $user->name}}<br>
    email: {{ $user->email}}<br>
    cadastrado: {{ \carbon\carbon::parse($user->created_at)->format('d/m/y H:i:s') }}<br>
    editado: {{ \carbon\carbon::parse($user->updated_at)->format('d/m/y H:i:s') }}<br>

    <a href="{{ route('user.index') }}"> Listar</a>
    <a href="{{ route('user.edit', ['user'=> $user->id]) }}"> Editar</a>
    <form method="POST" action="{{route('user.destroy', ['user' => $user->id])}}">
        @csrf
        @method('delete')

        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esse registro?')">Apagar</button>
        </form>

</body>
</html>

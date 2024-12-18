<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <a href="{{ route('user.create') }}">Cadastrar</a>

    <h2>
        Lista de Usuários
    </h2>

    @if (session('success'))
    <p style="color:green">
        {{ session('success') }};
    </p>
    @endif

    @forelse ($users as $user)
        ID: {{ $user->id}}<br>
        nome: {{ $user->name}}<br>
        email: {{ $user->email}}<br>
        <a href="{{ route('user.show', ['user' => $user->id])}}">Visualizar</a>
        <a href="{{ route('user.edit', ['user' => $user->id])}}">Editar</a>
        {{-- <a href="{{ route('user.destroy', ['user' => $user->id])}}">Deletar</a> --}}
        <form method="POST" action="{{route('user.destroy', ['user' => $user->id])}}">
        @csrf
        @method('delete')

        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esse registro?')">Apagar</button>
        </form>

        <hr>
    @empty

    @endforelse

</body>
</html>

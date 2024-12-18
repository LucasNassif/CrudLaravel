<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index ()
    {
        //recuperar registro do banco de dados
        $users = User::orderByDesc('id')->get();

        //carregar a view
        return view('users.index', ['users' => $users]);
    }

    public function show (User $user)
    {
        return view ('users.show', ['user' => $user]);

    }

    public function create()
    {
        //carregar a view de criação de usuários
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        //validar o formulario
        $request->validated();

        //Cadastrar o registro no banco de dados
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        //Redirecionar o usuário e enviar mensagem de sucesso
        return redirect()->route('user.index')->with('success', 'Usuário Cadastrado com Sucesso!');
    }

    public function edit(User $user)
    {
        return view ('users.edit', ['user' => $user]);

    }

    public function update(UserRequest $request, User $user)
    {
        //validar o formulario
        $request->validated();


        //Editar as informações do registro no banco de dados
        $user->update([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>$request->password,
        ]);

        //Redirecionar o usuário e enviar mensagem de sucesso
        return redirect()->route('user.show', ['user' => $user->id])->with('success', 'Usuário editado com Sucesso!');

    }

    public function destroy(User $user)
    {
        //apagar usuário
        $user->delete();

        //redirecionar e apagar usuário com sucesso
        return redirect()->route('user.index', ['user' => $user->id])->with('success', 'Usuário apagado com Sucesso!');
    }
}

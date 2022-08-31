<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Funcao;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected User $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function index(Request $request)
    {
        $title = 'Usuários';
        $caminhos = [
            ['url' => '/admin', 'titulo' => 'Admin'],
            ['url' => '',       'titulo' => $title],
        ];
        return view('admin.pages.users.index', [
            'title'    => $title,
            'users'    => $this->users->getPaginate($request->search),
            'filters'  => $request->all(),
            'caminhos' => $caminhos,
        ]);
    }

    public function create()
    {
        $title = 'Criar novo usuário';
        $caminhos = [
            ['url' => '/admin',       'titulo' => 'Admin'],
            ['url' => '/admin/users', 'titulo' => 'Usuários'],
            ['url' => '',             'titulo' => $title],
        ];
        return view('admin.pages.users.create', [
            'title'    => $title,
            'funcoes'  => Funcao::all(),
            'caminhos' => $caminhos,
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();

            if ($request->password)
                $data['password'] = bcrypt($request->password);

            $user = $this->users->create($data);
            DB::commit();

            $message = "Usuário <b>{$user->name}</b> cadastrado!";
            return redirect()->route('users.index')->with('success', $message);

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if (!$user = $this->users->findById($id)){
            return redirect()->back()->withErrors('O usuário não foi encontrado!');
        }

        $title = 'Editar usuário';
        $caminhos = [
            ['url' => '/admin',       'titulo' => 'Admin'],
            ['url' => '/admin/users', 'titulo' => 'Usuários'],
            ['url' => '',             'titulo' => $title],
        ];
        return view('admin.pages.users.edit', [
            'title'    => $title,
            'funcoes'  => Funcao::all(),
            'user'     => $user,
            'caminhos' => $caminhos,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        if (!$user) {
            return redirect()->back()->withErrors('O usuário não foi encontrado!');
        }

        DB::beginTransaction();
        try {
            $data = $request->except('password');

            if ($request->password)
                $data['password'] = bcrypt($request->password);

            $user->update($data);
            DB::commit();

            $message = "<b>{$user->name}</b> editado!";
            return redirect()->route('users.index')->with('success', $message);

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function destroy($id)
    {
        //
    }

    public function funcao($id)
    {

    }

    public function funcaoStore($id)
    {

    }

    public function funcaoDestroy($id)
    {

    }
}

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
    public function __construct(protected User $user) {}

    public function index(Request $request)
    {
        $title = 'Usuários';
        $breadcrumb = [
            ['url' => '/admin', 'titulo' => 'Admin'],
            ['url' => '',       'titulo' => $title],
        ];
        return view('admin.pages.users.index', [
            'title'    => $title,
            'users'    => $this->user->getPaginate($request->search),
            'filters'  => $request->all(),
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function create()
    {
        $title = 'Novo usuário';
        $breadcrumb = [
            ['url' => '/admin',       'titulo' => 'Admin'],
            ['url' => '/admin/users', 'titulo' => 'Usuários'],
            ['url' => '',             'titulo' => $title],
        ];
        return view('admin.pages.users.create', [
            'title'    => $title,
            'funcoes'  => Funcao::all(),
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();

            if ($request->password) {
                $data['password'] = bcrypt($request->password);
            }

            $this->user->create($data);
            DB::commit();

            return redirect()->route('users.index')->with('success', 'Usuário cadastrado!');

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
        if (!$user = $this->user->findById($id)) {
            return redirect()->back()->withErrors('O usuário não foi encontrado!');
        }

        $title = 'Editar';
        $breadcrumb = [
            ['url' => '/admin',       'titulo' => 'Admin'],
            ['url' => '/admin/users', 'titulo' => 'Usuários'],
            ['url' => '',             'titulo' => $title],
        ];
        return view('admin.pages.users.edit', [
            'title'      => $title,
            'funcoes'    => Funcao::all(),
            'user'       => $user,
            'breadcrumb' => $breadcrumb,
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

            if ($request->password) {
                $data['password'] = bcrypt($request->password);
            }

            $user->update($data);
            DB::commit();

            return redirect()->route('users.index')->with('success', 'Usuário editado');

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function destroy($id)
    {
        //
    }
}

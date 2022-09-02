<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permissao\StorePermissaoRequest;
use App\Http\Requests\Permissao\UpdatePermissaoRequest;
use App\Models\Permissao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissaoController extends Controller
{
    protected Permissao $permissao;

    public function __construct(Permissao $permissao)
    {
        $this->permissao = $permissao;
    }

    public function index(Request $request)
    {
        $title = 'Permissões';
        $breadcrumb = [
            ['url' => '/admin', 'titulo' => 'Admin'],
            ['url' => '',       'titulo' => $title],
        ];
        return view('admin.pages.permissoes.index', [
            'title'      => $title,
            'permissoes' => $this->permissao->getPaginate($request->search),
            'filters'    => $request->all(),
            'breadcrumb'   => $breadcrumb,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nova permissão';
        $breadcrumb = [
            ['url' => '/admin',            'titulo' => 'Admin'],
            ['url' => '/admin/permissoes', 'titulo' => 'Permissões'],
            ['url' => '',                  'titulo' => $title],
        ];
        return view('admin.pages.permissoes.create', [
            'title'    => $title,
            'breadcrumb' => $breadcrumb,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StorePermissaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissaoRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();

            $this->permissao->create($data);
            DB::commit();

            return redirect()->route('permissoes.index')->with('success', 'Permissão cadastrada!');

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function show(Permissao $permissao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function edit(Permissao $permissao)
    {
        if (!$permissao) {
            return redirect()->back()->withErrors('A permissão não foi encontrada!');
        }

        $title = 'Editar';
        $breadcrumb = [
            ['url' => '/admin',            'titulo' => 'Admin'],
            ['url' => '/admin/permissoes', 'titulo' => 'Permissões'],
            ['url' => '',                  'titulo' => $title],
        ];
        return view('admin.pages.permissoes.edit', [
            'title'     => $title,
            'permissao' => $permissao,
            'breadcrumb'  => $breadcrumb,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdatePermissaoRequest  $request
     * @param  \App\Models\Permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissaoRequest $request, Permissao $permissao)
    {
        if (!$permissao) {
            return redirect()->back()->withErrors('A permissão não foi encontrada!');
        }

        DB::beginTransaction();
        try {
            $data = $request->except('password');

            $permissao->update($data);
            DB::commit();

            return redirect()->route('permissoes.index')->with('success', 'Permissão editada');

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permissao $permissao)
    {
        //
    }
}

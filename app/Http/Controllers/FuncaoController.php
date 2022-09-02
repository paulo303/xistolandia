<?php

namespace App\Http\Controllers;

use App\Models\Funcao;
use Illuminate\Http\Request;
use App\Http\Requests\Funcao\StoreFuncaoRequest;
use App\Http\Requests\Funcao\UpdateFuncaoRequest;
use Illuminate\Support\Facades\DB;

class FuncaoController extends Controller
{
    protected Funcao $funcao;

    public function __construct(Funcao $funcao)
    {
        $this->funcao = $funcao;
    }

    public function index(Request $request)
    {
        $title = 'Funções';
        $breadcrumb = [
            ['url' => '/admin', 'titulo' => 'Admin'],
            ['url' => '',       'titulo' => $title],
        ];

        return view('admin.pages.funcoes.index', [
            'title'    => $title,
            'funcoes'  => $this->funcao->getPaginate($request->search),
            'breadcrumb' => $breadcrumb,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nova função';
        $breadcrumb = [
            ['url' => '/admin',         'titulo' => 'Admin'],
            ['url' => '/admin/funcoes', 'titulo' => 'Funções'],
            ['url' => '',               'titulo' => $title],
        ];
        return view('admin.pages.funcoes.create', [
            'title'    => $title,
            'funcoes'  => $this->funcao->getAll(),
            'breadcrumb' => $breadcrumb,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreFuncaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFuncaoRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();

            $this->funcao->create($data);
            DB::commit();

            return redirect()->route('funcoes.index')->with('success', 'Função cadastrada');

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function show(Funcao $funcao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcao $funcao)
    {
        if (!$funcao) {
            return redirect()->back()->withErrors('A função não foi encontrada!');
        }

        $title = 'Editar';
        $breadcrumb = [
            ['url' => '/admin',         'titulo' => 'Admin'],
            ['url' => '/admin/funcoes', 'titulo' => 'Funções'],
            ['url' => '',               'titulo' => $title],
        ];
        return view('admin.pages.funcoes.edit', [
            'title'    => $title,
            'funcao'   => $funcao,
            'breadcrumb' => $breadcrumb,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFuncaoRequest $request, Funcao $funcao)
    {
        if (!$funcao) {
            return redirect()->back()->withErrors('A função não foi encontrado!');
        }

        DB::beginTransaction();
        try {
            $funcao->update($request->all());
            DB::commit();

            return redirect()->route('funcoes.index')->with('success', 'Função editada!');

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcao $funcao)
    {
        if (!$funcao) {
            return redirect()->back()->withErrors('A função não foi encontrado!');
        }

        $funcao->delete();

        return redirect()->route('funcoes.index')->with('success', 'Função excluída!');
    }
}

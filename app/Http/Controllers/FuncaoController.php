<?php

namespace App\Http\Controllers;

use App\Models\Funcao;
use Illuminate\Http\Request;
use App\Http\Requests\Funcao\StoreFuncaoRequest;
use App\Http\Requests\Funcao\UpdateFuncaoRequest;
use Illuminate\Support\Facades\DB;

class FuncaoController extends Controller
{
    protected Funcao $funcoes;

    public function __construct(Funcao $funcoes)
    {
        $this->funcoes = $funcoes;
    }

    public function index(Request $request)
    {
        $title = 'Funções';
        $caminhos = [
            ['url' => '/admin', 'titulo' => 'Admin'],
            ['url' => '',       'titulo' => $title],
        ];

        return view('admin.pages.funcoes.index', [
            'title'    => $title,
            'funcoes'  => $this->funcoes->getPaginate($request->search),
            'caminhos' => $caminhos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Editar função';
        $caminhos = [
            ['url' => '/admin',         'titulo' => 'Admin'],
            ['url' => '/admin/funcoes', 'titulo' => 'Funções'],
            ['url' => '',               'titulo' => $title],
        ];
        return view('admin.pages.funcoes.create', [
            'title'    => $title,
            'funcoes'  => $this->funcoes->getAll(),
            'caminhos' => $caminhos,
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

            $funcao = $this->funcoes->create($data);
            DB::commit();

            $message = "Função <b>{$funcao->nome}</b> cadastrado!";
            return redirect()->route('funcoes.index')->with('success', $message);

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

        $title = 'Criar nova função';
        $caminhos = [
            ['url' => '/admin',         'titulo' => 'Admin'],
            ['url' => '/admin/funcoes', 'titulo' => 'Funções'],
            ['url' => '',               'titulo' => $title],
        ];
        return view('admin.pages.funcoes.edit', [
            'title'    => $title,
            'funcao'   => $funcao,
            'caminhos' => $caminhos,
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
        if (!$funcao){
            return redirect()->back()->withErrors('A função não foi encontrado!');
        }

        DB::beginTransaction();
        try {
            $funcao->update($request->all());
            DB::commit();

            $message = "Função editada!";
            return redirect()->route('funcoes.index')->with('success', $message);

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
        $message = "Função excluída!";
        return redirect()->route('funcoes.index')->with('success', $message);
    }
}

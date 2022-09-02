<?php

namespace App\Http\Controllers;

use App\Models\Convidado;
use Illuminate\Http\Request;
use App\Http\Requests\Convidado\StoreConvidadoRequest;
use App\Http\Requests\Convidado\UpdateConvidadoRequest;
use Illuminate\Support\Facades\DB;

class ConvidadoController extends Controller
{
    protected Convidado $convidado;

    public function __construct(Convidado $convidado)
    {
        $this->convidado = $convidado;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Convidados';
        $breadcrumb = [
            ['url' => '/admin', 'titulo' => 'Admin'],
            ['url' => '',       'titulo' => $title],
        ];
        return view('admin.pages.convidados.index', [
            'title'      => 'Convidados',
            'convidados' => $this->convidado->getPaginate($request->search, $request->patrocinadores, $request->perPage),
            'filters'    => $request->all(),
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
        $title = 'Novo convidado';
        $breadcrumb = [
            ['url' => '/admin',            'titulo' => 'Admin'],
            ['url' => '/admin/convidados', 'titulo' => 'Convidados'],
            ['url' => '',                  'titulo' => $title],
        ];
        return view('admin.pages.convidados.create', [
            'title'      => $title,
            'breadcrumb' => $breadcrumb,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConvidadoRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->convidado->create($request->toArray());
            DB::commit();

            return redirect()->route('convidados.index')->with('success', 'Convidado cadastrado!');

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convidado  $convidado
     * @return \Illuminate\Http\Response
     */
    public function show(Convidado $convidado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Convidado  $convidado
     * @return \Illuminate\Http\Response
     */
    public function edit(Convidado $convidado)
    {
        if (!$convidado) {
            return redirect()->back()->withErrors('Não foi possível encontrar o convidado!');
        }

        $title = 'Editar';
        $breadcrumb = [
            ['url' => '/admin',            'titulo' => 'Admin'],
            ['url' => '/admin/convidados', 'titulo' => 'Convidados'],
            ['url' => '',                  'titulo' => $title],
        ];
        return view('admin.pages.convidados.edit', [
            'title'      => $title,
            'convidado'  => $convidado,
            'breadcrumb' => $breadcrumb,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Convidado  $convidado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConvidadoRequest $request, Convidado $convidado)
    {
        if (!$convidado) {
            return redirect()->back()->withErrors('Não foi possível encontrar o convidado!');
        }

        DB::beginTransaction();
        try {
            $convidado->update($request->toArray());
            DB::commit();

            return redirect()->route('convidados.index')->with('success', 'Convidado editado!');

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Convidado  $convidado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convidado $convidado)
    {
        //
    }
}

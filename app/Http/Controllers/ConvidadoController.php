<?php

namespace App\Http\Controllers;

use App\Models\Convidado;
use Illuminate\Http\Request;
use App\Http\Requests\Convidado\StoreConvidadoRequest;
use App\Http\Requests\Convidado\UpdateConvidadoRequest;
use Illuminate\Support\Facades\DB;

class ConvidadoController extends Controller
{
    protected Convidado $model;

    public function __construct(Convidado $convidado)
    {
        $this->model = $convidado;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.pages.convidados.index', [
            'title'  => 'Convidados',
            'convidados' =>  $this->model->getPaginate($request->search, $request->patrocinadores),
            'filters' => $request->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.convidados.create', [
            'title' => 'Cadastrar novo Convidado',
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
            $convidado = $this->model->create($request->toArray());
            DB::commit();

            $message = "Convidado <b>{$convidado->nome}</b> cadastrado com sucesso!";
            return redirect()->route('convidados.index')->with('success', $message);

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
        if (!$convidado)
            return redirect()->back()->withErrors('Não foi possível encontrar o convidado!');

        return view('admin.pages.convidados.edit', [
            'title' => "Editar convidado",
            'convidado' => $convidado,
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
        if (!$convidado)
            return redirect()->back()->withErrors('Não foi possível encontrar o convidado!');

        DB::beginTransaction();
        try {
            $convidado->update($request->toArray());
            DB::commit();

            $message = "Convidado <b>{$convidado->nome}</b> cadastrado com sucesso!";
            return redirect()->route('convidados.index')->with('success', $message);

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

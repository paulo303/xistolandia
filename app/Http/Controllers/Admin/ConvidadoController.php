<?php

namespace App\Http\Controllers\Admin;

use App\Models\Convidado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'title' => 'Criar novo Convidado',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Convidado  $convidado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convidado $convidado)
    {
        //
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

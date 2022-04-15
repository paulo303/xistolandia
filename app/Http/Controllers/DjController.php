<?php

namespace App\Http\Controllers;

use App\Models\Dj;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dj\StoreDjRequest;
use App\Http\Requests\Dj\UpdateDjRequest;
use Illuminate\Support\Facades\DB;

class DjController extends Controller
{
    protected Dj $model;

    public function __construct(Dj $dj)
    {
        $this->model = $dj;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.pages.djs.index', [
            'title'  => 'DJs',
            'djs' =>  $this->model->getPaginate($request->search),
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
        return view('admin.pages.djs.create', [
            'title' => 'Cadastrar novo DJ',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDjRequest $request)
    {
        DB::beginTransaction();
        try {
            $dj = $this->model->create($request->all());
            DB::commit();

            return redirect()->route('djs.index')->with('success', "DJ <b>{$dj->nome}</b> cadastrado com sucesso!");

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dj  $dj
     * @return \Illuminate\Http\Response
     */
    public function show(Dj $dj)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dj  $dj
     * @return \Illuminate\Http\Response
     */
    public function edit(Dj $dj)
    {
        if (!$dj)
            return redirect()->back()->withErrors('Não foi possível encontrar o DJ!');

        return view('admin.pages.djs.edit', [
            'title' => "Editar DJ",
            'dj' => $dj,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dj  $dj
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDjRequest $request, Dj $dj)
    {
        if (!$dj)
            return redirect()->back()->withErrors('Não foi possível encontrar a festa!');

        DB::beginTransaction();
        try {
            $dj->update($request->all());
            DB::commit();

            return redirect()->route('djs.index')->with('success', "DJ <b>{$dj->nome}</b> editado com sucesso!");

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dj  $dj
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dj $dj)
    {
        //
    }
}

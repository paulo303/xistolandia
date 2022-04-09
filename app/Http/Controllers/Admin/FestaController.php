<?php

namespace App\Http\Controllers\Admin;

use App\Models\Festa;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateFestaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FestaController extends Controller
{
    protected Festa $model;

    public function __construct(Festa $festa)
    {
        $this->model = $festa;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.festas.index', [
            'title'  => 'Festas',
            'festas' => $this->model->getPaginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.festas.create', [
            'title' => 'Criar nova Festa',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateFestaRequest $request)
    {
        DB::beginTransaction();
        try {
            $dados = $request->all();

            if ($request->flyer) {
                $path = 'images/flyers';
                $upload = $request->flyer->move(public_path($path), $request->data . "." . $request->flyer->getClientOriginalExtension());
                $dados['flyer'] = "{$path}/{$upload->getFilename()}";
            }

            $festa = $this->model->create($dados);
            DB::commit();

            return redirect()->route('festas.index')->with('success', "Festa cadastrada com sucesso!");

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Festa  $festa
     * @return \Illuminate\Http\Response
     */
    public function show(Festa $festa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Festa  $festa
     * @return \Illuminate\Http\Response
     */
    public function edit(Festa $festa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Festa  $festa
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateFestaRequest $request, Festa $festa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Festa  $festa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Festa $festa)
    {
        //
    }
}

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
    protected Dj $dj;

    public function __construct(Dj $dj)
    {
        $this->dj = $dj;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'DJs';
        $breadcrumb = [
            ['url' => '/admin', 'titulo' => 'Admin'],
            ['url' => '',       'titulo' => $title],
        ];
        return view('admin.pages.djs.index', [
            'title'      => $title,
            'djs'        => $this->dj->getPaginate($request->search),
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
        $title = 'Novo DJ';
        $breadcrumb = [
            ['url' => '/admin',     'titulo' => 'Admin'],
            ['url' => '/admin/djs', 'titulo' => 'DJs'],
            ['url' => '',           'titulo' => $title],
        ];
        return view('admin.pages.djs.create', [
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
    public function store(StoreDjRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->dj->create($request->all());
            DB::commit();

            return redirect()->route('djs.index')->with('success', "DJ cadastrado!");

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
        if (!$dj) {
            return redirect()->back()->withErrors('Não foi possível encontrar o DJ!');
        }

        $title = 'Editar';
        $breadcrumb = [
            ['url' => '/admin',     'titulo' => 'Admin'],
            ['url' => '/admin/djs', 'titulo' => 'DJs'],
            ['url' => '',           'titulo' => $title],
        ];
        return view('admin.pages.djs.edit', [
            'title'      => $title,
            'dj'         => $dj,
            'breadcrumb' => $breadcrumb,
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
        if (!$dj) {
            return redirect()->back()->withErrors('Não foi possível encontrar a festa!');
        }

        DB::beginTransaction();
        try {
            $dj->update($request->all());
            DB::commit();

            return redirect()->route('djs.index')->with('success', "DJ editado!");

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

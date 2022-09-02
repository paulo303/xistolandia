<?php

namespace App\Http\Controllers;

use App\Models\Festa;
use App\Http\Requests\Festa\StoreFestaRequest;
use App\Http\Requests\Festa\UpdateFestaRequest;
use App\Models\ConvidadoStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FestaController extends Controller
{
    public function __construct(protected Festa $festa, protected ConvidadoStatus $convidadoStatus){}

    public function index()
    {
        $title = 'Festas';
        $breadcrumb = [
            ['url' => '/admin', 'titulo' => 'Admin'],
            ['url' => '',       'titulo' => $title],
        ];
        return view('admin.pages.festas.index', [
            'title'      => $title,
            'festas'     => $this->festa->getPaginate(),
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function create()
    {
        $title = 'Nova festa';
        $breadcrumb = [
            ['url' => '/admin',        'titulo' => 'Admin'],
            ['url' => '/admin/festas', 'titulo' => 'Festas'],
            ['url' => '',              'titulo' => $title],
        ];
        return view('admin.pages.festas.create', [
            'title'      => $title,
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function store(StoreFestaRequest $request)
    {
        DB::beginTransaction();
        try {
            $dados = $request->all();

            if ($request->flyer) {
                $path = 'images/flyers';
                $upload = $request->flyer->move(public_path($path), $request->data . "." . $request->flyer->getClientOriginalExtension());
                $dados['flyer'] = "{$path}/{$upload->getFilename()}";
            }

            $this->festa->create($dados);
            DB::commit();

            return redirect()->route('festas.index')->with('success', "Festa cadastrada com sucesso!");

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function show(Festa $festa)
    {
        //
    }

    public function edit(Festa $festa)
    {
        if (!$festa) {
            return redirect()->back()->withErrors('Não foi possível encontrar a festa!');
        }

        $title = 'Editar';
        $breadcrumb = [
            ['url' => '/admin',        'titulo' => 'Admin'],
            ['url' => '/admin/festas', 'titulo' => 'Festas'],
            ['url' => '',              'titulo' => $title],
        ];
        return view('admin.pages.festas.edit', [
            'title'      => $title,
            'festa'      => $festa,
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function update(UpdateFestaRequest $request, Festa $festa)
    {
        if (!$festa) {
            return redirect()->back()->withErrors('Não foi possível encontrar a festa!');
        }

        DB::beginTransaction();
        try {
            $dados = $request->all();

            if ($request->flyer) {
                if ($festa->image && Storage::exists($festa->image)) {
                    Storage::delete($festa->image);
                }

                $path = 'images/flyers';
                $upload = $request->flyer->move(public_path($path), $request->data . "." . $request->flyer->getClientOriginalExtension());
                $dados['flyer'] = "{$path}/{$upload->getFilename()}";
            }

            $festa->update($dados);
            DB::commit();

            return redirect()->route('festas.index')->with('success', "Festa editada com sucesso!");

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function destroy(Festa $festa)
    {
        //
    }
}

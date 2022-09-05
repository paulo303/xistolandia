<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Convidado;
use App\Models\ConvidadoStatus;
use App\Models\Festa;
use App\Models\FestaConvidado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FestaConvidadoController extends Controller
{
    public function __construct(protected Festa $festa, protected Convidado $convidado, protected ConvidadoStatus $convidadoStatus) {}

    public function index(Festa $festa, Request $request)
    {
        if (!$festa) {
            return redirect()->back()->withErrors('Não foi possível encontrar a festa!');
        }
        $title = 'Convidados';
        $breadcrumb = [
            ['url' => '/admin',        'titulo' => 'Admin'],
            ['url' => '/admin/festas', 'titulo' => 'Festas'],
            ['url' => '',              'titulo' => $title],
        ];
        
        return view('admin.pages.festasConvidados.index', [
            'title'       => $title,
            'festa'       => $festa,
            'listaStatus' => $this->convidadoStatus->getAll(),
            'convidados'  => $festa->convidados,
            'model'       => 'festa',
            'breadcrumb'  => $breadcrumb,
        ]);

    }

    public function create(Festa $festa)
    {
        if (!$festa) {
            return redirect()->back()->withErrors('Não foi possível encontrar a festa!');
        }
        $title = 'Adicionar convidados';
        $breadcrumb = [
            ['url' => '/admin',                                       'titulo' => 'Admin'],
            ['url' => '/admin/festas',                                'titulo' => 'Festas'],
            ['url' => '/admin/festas/' . $festa->id . '/convidados/', 'titulo' => 'Convidados'],
            ['url' => '',                                             'titulo' => $title],
        ];
        return view('admin.pages.festasConvidados.create', [
            'title'      => $title,
            'festa'      => $festa,
            'convidados' => $this->convidado->findAll(),
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function store(Request $request, Festa $festa)
    {
        if (!$festa) {
            return redirect()->back()->withErrors('Não foi possível encontrar a festa!');
        }

        DB::beginTransaction();
        try {
            $festa->convidados()->syncWithoutDetaching($request->convidados);

            DB::commit();

            return redirect()->route('festas.convidados.index', $festa)->with('success', "Convidados adicionados!");

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function show(FestaConvidado $festaConvidado)
    {
        //
    }

    public function edit(FestaConvidado $festaConvidado)
    {
        //
    }

    public function update(Request $request, FestaConvidado $festaConvidado)
    {
        //
    }

    public function destroy(FestaConvidado $festaConvidado)
    {
        //
    }

    public static function buscaConvidados(Request $request, Festa $festa)
    {
        $search = $request->search;
        $convidados = $festa->convidados->filter(function ($item) use ($search) {
            return false !== stripos($item, $search);
        });

        return $convidados;
    }

    public function alterarStatusConvidados(Request $request, Festa $festa)
    {
        if (!$festa) {
            return redirect()->back()->withErrors('Não foi possível encontrar a festa!');
        }

        DB::beginTransaction();
        try {
            $convidados_array = explode(",", $request->convidados_id);
            $festa->convidados()->detach($convidados_array);
            $festa->convidados()->attach($convidados_array, ['status_id' => $request->status]);

            // $festa->convidados()->syncWithPivotValues($convidados_array, ['status_id' => $request->status]);

            DB::commit();

            return redirect()->route('festas.convidados.index', $festa)->with('success', "Status alterado!");

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function removerConvidados(Request $request, Festa $festa)
    {
        if (!$festa) {
            return redirect()->back()->withErrors('Não foi possível encontrar a festa!');
        }

        DB::beginTransaction();
        try {
            $festa->convidados()->detach($request->convidados);

            DB::commit();

            return redirect()->route('festas.convidados.index', $festa)->with('success', "Convidados removidos!");

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}

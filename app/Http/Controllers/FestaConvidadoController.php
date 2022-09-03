<?php

namespace App\Http\Controllers;

use App\Models\Convidado;
use App\Models\Festa;
use App\Models\FestaConvidado;
use Illuminate\Http\Request;

class FestaConvidadoController extends Controller
{
    public function __construct(private Festa $festa, private Convidado $convidados) {}

    public function index(Festa $festa)
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
            'title'      => $title,
            'festa'      => $festa,
            'convidados' => $festa->convidados()->paginate(200),
            'breadcrumb' => $breadcrumb,
        ]);

    }

    public function create(Festa $festa)
    {
        if (!$festa) {
            return redirect()->back()->withErrors('Não foi possível encontrar a festa!');
        }
        $title = 'Adicionar convidado';
        $breadcrumb = [
            ['url' => '/admin',                                       'titulo' => 'Admin'],
            ['url' => '/admin/festas',                                'titulo' => 'Festas'],
            ['url' => '/admin/festas/' . $festa->id . '/convidados/', 'titulo' => 'Convidados'],
            ['url' => '',                                             'titulo' => $title],
        ];
        return view('admin.pages.festasConvidados.create', [
            'title'      => $title,
            'festa'      => $festa,
            'convidados' => $this->convidados->findAll(),
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function store(Request $request)
    {
        //
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
}

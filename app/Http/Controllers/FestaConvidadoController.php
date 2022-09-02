<?php

namespace App\Http\Controllers;

use App\Models\Festa;
use App\Models\FestaConvidado;
use Illuminate\Http\Request;

class FestaConvidadoController extends Controller
{
    public function __construct(private Festa $festa) {}

    public function index($festa_id)
    {
        $festa = $this->festa->findById($festa_id);

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
            'convidados' => $festa->convidados()->paginate(10),
            'breadcrumb' => $breadcrumb,
        ]);

    }

    public function create()
    {
        //
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

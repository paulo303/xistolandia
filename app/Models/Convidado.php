<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Convidado extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'email',
        'celular',
        'patrocinador',
    ];

    protected $casts = [
        'patrocinador' => 'boolean',
    ];

    public function patrocinadores()
    {
        return  $this->where('patrocinador', 1)->get();
    }

    /*** REGRAS DE NEGÓCIO ***/
    public function getPaginate(string|null $search = '', string|null $patrocinadores = '')
    {
        $convidados = $this->where(function ($query) use ($search, $patrocinadores){
            if ($patrocinadores) {
                $query->where('patrocinador', 1);
            }
            if ($search) {
                $query->where('nome', 'LIKE', "%{$search}%");
                $query->Orwhere('email', 'LIKE', "%{$search}%");
            }
        })
        ->orderBy('nome', 'asc')
        ->paginate(10);

        // $convidados->load([
        //     // 'convidados',
        //     // 'lineup',
        // ]);

        return $convidados;
    }

    public function findById($id)
    {
        $convidado = $this->find($id);

        $convidado->load([
            // 'convidados',
            // 'lineup',
        ]);

        return $convidado;
    }
}

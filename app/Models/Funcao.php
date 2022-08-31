<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    use HasFactory;

    public $table = 'funcoes';

    public $fillable = [
        'nome',
        'descricao',
    ];

    public static function getAll()
    {
        return Funcao::with(['permissoes'])->get();
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class);
    }

    /*** REGRAS DE NEGÓCIO ***/
    public static function getPaginate($search)
    {
        $funcoes = Funcao::where(function ($query) use ($search){
            if ($search) {
                $query->where('nome', 'LIKE', "%{$search}%");
            }
        })
        ->orderBy('nome', 'asc')
        ->with(['permissoes'])
        ->paginate(10);

        return $funcoes;
    }

    public function findById($id)
    {
        return $this->find($id);
    }
}

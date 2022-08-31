<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    use HasFactory;

    public $table = 'permissoes';

    public $fillable = [
        'nome',
        'descricao',
    ];

    public function funcoes()
    {
        return $this->belongsToMany(Funcao::class);
    }

    /*** REGRAS DE NEGÓCIO ***/
    public function getPaginate(string|null $search = '')
    {
        $permissoes = $this->where(function ($query) use ($search){
            if ($search) {
                $query->where('nome', 'LIKE', "%{$search}%");
            }
        })
        ->orderBy('nome', 'asc')
        ->with(['funcoes'])
        ->paginate(10);

        return $permissoes;
    }

    public function findById($id)
    {
        return $this->with(['funcao'])->find($id);
    }
}

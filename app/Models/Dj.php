<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dj extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nome'];

    /*** REGRAS DE NEGÓCIO ***/
    public function getPaginate(string|null $search = '')
    {
        $djs = $this->where(function ($query) use ($search){
            if ($search) {
                $query->where('nome', 'LIKE', "%{$search}%");
            }
        })
        ->orderBy('nome', 'asc')
        ->paginate(10);

        // $djs->load([
        //     // 'djs',
        //     // 'lineup',
        // ]);

        return $djs;
    }

    public function findById($id)
    {
        $dj = $this->find($id);

        $dj->load([
            // 'convidados',
            // 'lineup',
        ]);

        return $dj;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Festa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'data',
        'atracoes',
        'flyer',
    ];

    protected $appends = ['data_br'];

    public function getDataBrAttribute() {
        return date('d/m/Y', strtotime($this->attributes['data']));
    }

    /*** REGRAS DE NEGÓCIO ***/
    public function getPaginate()
    {
        $festas = $this->orderBy('created_at', 'desc')->paginate(10);

        $festas->load([
            // 'convidados',
            // 'lineup',
        ]);

        return $festas;
    }

    public function findById($id)
    {
        $festa = $this->find($id);

        $festa->load([
            // 'convidados',
            // 'lineup',
        ]);

        return $festa;
    }
}

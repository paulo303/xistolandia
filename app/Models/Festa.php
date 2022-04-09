<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Festa extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'atracoes',
        'flyer',
    ];

    public function getDataAttribute() {
        return date('d/m/Y', strtotime($this->attributes['data']));
    }

    public function getCreatedAtAttribute() {
        return date('d/m/Y H:i:s', strtotime($this->attributes['created_at']));
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

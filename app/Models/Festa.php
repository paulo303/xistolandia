<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use stdClass;

class Festa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'data',
        'atracoes',
        'flyer',
    ];

    protected $appends = [
        'data_br',
        'total_convidados',
        'total_aguardando_resposta',
        'total_confirmados',
        'total_recusados',
        'porcentagem_aguardando_resposta',
        'porcentagem_confirmados',
        'porcentagem_recusados',
    ];

    public function getDataBrAttribute() {
        return date('d/m/Y', strtotime($this->attributes['data']));
    }

    public function getTotalConvidadosAttribute() {
        return $this->convidados ? count($this->convidados) : 0;
        // return count($this->convidados) ?? 0;
    }

    public function getTotalAguardandoRespostaAttribute() {
        return $this->getConvidadosAguardandoResposta()->count() ? $this->getConvidadosAguardandoResposta()->count() : 0;
    }

    public function getTotalConfirmadosAttribute() {
        return $this->getConvidadosConfirmados()->count() ? $this->getConvidadosConfirmados()->count() : 0;
    }

    public function getTotalRecusadosAttribute() {
        return $this->getConvidadosRecusados()->count() ? $this->getConvidadosRecusados()->count() : 0;
    }

    public function getPorcentagemAguardandoRespostaAttribute() {
        return $this->total_aguardando_resposta ? ($this->total_aguardando_resposta * 100) / $this->total_convidados : 0;
    }

    public function getPorcentagemConfirmadosAttribute() {
        return $this->total_confirmados ? ($this->total_confirmados * 100) / $this->total_convidados : 0;
    }

    public function getPorcentagemRecusadosAttribute() {
        return $this->total_recusados ? ($this->total_recusados * 100) / $this->total_convidados : 0;
    }

    public function convidados()
    {
        return $this->belongsToMany(Convidado::class, 'festa_convidado')->orderBy('nome')->withPivot(['status_id'])->withTimestamps();
    }

    /*** REGRAS DE NEGÓCIO ***/
    public function getPaginate()
    {
        return $this->orderBy('created_at', 'desc')->paginate(10);
    }

    public  function findById($id)
    {
        $festa = $this->find($id);

        $festa->load([
            'convidados',
            // 'lineup',
        ]);

        return $festa;
    }

    public function getConvidadosAguardandoResposta()
    {
        return $this->convidados()->where('status_id', '=', 1)->get();
    }

    public function getConvidadosConfirmados()
    {
        return $this->convidados()->where('status_id', '=', 2)->get();
    }

    public function getConvidadosRecusados()
    {
        return $this->convidados()->where('status_id', '=', 3)->get();
    }
}

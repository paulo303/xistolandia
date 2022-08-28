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

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class);
    }
}

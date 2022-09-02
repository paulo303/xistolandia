<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvidadoStatus extends Model
{
    use HasFactory;

    protected $table = 'convidados_status';
    protected $fillable = ['nome'];

    public function getAll()
    {
        return $this->all();
    }

    public function findById($id)
    {
        return $this->find($id);
    }
}

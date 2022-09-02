<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FestaConvidado extends Model
{
    use HasFactory;

    protected $table = 'festa_convidado';
    protected $fillable = [
        'festa_id',
        'convidado_id',
        'status_id',
    ];

    public function festa()
    {
        return $this->belongsTo(Festa::class);
    }

    public function convidado()
    {
        return $this->belongsTo(Festa::class);
    }
}

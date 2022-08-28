<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function funcoes()
    {
        return $this->belongsToMany(Funcao::class);
    }

    /*** REGRAS DE NEGÓCIO ***/
    public function getPaginate(string|null $search = '')
    {
        $users = $this->where(function ($query) use ($search){
            if ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
                $query->Orwhere('email', 'LIKE', "%{$search}%");
            }
        })
        ->orderBy('name', 'asc')
        ->with(['funcoes'])
        ->paginate(10);

        return $users;
    }

    public function findById($id)
    {
        return $this->find($id);
    }

    public function isAdministrator()
    {
        return $this->id == 1;
    }
}

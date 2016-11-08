<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'senha', 'cpf', 'tipo',
    ];

    public function getMotoboy() {
        return Motoboy::where('id_usuario', $this->id)->first();
    }

    public function getCliente() {
        return Cliente::where('id_usuario', $this->id)->first();
    }
}

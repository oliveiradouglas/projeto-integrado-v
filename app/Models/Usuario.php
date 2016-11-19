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

    /**
     * Retorna uma instância do tipo de usuário
     * @return Cliente|Motoboy
     */

    public function getInstanciaTipo() {
        $tipo = "\\App\\Models\\";
        
        if ($this->tipo == \App\Source\Usuario\Tipo::CLIENTE) {
            $tipo .='Cliente';
        } else {
            $tipo .= 'Motoboy';
        }

        return $tipo::where('id_usuario', $this->id)->first();
    }

    public function getIdentificacaoTipo() {
        return strtolower((new \App\Source\Usuario\Tipo($this->tipo))->getDescricao());
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motoboy extends Model {
    protected $table = 'motoboy';

    protected $fillable = ['id_usuario', 'status'];
    
    public function getStatus() {
    	return new \App\Source\Motoboy\Status($this->status);
    }

    public function getUsuario() {
    	$usuarioLogado = \Auth::user();
        if ($this->id_usuario == $usuarioLogado->id) {
            return $usuarioLogado;
        }

        return Usuario::find($this->id_usuario);
    }

    public static function carregarMotoboyDisponivelMelhorAvaliado() {
    	return \DB::table('motoboy')
    		->select('motoboy.id', 'usuario.nome')
    		->join('usuario', 'motoboy.id_usuario', '=', 'usuario.id')
    		->where('motoboy.status', \App\Source\Motoboy\Status::DISPONIVEL)
    		->orderBy(\DB::raw('(SELECT SUM(avaliacao.nota) FROM avaliacao WHERE avaliacao.id_motoboy = motoboy.id)'), 'desc')
    		->first();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Servico;

class ServicoController extends Controller {
    public function index() {
        if (\Auth::user()->tipo == \App\Source\Usuario\Tipo::CLIENTE) {
            $identificacao ='cliente';
        } elseif (\Auth::user()->tipo == \App\Source\Usuario\Tipo::MOTOBOY) {
            $identificacao = 'motoboy';
        } else {
            abort(404);
        }

        $metodoTipoUsuario = 'get' . ucfirst($identificacao);

        return view("servico.index.{$identificacao}")
        	->with('servicos', Servico::where("id_{$identificacao}", \Auth::user()->$metodoTipoUsuario()->id)->get());
    }
}
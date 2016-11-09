<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartao;

class CartaoController extends Controller {
    public function index() {
    	return view('cartao.index')
    		->with('cartoes', \Auth::user()->getCliente()->getCartoes());
    }

    public function telaAdicionar() {
    	return view('cartao.adicionar');
    }
}

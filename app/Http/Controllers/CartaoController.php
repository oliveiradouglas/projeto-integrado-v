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

    public function adicionar(Request $request) {
    	try {
    		$dadosCartao = array_merge(
    			['id_cliente' => \Auth::user()->getCliente()->id],
    			$request->all()
    		);

    		Cartao::create($dadosCartao);
    		\Alerta::exibir('Cartão cadastrado com sucesso!', 'success');
    	} catch (Exception $e) {
    		\Alerta::exibir('Erro ao cadastrar o cartão!', 'error');
    	}
    	
    	return redirect(
    		action('CartaoController@index')
    	);
    }

    public function excluir($id) {
    	try {
    		Cartao::where('id_cliente', \Auth::user()->getCliente()->id)
    			->where('id', $id)
    			->firstOrFail()
    			->delete();

    		\Alerta::exibir('Cartão excluido com sucesso!', 'success');
    	} catch (Exception $e) {
    		\Alerta::exibir('Erro ao excluir o cartão!', 'error');
    	}

    	return redirect(
    		action('CartaoController@index')
    	);
    }
}

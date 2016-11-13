<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartao;

class CartaoController extends Controller {
    public function index() {
    	return view('cartao.index')
    		->with('cartoes', \Auth::user()->getInstanciaTipo()->getCartoes());
    }

    public function telaAdicionar() {
    	return view('cartao.formulario')
            ->with('action', action('CartaoController@adicionar'));
    }

    public function adicionar(Request $request) {
    	try {
    		$dadosCartao = array_merge(
    			['id_cliente' => \Auth::user()->getInstanciaTipo()->id],
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

    public function telaEditar($id) {
        try {
            return view('cartao.formulario')
                ->with('cartao', Cartao::buscarCartao($id))
                ->with('action', action('CartaoController@editar', $id));
        } catch (Exception $e) {
            echo "string";exit();
            \Alerta::exibir('Cartão não encontrado!', 'error');
            return redirect(
                action('CartaoController@index')
            );
        }
    }

    public function editar(Request $request, $id) {
        try {
            Cartao::buscarCartao($id)->update($request->all());
            \Alerta::exibir('Cartão editado com sucesso!', 'success');
        } catch (Exception $e) {
            \Alerta::exibir('Erro ao editar o cartão!', 'error');
        }
        
        return redirect(
            action('CartaoController@index')
        );
    }


    public function excluir($id) {
    	try {
    		Cartao::buscarCartao($id)->delete();

    		\Alerta::exibir('Cartão excluido com sucesso!', 'success');
    	} catch (Exception $e) {
    		\Alerta::exibir('Erro ao excluir o cartão!', 'error');
    	}

    	return redirect(
    		action('CartaoController@index')
    	);
    }
}

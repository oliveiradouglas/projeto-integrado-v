<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Servico;

class ServicoController extends Controller {
    public function index() {
        return view("servico.index")
        	->with(
                'servicos', 
                Servico::where('id_' . \Auth::user()->getIdentificacaoTipo(), 
                    \Auth::user()->getInstanciaTipo()->id
                )->get()
            );
    }

    public function telaAdicionar() {
        return view('servico.adicionar')
            ->with('cartoes', \App\Models\Cartao::where('id_cliente', \Auth::user()->getInstanciaTipo()->id)->get());
    }

    public function adicionar(Request $request) {
        try {
            $dadosServico = array_merge([
                'id_cliente' => \Auth::user()->getInstanciaTipo()->id,
                'status'     => \App\Source\Servico\Status::EM_ANDAMENTO,
                'avaliado'   => false
            ], $request->all());

            Servico::create($dadosServico);

            \App\Models\Motoboy::find($dadosServico['id_motoboy'])
                ->update([
                    'status' => \App\Source\Motoboy\Status::INDISPONIVEL
                ]);

            \Alerta::exibir('Serviço solicitado com sucesso!', 'success');
        } catch (Exception $e) {
            \Alerta::exibir('Erro ao solicitar o serviço!', 'error');
        }
        
        return redirect(
            action('ServicoController@index')
        );
    }

    public function show($id) {
        try {
            return view('servico.visualizar')
                ->with('servico', Servico::buscarPorId($id));
        } catch (Exception $e) {
            \Alerta::exibir('Serviço não encontrado!', 'error');
            return redirect(
                action('ServicoController@index')
            );
        }
    }

    public function finalizarServico($id) {
        try {
            Servico::buscarPorId($id)->update([
                'status' => \App\Source\Servico\Status::FINALIZADO
            ]);
            
            \Alerta::exibir('Serviço finalizado com sucesso!', 'success');
        } catch (Exception $e) {
            \Alerta::exibir('Erro ao finalizar o serviço!', 'error');
        }

        return redirect(
            action('ServicoController@index')
        );        
    }
}
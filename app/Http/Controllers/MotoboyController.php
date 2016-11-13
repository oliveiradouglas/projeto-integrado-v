<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motoboy;

class MotoboyController extends Controller {
    public function buscarMotoboyDisponivel() {
    	$motoboyDisponivel = Motoboy::carregarMotoboyDisponivelMelhorAvaliado();
	   	return response()->json(empty($motoboyDisponivel) ? false : $motoboyDisponivel);
    }

    public function avaliarMotoboy(Request $request) {
    	try {
    		$servico = \App\Models\Servico::where('id_cliente', \Auth::user()->getInstanciaTipo()->id)
    			->where('id', $request->input('servico'))
    			->firstOrFail();

    		\App\Models\Avaliacao::create([
    			'id_motoboy' => $servico->id_motoboy,
    			'nota'       => $request->input('nota')
    		]);

    		$servico->avaliado = 1;
    		$servico->save();

    		\Alerta::exibir('Avaliação salva com sucesso!', 'success');
    	} catch (Exception $e) {
    		\Alerta::exibir('Erro ao salvar a avaliação!', 'error');
    	}

    	return redirect(
    		action('ServicoController@index')
    	);
    }
}

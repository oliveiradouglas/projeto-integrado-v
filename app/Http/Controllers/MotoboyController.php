<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motoboy;

class MotoboyController extends Controller {
    public function selecionarMotoboyDisponivel() {
    	$motoboyDisponivel = Motoboy::carregarMotoboyDisponivelMelhorAvaliado();
	   	return response()->json(empty($motoboyDisponivel) ? false : $motoboyDisponivel);
    }
}

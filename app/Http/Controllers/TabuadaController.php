<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TabuadaController extends Controller{

    public function index(){
        return view('exercicio.tabuada');
    }

    public function store(Request $request){
    	$numero = $request->all();
    	$numero = $numero['nume'];

    	$tabuada = array();
    	if(isset($numero)){
			$num = $numero;
			$num = preg_replace('/,/', '.', $num);
			if($num != null){
				if(is_numeric($num)){
					for($i = 1; $i <= 10; $i++) {
						$calc = $num*$i;
						$tabuada[] = $i.'x'.$num.'='.$calc;
					}
				}
			}
		}

        return view('exercicio.tabuada', compact('tabuada'));
    }
}
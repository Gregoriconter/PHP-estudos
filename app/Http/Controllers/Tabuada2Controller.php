<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tabuada2Controller extends Controller
{
   
    public function tabuada(){

		$resultado = array();
    	if (isset($_GET['nume'])) {
			$numero = $_GET['nume'];
		    $nume = $numero;
		    $nume = preg_replace('/,/', '.', $nume);

		    if ($nume >= 10000) {
		    	$resultado[] = "Insira um número menor que 10 mil";
		    
		    } else if ($nume < 1) {
		    	$resultado[] = "Insira um número maior que 0";
		    
		    } else if (!is_numeric($nume)) {
		    	$resultado[] = "Escreva caracteres válidos";
		    
		    } else if ($nume != null) {
		    	if (is_numeric($nume)) {
			    	for ($i=1; $i <= 10; $i++) {
				    	$calc = $i*$nume;
		    			$calc = number_format($calc, 2, '.', ' ');
		    			$nume = number_format($nume, 2, '.', ' ');
				    	$resultado[] = $i.' x '.$nume.' = '.$calc;
			    	}
		    	}
		    }
    	}

        return view('contato.tabuada', compact('resultado'));
    }
}

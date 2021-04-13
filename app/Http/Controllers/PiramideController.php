<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PiramideController extends Controller
{
    public function piramide()
    {

    	$resultado = '';
    	if (isset($_GET['pira'])) {
    		$valor = $_GET['pira'];
		    $valor = preg_replace('/,/', '.', $valor);
            $tipo_pira = $_GET['tipo_pira'];

            if ($valor == "" || $tipo_pira == "") {
                if ($valor == "") {
                    $resultado = 'O campo número esta vazio.';
                }

                if ($tipo_pira == "") {
                    $resultado = 'Escolha uma opção válida.';
                }

                if ($valor == "" && $tipo_pira == "") {
                    $resultado = 'Os campos estão vazios.';                  
                }

            } elseif ($tipo_pira != "2" && $tipo_pira != "3") {
                $resultado = 'Opção inválida.';

            } elseif (!is_numeric($valor)) {
    			$resultado = 'Escreva somente números.';

    		} elseif ($valor > 50) {
    			$resultado = 'Escreva um número menor que 50.';

    		} elseif ($valor < 1) {
    			$resultado = 'Escreva um número maior que 0.';

    		} elseif ($valor != null) {
                $cont = 1;
                $cont2 = 1;

		    	for ($i = $tipo_pira; $i <= $valor; $i+=2) { 
		    		for ($j = $tipo_pira; $j <= $i; $j+=2) {
                        $cor = '';
                        if ($cont % 2 == 0) {
                            $cor = "red";
                        }

                        $cont++;
			    		$resultado .= "<a class='link_piramide' href='piramide?pira=".$j."&tipo_pira=".$tipo_pira."'><span class='circulo ".$cor."'>".$j." "."</span></a>";
		    		}
		    		$resultado .= '<br>';
                    $cont2++;
                    $cont = $cont2;

	    		}
    		}
    	}
		    	
    	return view('contato.piramide', compact('resultado'));
    }
}

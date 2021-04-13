<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NumerosController extends Controller
{
	public function numeroscont()
	{

		if (!isset($_GET['num'])) {
			return view('contato.numeros');
		}

		$resultado = "";
		$numer     = $_GET['num'];
		$par       = 0;
		$impar     = 0;
		$positivo  = 0;
		$negativo  = 0;
		$numer = preg_replace('/,/', '.', $numer);

		foreach ($numer as $key => $value) {

			if ($value == "") {
				unset($numer[$key]);
				continue;
			}

			// if (is_numeric($value) {
			// 	unset($numer[$key]);
			// 	continue;
			// }

			if ($value < -100) {
				$errorclass = "warning";
				$erro  = "Digite numeros maiores que -101.";
				return view('contato.numeros', compact('erro', 'errorclass'));
			}

			if ($value > 1000) {
				$errorclass = "warning";
				$erro  = "Digite numeros menores que 1000.";
				return view('contato.numeros', compact('erro', 'errorclass'));
			}

			if ($value > 0) {
				$positivo++;
			}

			if ($value < 0) {
				$negativo++;
			}

			if (abs($value) % 2 == 0) {
				$par++;
		
			} else {
				$impar++;
			}
		}

		if(count($numer) <= 0){
			$errorclass = "danger";
			$erro  = "Por favor, digite um número.";
			return view('contato.numeros', compact('erro', 'errorclass'));
		}

		$contagem  = count($numer);
		$numer = array_values($numer);
		$resultado  = "Você digitou ".$contagem." números<br>";

		if ($par != 0) {
			$resultado .= $par." números pares<br>";
		}

		if ($impar != 0) {
			$resultado .= $impar." números impares<br>";
		}

		if ($positivo != 0) {
			$resultado .= $positivo." positivos<br>";
		}

		if ($negativo != 0) {
			$resultado .= $negativo." negativos";
		}

		return view('contato.numeros', compact('resultado'));
	}
}
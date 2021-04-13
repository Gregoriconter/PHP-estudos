<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotasController extends Controller
{
	public function analisenota()
	{	
		if(!isset($_GET['notas'])){
			return view('contato.notas');
		}

		$notas = $_GET['notas'];
		$error = array();
		$total = 0;

		foreach ($notas as $key => $value) {
			$nota = trim($value);
			if($key <= 2 && $value == ""){
				$error["class"] = "danger";
				$error['msg'] = "Digite pelo menos 3 valores";
				return view('contato.notas', compact("error"));
			}

			if($value == ""){
				unset($notas[$key]);
				continue;
			}

			$nota = preg_replace("/,/", "", $nota);
			$valid = $this->valida($nota, ($key+1));

			if($valid['error'] > 0){
				$error["class"] = "warning";
				$error['msg'] = $valid['msg'];

				return view('contato.notas', compact("error"));
			}

			$total += $nota;
		}

		$notas = array_values($notas);
		sort($notas);

		$qty = count($notas);
		$min = $notas[0];		
		$max = $notas[$qty-1];		
		$media = round($total / $qty, 2);

		$aprovado = $media >= 7 ? "Aprovado" : "Reprovado";
		
		$resultado  = $aprovado.".<br>";
		$resultado .= "Menor nota: ".$min."<br>";
		$resultado .= "Maior nota: ".$max."<br>";
		$resultado .= "Media de notas: ".$media;

    	return view('contato.notas', compact('resultado'));
	}

	static function valida($nota, $numero){
		$result = array();
		$result['error'] = 0;
		$result['msg'] = "";

		if($nota == ""){
			return $result;
		}

		if (!is_numeric($nota)) {
			$result['error'] = 1;
			$result['msg'] = "Nota $numero não é um número";
			return $result;
		}
		if ($nota > 10) {
			$result['error'] = 2;
			$result['msg'] = "Nota $numero é maior que 10";
			return $result;
		}
		if ($nota < 0) {
			$result['error'] = 3;
			$result['msg'] = "Nota $numero é menor que 0";
			return $result;
		}

		return $result;
	}
}
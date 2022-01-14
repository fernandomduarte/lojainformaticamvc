<?php

/**
 * Classe responsável por validar o campo de preço por conter casas
 * decimais e realizar a conversão para formato de moeda internacional 
*/
class FiltersHelper {

	public function filter_float($t) {
		$float = '';
		$float = filter_input(INPUT_POST, $t);
		$float = str_replace('.', '', $float);
		$float = str_replace(',', '.', $float);
		$float = filter_var($float, FILTER_VALIDATE_FLOAT);

		return $float;
	}
}
$(document).ready(function(){
	/**
	 * Trecho que verifica se código está preenchido, caso contrário checkbox marcado 
	**/
	if ($('#code').val() == '') {
		$('#barcode').attr('checked', true);

		$('#code').keyup(function(){
			if (this.value.length > 0) {
				$('#barcode').attr('checked', false);
			} 
		});
	} else {
		$('#barcode').attr('checked', false);
	}
	
	// autofocus e máscara dos inputs
	$('#search').focus();
	$('#name').focus();
	$('#code').focus();
	$('#price').mask("#.##0,00", {reverse:true});
	$('#s_price').mask("#.##0,00", {reverse:true});
    $('input[name=code]').mask('#');
});

/**
 * Revisão do código é necessário
**/ 
function previewImage() {
	var imagem = document.querySelector('#image').files[0];
	var preview = document.querySelector('#preview');

	var reader = new FileReader();
	reader.onloadend = function(){
		preview.src = reader.result;
	}

	if (imagem) {
		reader.readAsDataURL(imagem);

	} else {
		preview.src = '';
	}
}

<?php

class productController extends Controller {

	public function add() {
		$data = array();

		$p = new Products();
		$f = new FiltersHelper();

		if (!empty($_POST['name'])) {
			$name = ucfirst(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
			$quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
			$min_quantity = filter_input(INPUT_POST, 'min_quantity', FILTER_VALIDATE_INT);
			$price = $f->filter_float('price');

			if (!empty($_POST['code'])) {
				$code = filter_input(INPUT_POST, 'code', FILTER_VALIDATE_INT);
			} elseif (isset($_POST['barcode'])) {
				$code = rand(100000,999999);
			}

			if ($code && $name && $price && $quantity && $min_quantity) {
				$p->addProduct($code, $name, $price, $quantity, $min_quantity);

				header("Location: ".BASE_URL);
				exit;
			}

		}
		$this->loadTemplate('add', $data);
	}

	public function edit($id) {
		$data = array();
			
		$p = new Products();
		$f = new FiltersHelper();

		if (!empty($_POST['name']) && isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
			$name = ucfirst(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
			$quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
			$min_quantity = filter_input(INPUT_POST, 'min_quantity', FILTER_VALIDATE_INT);
			$price = $f->filter_float('price');

			$granted = array('image/jpeg', 'image/jpg', 'image/png');

			if (in_array($_FILES['image']['type'], $granted)) {
				$image_name = md5(time().rand(0,9999)).'.jpg';

				move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/'.$image_name);

				if ($name && $quantity && $min_quantity && $price && $image_name) {
					$p->editProduct($name, $quantity, $min_quantity, $price, $image_name, $id);
	
					header("Location: ".BASE_URL);
					exit;
				} 
			} 
			header("Location: ".BASE_URL."edit");
			exit;
				
		}
		$data['info'] = $p->getOne($id);
		
		$this->loadTemplate('edit', $data);
	}

	public function sell($id) {
		$data = array();
		
		$p = new Products();
		$s = new Sales();
		$f = new FiltersHelper();

		$data['info'] = $p->getOne($id);
		$new_qtd = $data['info']['quantity'];
		$stock = $data['info']['quantity'];

		if (!empty($_POST['s_price']) && $_POST['s_quantity'] > 0 && $_POST['s_quantity'] <= $stock) {
			$code = $_POST['code'];
			$name = $_POST['name'];
			$s_price = $f->filter_float('s_price');
			$s_quantity = filter_input(INPUT_POST, 's_quantity', FILTER_VALIDATE_INT);

			if ($code && $name && $s_price && $s_quantity) {
				$s->sellProduct($code, $name, $s_price, $s_quantity);

				$new_qtd = $new_qtd - $s_quantity;
				$p->updateQuantity($id, $new_qtd);

				header("Location: ".BASE_URL."sales/historic");
				exit;

			} else {
				header("Location: ".BASE_URL."sell");
				exit;
			}

		}
		$this->loadTemplate('sell', $data);
	}

	private function verifyProduct($code) {
		
	}

}
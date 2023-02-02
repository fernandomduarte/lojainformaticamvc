<?php

class productController extends Controller {

	private $user;

    public function __construct() {
        parent::__construct();

        $this->user = new Users();

        if (!$this->user->checkLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
        }
    }

	public function add() {
		$data = array();
		$image = array();

		$p = new Products();
		$f = new FiltersHelper();

		if (!empty($_POST['name']) && isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
			$name = ucfirst(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
			$quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
			$min_quantity = filter_input(INPUT_POST, 'min_quantity', FILTER_VALIDATE_INT);
			$price = $f->filter_float('price');

			if (!empty($_POST['code'])) {
				$code = filter_input(INPUT_POST, 'code', FILTER_VALIDATE_INT);
			} elseif (isset($_POST['barcode'])) {
				$code = rand(100000,999999);
			}
			
			$image = $_FILES['image'];
			$image = $this->saveImage($image);

			if ($code && $name && $price && $quantity && $min_quantity && $image) {

				$p->addProduct($code, $name, $price, $quantity, $min_quantity, $image);

				header("Location: ".BASE_URL);
				exit;
			}

		}
		$this->loadTemplate('add', $data);
	}

	public function edit($id) {
		if ($id) {
			$data = array();
			$image = array();
				
			$p = new Products();
			$f = new FiltersHelper();

			if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
				$image = $_FILES['image'];
			
				if ($image) {
					$image = $this->saveImage($image, $id);
					$p->editImage($image, $id);

					header("Location: ".BASE_URL);
					exit;
				}

			}

			if (!empty($_POST['name'])) {
				$name = ucfirst(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
				$quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
				$min_quantity = filter_input(INPUT_POST, 'min_quantity', FILTER_VALIDATE_INT);
				$price = $f->filter_float('price');

				if ($name && $quantity && $min_quantity && $price) {
					$p->editProduct($name, $quantity, $min_quantity, $price, $id);

					header("Location: ".BASE_URL);
					exit;
				} 
				header("Location: ".BASE_URL."edit");
				exit;
					
			}
			$data['info'] = $p->getOne($id);
			
			$this->loadTemplate('edit', $data);

		} else {
			header("Location: ".BASE_URL);
			exit;
		}

	}

	public function sell($id) {
		if ($id) {
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
			
		} else {
			header("Location: ".BASE_URL);
			exit;
		}
		
	}

	private function saveImage($image, $id = null) {
		if ($image) {
			$granted = array('image/jpeg', 'image/jpg', 'image/png');
			
			if (in_array($image['type'], $granted)) {
				if (!empty($id)) {
					$data = array();
					$p = new Products();
	
					$data['info'] = $p->getOne($id);

					if (!empty($data['info']['url_image'])) {
						$image_name = $data['info']['url_image'];	
						
					} else {
						$image_name = md5(time().rand(0,9999)).'.jpg';
					}
					move_uploaded_file($image['tmp_name'], 'assets/images/'.$image_name);
				
				} else {
					$image_name = md5(time().rand(0,9999)).'.jpg';
					move_uploaded_file($image['tmp_name'], 'assets/images/'.$image_name);
				}
				return $image_name;
			}
	
		} else {
			return false;
		}	
		
	}

}
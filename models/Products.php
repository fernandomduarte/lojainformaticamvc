<?php

class Products extends Model {

    public function getProducts($s = null) {
        $array = array();

        if (!empty($s)) {
            $sql = "SELECT * FROM products WHERE code = :code OR name LIKE :name";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":code", $s);
            $sql->bindValue(":name",'%'.$s.'%');
            $sql->execute();
        } else {
            $sql = "SELECT * FROM products";
            $sql = $this->db->query($sql);
        }
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function getOne($id, $code = null) {   
        $array = array();

        if ($code != null) {
            $number = $code;
        } else {
            $number = $id;
        }
             
        $sql = "SELECT * FROM products WHERE id = :number OR code = :number";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':number', $number);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }
    
	public function addProduct($code, $name, $price, $quantity, $min_quantity) {
		$sql = "INSERT INTO products (code, name, price, quantity, min_quantity) VALUES (
                :code, :name, :price, :quantity, :min_quantity)";
    
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":code", $code);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":price", $price);
        $sql->bindValue(":quantity", $quantity);
        $sql->bindValue(":min_quantity", $min_quantity);
        $sql->execute();

        return true;
	}

    public function editProduct($name, $quantity, $min_quantity, $price, $image_name, $id) {
        $sql = "UPDATE products SET name = :name, quantity = :quantity, min_quantity = :min_quantity, price = :price, url_image = :image_name WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':name', $name);
        $sql->bindValue(':quantity', $quantity);
        $sql->bindValue(':min_quantity', $min_quantity);
        $sql->bindValue(':price', $price);
        $sql->bindValue(':image_name', $image_name);
        $sql->bindValue(':id', $id);
        $sql->execute();

        return true;
    }

    public function updateQuantity($id, $new_qtd) {
        $sql = "UPDATE products SET quantity = :new_qtd WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":new_qtd", $new_qtd);
        $sql->execute();

        return true;
    }

    public function getLowQuantity() {
        $array = array();

        $sql = "SELECT * FROM products WHERE quantity < min_quantity";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function getImage($code) {
		$array = array();

		$sql = "SELECT url_image FROM products WHERE code = :code";
		$sql = $this->db->prepare($sql);
        $sql->bindValue(":code", $code);
        $sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}
		return $array;
	}
	
}
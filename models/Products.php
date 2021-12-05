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

        if (!empty($code)) {
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
    
	public function addProduct($code, $name, $price, $quantity, $min_quantity, $image) {
		$sql = "INSERT INTO products (code, name, price, quantity, min_quantity, url_image) VALUES (
                :code, :name, :price, :quantity, :min_quantity, :image)";
    
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":code", $code);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":price", $price);
        $sql->bindValue(":quantity", $quantity);
        $sql->bindValue(":min_quantity", $min_quantity);
        $sql->bindValue(":image", $image);
        $sql->execute();

        return true;
	}

    public function editProduct($name, $quantity, $min_quantity, $price, $id) {
        $sql = "UPDATE products SET name = :name, quantity = :quantity, min_quantity = :min_quantity, price = :price WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':name', $name);
        $sql->bindValue(':quantity', $quantity);
        $sql->bindValue(':min_quantity', $min_quantity);
        $sql->bindValue(':price', $price);
        $sql->bindValue(':id', $id);
        $sql->execute();

        return true;
    }

    public function editImage($image, $id) {
        $sql = "UPDATE products SET url_image = :image WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':image', $image);
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
	
}
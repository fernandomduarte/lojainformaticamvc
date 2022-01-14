<?php

class Sales extends Model {

    public function getSales() {
        $array = array();

        $sql = "SELECT * FROM sales";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function sellProduct($code, $name, $s_price, $s_quantity) {
        $sql = "INSERT INTO sales (product_code, product_name, value, quantity, datetime) VALUES (
            :code, :name, :s_price, :s_quantity, NOW())";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(":code", $code);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":s_price", $s_price);
        $sql->bindValue(":s_quantity", $s_quantity);
        $sql->execute();

        return true;
    }
}
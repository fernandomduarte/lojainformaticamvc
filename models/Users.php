<?php

class Users extends Model {

    private $information;

    /**
     * Verifica se o usuário existe
    **/
    public function verifyUser($name, $pass) {
        $sql = "SELECT * FROM users WHERE user_name = :name AND password = :pass";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':name', $name);
        $sql->bindValue(':pass', ($pass));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }    
    }

    /**
     * Gera-se o token e relaciona com o usuário que está logado
    **/
    public function createToken($name) {
        $token = md5(time().rand(0,9999).time());

        $sql = "UPDATE users SET token = :token WHERE user_name = :name";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":token", $token);
        $sql->bindValue(":name", $name);
        $sql->execute();

        return $token;
    }

    /**
     * Verifica se existe um token na sessão 
    **/
    public function checkLogin() {
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $sql = "SELECT * FROM users WHERE token = :token";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":token", $token);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $this->information = $sql->fetch();
                return true;
            } 
        }
        return false;
    }
}
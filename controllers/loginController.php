<?php

class loginController extends Controller {

    public function index() {
        $msg = '';

        if (!empty($_SESSION['msg'])) {
            $msg = $_SESSION['msg'];
            $_SESSION['msg'] = '';
        }
        
        $data = array(
            'msg' => $msg
        );

        if (!empty($_POST['name']) && !empty($_POST['password'])) {
            $user = $_POST['name'];
            $pass = md5($_POST['password']);

            $u = new Users();

            if ($u->verifyUser($user, $pass)) {
                $token = $u->createToken($user);
                $_SESSION['token'] = $token;

                header("Location: ".BASE_URL);
                exit;

            } else {
                $_SESSION['msg'] = "Usuário e/ou senha incorretos";
                
                header("Location: ".BASE_URL."login");
                exit;
            }
        }
        $this->loadView('login', $data);
    }

    public function sair() {
        unset($_SESSION['token']);
        header("Location: ".BASE_URL."login");
        exit;
    }
}
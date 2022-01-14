<?php

class imageController extends Controller {

    private $user;

    public function __construct() {
        parent::__construct();

        $this->user = new Users();

        if (!$this->user->checkLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
        }
    }
    
    public function show($code) {
        $data = array();

        $p = new Products();
        $data['imagem'] = $p->getOne($code);

        $this->loadView('show', $data);
    }
}
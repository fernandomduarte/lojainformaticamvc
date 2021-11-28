<?php

class imageController extends Controller {
    
    public function show($code) {
        $data = array();

        $p = new Products();
        $data['imagem'] = $p->getOne($code);

        $this->loadView('show', $data);
    }
}
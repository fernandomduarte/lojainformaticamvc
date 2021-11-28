<?php

class relatorioController extends Controller {

    public function index() {
        $data = array();

        $p = new Products();
        $data['list'] = $p->getLowQuantity();

        $this->loadTemplate('relatorio', $data);
    }
}
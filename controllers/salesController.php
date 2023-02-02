<?php

class salesController extends Controller {

    public function historic() {
        $data = array();

        $s = new Sales();
        $data['list'] = $s->getSales();

        $this->loadTemplate('historic', $data);
    }
}
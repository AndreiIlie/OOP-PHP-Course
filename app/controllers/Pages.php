<?php

class Pages extends Controller {
    public function __construct() {

    }

    public function index() {
        $data = []; // data about to be passed to the view
        $this->view('pages/index', true, $data);
    }

    public function hello($params = []) {
        $data = ['test' => 'Hello Stranger!', 'params' => $params];
        $this->view('pages/testpage', true, $data);
    }
}

?>
<?php

class Pages extends Controller {
    public function __construct() {

    }

    public function index() {
        $data = []; // data about to be passed to the view
        $this->view('pages/index', true, $data);
    }
}

?>
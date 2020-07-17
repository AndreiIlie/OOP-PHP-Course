<?php

class Users extends Controller {
    public function __construct() {

    }

    public function login() {
        switch($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $this->view('users/login', 1, []);
            break;
            case 'POST':

            break;
            default:
                die('Invalid request method');
        }

    }

    public function register() {
        switch($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $this->view('users/register', 1, []);
            break;
            case 'POST':

            break;
            default:
                die('Invalid request method');
        }
    }
}


?>
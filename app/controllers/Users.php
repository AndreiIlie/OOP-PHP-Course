<?php

class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function login() {
        switch($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $this->view('users/login', 1, []);
            break;
            case 'POST':
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); // Sanitize POST data
            // Initialize data
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'password_err' => ''
            ];

            // Validate username
            if (empty($data['username'])) {
                $data['username_err'] = 'Username field cannot be empty';
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Password field cannot be empty';
            }

            if(empty($data['password_err']) && empty($data['username_err'])) {
                die('good');
            } else {
                $this->view('users/login', true, $data);
            }
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
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); // Sanitize POST data

                // Initialize data
                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'username_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Validate username
                if(empty($data['username'])) {
                    $data['username_err'] = 'Username field cannot be empty';
                } else { // Check if username already exists
                    if($this->userModel->findUserByUsername($data['username'])) {
                        $data['username_err'] = 'Username already taken';
                    }
                }

                // Validate password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Password field cannot be empty';
                } else if (strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password length must be at least 6';
                }

                //Validate confirm_password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Confirm password field cannot be empty';
                } else if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Password confirmation failed';
                }

                // Make sure errors are empty
                if(empty($data['username_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    if($this->userModel->register($data)) {
                        flash('register_success', 'You are registered and can log in.');
                        Redirect('users/login');
                    } else {
                        die('error');
                    }
                } else {
                    // Load view with errors
                    $this->view('users/register', true, $data);
                }
            break;
            default:
                die('Invalid request method');
        }
    }
}


?>
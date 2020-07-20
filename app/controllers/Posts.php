<?php

class Posts extends Controller {

    public function __construct() {
        if(!isset($_SESSION['user_id'])) {
            flash('posts_warning', 'You need to be logged in to view your posts', 'alert alert-warning');
            redirect('users/login');
        }
        $this->model = $this->model('Post');
    }

    public function index() {
        $data = [];
        $data['posts'] = $this->model->getAllPosts();

        $this->view('posts/index', true, $data);
    }

    public function add() {
        switch($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $data = [
                    'title' => '',
                    'body' => '',
                    'title_err' => '',
                    'body_err' => ''
                ];
        
                $this->view('posts/add', true, $data);
            break;
            case 'POST':
                $validated = true;
                // This method takes body, title and user id from session and sends them to the model
                $data = [
                    'title' => $_POST['title'],
                    'body' => $_POST['body'],
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => '',
                    'user_id_err' => ''
                ];

                if(empty($data['title'])) {
                    $data['title_err'] = 'Title cannot be empty';
                    $validated = false;
                }
                if(empty($data['body'])) {
                    $data['body_err'] = 'Post body cannot be empty';
                    $validated = false;
                }
                if(empty($data['user_id'])) {
                    $data['user_id_err'] = 'You must be logged in to post';
                    $validated = false;
                }
                if($validated) {
                    if($this->model->addPost($data)) {
                        Redirect('posts/index');
                    } else {
                        die('form submit did not complete');
                    }
                } else {
                    $this->view('posts/add', true, $data);
                }
            break;
        }
    }
}


?>
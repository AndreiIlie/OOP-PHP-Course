<?php

class Controller {
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $defaultHeadFoot, $data = []) {
        if(file_exists('../app/views/' . $view . '.php')) {
            if($defaultHeadFoot)
                require APPROOT . '/views/inc/header.php';
            require '../app/views/' . $view . '.php';
            if($defaultHeadFoot)
                require APPROOT . '/views/inc/footer.php';
        } else {
            die('View "' . $view . '" doesn\'t exist');
        }
    }
}

?>
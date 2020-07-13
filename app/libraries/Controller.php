<?php

// Base controller class. Is extended upon by other Controllers
class Controller {
    // model($model) - function that requires and instantiates the class within a model file
        // Arguments: $model - model file name
        // Returns: model object
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    // view($view, $defaultHeadFoot, $data = []) - function that requires views and surrounds them with a header and footer if needed. Dies a glorious death if file is not found.
        // Arguments: $view - model file name
        //            $defaultHeadFoot - should the function add the default header and footer files found in views/inc?
        //            $data - array that stores data passed to the view. DEFAULT: []
        // Returns: nothing
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
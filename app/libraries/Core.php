<?php
    // App Core Class

    // Creates URL & loads core controller
    // URL Format: /controller/method/param1/param2/param3/...

    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct() {
            $url = $this->getUrl();

            // Look in controllers for matching name
            // ucwords - capitalizes the first character of the string
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }

            require_once '../app/controllers/' . $this->currentController . '.php';

            $this->currentController = new $this->currentController;
        }

        public function getUrl() {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/'); // Trim / characters
                $url = filter_var($url, FILTER_SANITIZE_URL); // Sanitize the URL
                $url = explode('/', $url); // Splits $url into its parts
                return $url;
            }
        }
    };


?>
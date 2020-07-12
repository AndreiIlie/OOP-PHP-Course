<?php
    // App Core Class

    // Creates URL & loads core controller
    // URL Format: /controller/method/param1/param2/param3/...

    class Core {
        protected $currentController = 'Pages'; // Default controller to load if all else fails
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct() {
            $url = $this->getUrl();

            // Look in controllers for matching name
            // ucwords - capitalizes the first character of the string
            if(isset($url[0])) {
                if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                    $this->currentController = ucwords($url[0]);
                    unset($url[0]);
                }
            }

            require_once '../app/controllers/' . $this->currentController . '.php';

            $this->currentController = new $this->currentController;

            if(isset($url[1])) {
                if(method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                }
                unset($url[1]);
            }

            $this->params = $url ? array_values($url) : [];
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

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
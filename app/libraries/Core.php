<?php
    // App Core Class

    // Creates URL & loads core controller
    // URL Format: /controller/method/param1/param2/param3/...

    class Core {
        protected $currentController = 'Pages'; // Default controller to load if all else fails
        protected $currentMethod = 'index'; // Default controller method to call if all else fails
        protected $params = [];

        public function __construct() {
            $url = $this->getUrl();
            $firstParamMethod = false; // Variable that hold whether the first param was considered a method or not.

            // Look in controllers for matching name
            // ucwords - capitalizes the first character of the string
            if(isset($url[0])) {
                if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                    $this->currentController = ucwords($url[0]);
                } else {
                    $this->currentMethod = $url[0];
                    $firstParamMethod = true;
                }
                unset($url[0]);
            }

            require_once '../app/controllers/' . $this->currentController . '.php';

            $this->currentController = new $this->currentController; // Set currentController to object of the controller meant to be used. Defaults to Pages if there are no parameters set.

            if(isset($url[1]) && !$firstParamMethod) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
            $this->params = $url ? array_values($url) : []; // If the $url array still holds variables, it means there are parameters sent by the user to the controller method and we should re-index them. Otherwise empty the array
            if(method_exists($this->currentController, $this->currentMethod))
                call_user_func_array([$this->currentController, $this->currentMethod], array($this->params)); // Call the controller method
                // THE PARAMS NEED TO BE WRAPPED IN AN ARRAY TO ALLOW PASSING MULTIPLE ARGUMENTS AS A SINGLE PARAM
            else
                die('Invalid method');

        }
        // getUrl() - function that returns the called url sanitized and split by /
        // Returns: array of strings containing the split URL
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
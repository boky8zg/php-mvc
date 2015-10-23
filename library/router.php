<?php
    class Router {
        public static function GetURI() {
            return $_SERVER['REQUEST_URI'];
        }

        public static function Param($index) {
            $params = explode('/', $_SERVER['REQUEST_URI']);

            if (isset($params[$index + 1])) {
                return $params[$index + 1];
            }
        }

        public static function AddRoute($route, $params, $function) {
            if ($route == Router::Param(0)) {
                call_user_func_array($function, $params);
            }
        }
    }
?>
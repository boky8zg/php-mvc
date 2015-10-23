<?php
    class Router {
        private static $routes;

        public static function GetURI() {
            return $_SERVER['REQUEST_URI'];
        }

        public static function Param($paramIndex) {
            $params = explode('/', Router::GetURI());

            if (isset($params[$paramIndex + 1])) {
                return $params[$paramIndex + 1];
            }
        }

        public static function AddRoute($route, $function) {
            Router::$routes[$route] = $function;
        }

        public static function MimeType($filePath) {
            $extension = pathinfo($filePath, PATHINFO_EXTENSION);

            switch ($extension) {
                case 'jpg': return 'image/jpeg';
                case 'png': return 'image/png';
                case 'gif': return 'image/gif';
                case 'svg': return 'image/svg+xml';
                case 'css': return 'text/css';
                case 'js': return 'application/javascript';
            }

            return '';
        }

        public static function PublicRoute($filePath) {
            header('Content-Type: ' . Router::MimeType($filePath));
            readfile(Application::Root() . '/public' . $filePath);

            return 100;
        }

        public static function Route() {
            foreach (Router::$routes as $route => $function) {
                if ($route == Router::Param(0)) {
                    $function();

                    return 100;
                }
            }

            return 404;
        }

        public static function __init() {
            Router::$routes = array(
                'img' => function () {Router::PublicRoute(Router::GetURI());},
                'css' => function () {Router::PublicRoute(Router::GetURI());},
                'js' => function () {Router::PublicRoute(Router::GetURI());}
            );
        }
    }

    Router::__init();
?>
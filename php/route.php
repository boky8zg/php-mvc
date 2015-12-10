<?php
    global $is_routed;
    $is_routed = FALSE;

    function route($route = NULL, $method = NULL) {
        global $is_routed;

        if (isset($route)) {
            if (fnmatch($route, $_SERVER['REQUEST_URI'])) {
                call_user_func($method);
                $is_routed = TRUE;
            }
        } else {
            return $_SERVER['REQUEST_URI'];
        }
    }
    
    function route404($method) {
        global $is_routed;
        
        if (!$is_routed) {
            call_user_func($method);
        }
    }
    
    function param($index) {
        return explode('/', $_SERVER['REQUEST_URI'])[$index + 1];
    }
    
    function root() {
        return $_SERVER['HTTP_HOST'];
    }
?>
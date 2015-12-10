<?php
    global $is_routed;
    $is_routed = FALSE;

    function route($route = NULL, $method = NULL) {
        global $is_routed;

        if (isset($route)) {
            if (fnmatch($route, REQUEST)) {
                call_user_func($method);
                $is_routed = TRUE;
            }
        } else {
            return REQUEST;
        }
    }
    
    function route404($method) {
        global $is_routed;
        
        if (!$is_routed) {
            call_user_func($method);
        }
    }
    
    function param($index) {
        return explode('/', REQUEST)[$index + 1];
    }
    
    function root() {
        return HOST;
    }
?>
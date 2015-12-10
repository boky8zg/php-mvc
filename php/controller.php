<?php
    define('CONTROLLERS_PATH', '_controllers');
    define('PUBLIC_PATH', 'public');

    function controller($file, $function = '', $params = array()) {
        include(CONTROLLERS_PATH . '/' . $file);

        if ($function != '') {
            echo call_user_func_array($function, $params);
        }
    }

    function get_public($file = NULL) {
        if (isset($file)) {
            readfile(PUBLIC_PATH . '/' . $file);
        } else {
            readfile(PUBLIC_PATH . '/' . $_SERVER['REQUEST_URI']);
        }
    }
?>
<?php
    function model($file, $function = NULL, $params = array()) {
        include(ROOT . '/' . MODELS_PATH . '/' . $file);

        if (isset($function)) {
            return call_user_func_array('Model\\' . $function, $params);
        }
    }
?>
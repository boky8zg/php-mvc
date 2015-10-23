<?php
    class Application {
        public static function Root() {
            return str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
        }
    }
?>
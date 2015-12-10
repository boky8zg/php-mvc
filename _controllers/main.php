<?php
    namespace Controller;

    include('menu.php');

    global $common;
    $common = array(
        'root' => root(),
        'app-name' => APP_NAME,
        'subtitle' => ' &#x2756; ' . ActiveMenuText()
    );

    function Main() {
        global $common;

        return template('index.php', array_merge($common, array(
            'content' => template('main.php', $common)
        )));
    }

    function About() {
        global $common;

        return template('index.php', array_merge($common, array(
            'content' => load('about.php')
        )));
    }

    function NotFound() {
        global $common;

        return template('index.php', array_merge($common, array(
            'content' => load('404.php')
        )));
    }
?>

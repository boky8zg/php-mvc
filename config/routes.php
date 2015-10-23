<?php
    Router::AddRoute('', function () {
        echo 'Hello, world!';
    });

    Router::AddRoute('user', function () {
            echo Router::Param(1);
        }
    );

    Router::Route();
?>
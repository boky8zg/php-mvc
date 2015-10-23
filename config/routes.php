<?php
    Router::AddRoute('', [], function () {
        echo 'Hello, world!';
    });

    Router::AddRoute(
        'user',
        [
            'username' => Router::Param(1)
        ],
        function ($username) {
            echo $username;
        }
    );
?>
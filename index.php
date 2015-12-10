<?php
/* TODO: redirektat na 404, ukoliko public datoteka ne postoji!!! */

/* Includes */
     include('php/engine.php');
    
/* Constants */
    define('APP_NAME', 'Moja aplikacija');

/* Public routes */
    route('/css/*', function () {
        header('Content-Type: text/css');
        get_public();
    });

    route('/js/*', function () {
        header('Content-Type: text/javascript');
        get_public();
    });

    route('/fotns/*', function () {
        header('Content-Type: */*');
        get_public();
    });

    route('/images/*', function () {
        if (fnmatch(route(), '/images/*.jpg')) {
            header('Content-Type: image/jpeg');
        }
        elseif (fnmatch(route(), '/images/*.png')) {
            header('Content-Type: image/png');
        }
        else {
            header('Content-Type: image/*');
        }

        get_public();
    });

/* Site routes */
    route('/', function () {
        controller('main.php', 'Main');
    });

    route('/about', function () {
        controller('main.php', 'About');
    });

    route('/404', function () {
        controller('main.php', 'NotFound');
    });

/* Ajax routes */
    route('/ajax/posts', function () {
        $start = isset($_POST['start']) ? $_POST['start'] : NULL;
        $count = isset($_POST['count']) ? $_POST['count'] : NULL;

        if (isset($start) && isset($count)) {
            header('Content-Type: application/ajax');
            controller('/ajax/posts.php', 'GetPosts', [$start, $count]);
        }

        echo FALSE;
    });

    route('/ajax/posts/pages', function () {
        $postsPerPage = isset($_POST['postsPerPage']) ? $_POST['postsPerPage'] : NULL;

        if (isset($postsPerPage)) {
           
            header('Content-Type: application/ajax');
            controller('/ajax/posts.php', 'GetPostsPagesCount', [$postsPerPage]);
        }

        echo FALSE;
    });

/* 404 */
    route404(function () {
        header('Location: /404');
    });
?>

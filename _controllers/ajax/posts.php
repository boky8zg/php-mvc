<?php
    namespace Controller;

    function GetPosts($start, $count) {
        $output = model('posts.php', 'GetPosts', [$start, $count]);

        return json_encode($output);
    }

    function GetPostsPagesCount($postsPerPage) {
        $output = model('posts.php', 'GetPostsPagesCount', [$postsPerPage]);

        return json_encode(array('pages' => $output));
    }
?>
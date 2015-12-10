<?php
    namespace Model;

    function GetPosts($start, $count) {
        $conenction = new \Connection();

        return $conenction->query('SELECT Title, Text FROM Post LIMIT {0}, {1}', [$start, $count]);
    }

    function GetPostsPagesCount($postsPerPage) {
        $conenction = new \Connection();

        return ceil($conenction->query('SELECT COUNT(*) AS Posts FROM Post')[0]['Posts']) / $postsPerPage;
    }
?>
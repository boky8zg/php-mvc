<?php
    function GetPosts($start, $count) {
        /*$conenction = mysqli_connect('localhost', 'root', '0000', 'TestBase');

        $query = "SELECT Title, Text FROM Post LIMIT $start, $count";
        $result = mysqli_query($conenction, $query);

        $output = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $output[] = $row;
        }

        mysqli_free_result($result);
        mysqli_close($conenction);
        */
        $conenction = new Connection();
        $output = $conenction->query('SELECT Title, Text FROM Post LIMIT {0}, {1}', [$start, $count]);

        return json_encode($output);
    }

    function GetPostsPagesCount($postsPerPage) {
        /*$conenction = mysqli_connect('localhost', 'root', '0000', 'TestBase');

        $query = "SELECT COUNT(*) AS Posts FROM Post";
        $result = mysqli_query($conenction, $query);

        $row = mysqli_fetch_assoc($result);
        $output = array('pages' => ceil($row['Posts'] / $postsPerPage));
        
        mysqli_free_result($result);
        mysqli_close($conenction);*/

        $conenction = new Connection();
        $output = $conenction->query('SELECT COUNT(*) AS Posts FROM Post');
        $output = array('pages' => ceil($output[0]['Posts'] / $postsPerPage));

        return json_encode($output);
    }
?>
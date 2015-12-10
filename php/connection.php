<?php
    class Connection {
        private $dbServer = 'localhost';
        private $dbUserName = 'root';
        private $dbPassword = '0000';
        private $dbName = 'TestBase';
        private $connection;

        function __construct() {
            $this->connection = mysqli_connect(
                $this->dbServer,
                $this->dbUserName,
                $this->dbPassword,
                $this->dbName
            );

            mysqli_set_charset($this->connection, 'utf8');
        }

        function query($queryString, $params = NULL) {
            $queryString = isset($params) ? str_format($queryString, $params) : $queryString;
            $queryResult = mysqli_query($this->connection, $queryString);

            if ($queryResult) {
                $outputArray = array();

                while ($row = mysqli_fetch_assoc($queryResult)) {
                    $outputArray[] = $row;
                }

                mysqli_free_result($queryResult);
                mysqli_next_result($this->connection);

                return $outputArray;
            }

            return FALSE;
        }

        function __destruct() {
            mysqli_close($this->connection);
        }
    }
?>
<?php
    class DbConnection {
        private $host = "127.0.0.1";
        private $user = "forPHP";
        private $password = "1111";
        private $database = "memopage";

        private static $dbConn;

        private function __construct() {
            if(DbConnection::$dbConn == null)
                DbConnection::$dbConn = mysqli_connect($this -> host, $this -> user, $this -> password, $this -> database);
        }

        private static $instatnce;
        public static function getInstatnce() {
            if(DbConnection::$instatnce == null) {
                DbConnection::$instatnce = new DbConnection();
            }
            return DbConnection::$instatnce;
        }

        public function get_result(string $query) {
            return mysqli_query(DbConnection::$dbConn, $query);
        }

        public function free_result(mysqli_result $result) {
            mysqli_free_result($result);
        }

    }
?>
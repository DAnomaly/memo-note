<?php
    class DbConnection {
        private $host = "127.0.0.1";
        private $user = "forPHP";
        private $password = "1111";
        private $database = "memopage";

        private static $dbConn;
        /**
         * DbConnection 생성자<br/>
         * _db_conn 생성
         */
        public function __construct() {
            if(DbConnection::$dbConn == null)
                DbConnection::$dbConn = mysqli_connect($this -> host, $this -> user, $this -> password, $this -> database);
        }

        public function get_result($query) {
            return mysqli_query(DbConnection::$dbConn, $query);
        }

    }
?>
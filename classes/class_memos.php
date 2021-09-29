<?php
    include_once "../classes/class_db.php";

    class Memos{
        public static function getMemo(int $no) {
            $query = "SELECT NOTES_NO, CATEGORY_NO, NOTES_TITLE, NOTES_CONTENT, NOTES_DATE FROM NOTES WHERE NOTES_NO = $no";
            Memos::write($query);
        }

        public static function getMemos() {
            $query = "SELECT NOTES_NO, CATEGORY_NO, NOTES_TITLE, NOTES_CONTENT, NOTES_DATE FROM NOTES";
            Memos::write($query);
        }

        private static function write(string $query) {
            $result = DbConnection::getInstatnce() -> get_result($query);

            $index = 0;
            while( $data = mysqli_fetch_assoc($result) ) {
                $arr[$index] = $data;
                $index++;
            }

            echo json_encode($arr);
            
            DbConnection::getInstatnce() -> free_result($result);
        }

    }
?>
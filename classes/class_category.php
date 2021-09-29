<?php
    include_once "../classes/class_db.php";

    class Category {
        public static function getCategory() {
            $query = "SELECT CATEGORY_NO, CATEGORY_NAME, CATEGORY_COLOR, CATEGORY_SORT FROM CATEGORY ORDER BY CATEGORY_SORT";
            
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
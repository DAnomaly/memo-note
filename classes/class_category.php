<?php
    include_once "../classes/class_db.php";

    class CategoryUtils{

        private $connection;

        // 생성자 (private)
        private function __construct(){
            if ($this -> connection == null) {
                $this -> connection = new DbConnection;
            }
        }

        // Single-ton
        private static $categoryUtils;
        public static function getCategoryUtils(){
            if(CategoryUtils::$categoryUtils == null)
                CategoryUtils::$categoryUtils = new CategoryUtils;
            return CategoryUtils::$categoryUtils;
        }

        // 카테고리 추가
        public function insertCategory($name){
            if(!$name) {
                return false;
            }
            $query = "INSERT INTO category VALUES (FNC_CATEGORY_NO(), '{$name}');";
            return $this -> connection -> get_result($query);
        }

        // 카테고리 삭제
        public function deleteCategory($no) {
            if(!$no) {
                return false;
            }
            $this -> deleteMemosFromCategory($no);
            $query = "DELETE FROM category WHERE category_no = {$no}";
            return $this -> connection -> get_result($query);
        }

        // 해당 카테고리의 모든 메모를 삭제합니다.
        private function deleteMemosFromCategory($no) {
            $query = "DELETE FROM notes WHERE category_no = {$no}";
            $this -> connection -> get_result($query);
        }

    }

?>
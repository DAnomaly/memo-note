<?php
    include_once "../classes/class_db.php";

    class ExecuteWrite{
        function writeScript($title, $content, $category) {
            $controller = new InsertMemoController;
            $result = $controller -> insertMemo($title, $content, $category);
            
            if($result) {
                echo "location.href='../index.html';";
            } else {
                echo "alert('메모 작성 중 오류가 발생했습니다.');";
            }
        }
    }

    // memo 작성 클래스
    class InsertMemoController{
        private $connection;

        // constructor
        public function __construct() {
            $this -> connection = new DbConnection;
        }

        // memo 삽입 (작업 분류)
        public function insertMemo($title, $content, $category) {
            $title = isset($title) ? $title : null;
            $category = isset($category) ? $category : null;
            if($category)
                $returnVal = $this -> insertMemoCategoryNotNull($title, $content, $category);
            else 
                $returnVal = $this -> insertMemoCategoryNull($title, $content);
            return $returnVal;
        }

        // memo 삽입 (category : NOT NULL)
        private function insertMemoCategoryNotNull($title, $content, $category) {
            $query = "INSERT INTO notes VALUES(FNC_NOTES_NO(),'".$title."','".$content."',".$category.")";
            $result = $this -> connection -> get_result($query);
            return (bool)$result;
        }

        // memo 삽입 (category : NULL)
        private function insertMemoCategoryNull($title, $content) {
            $query = "INSERT INTO notes VALUES(FNC_NOTES_NO(),'".$title."','".$content."',NULL)";
            $result = $this -> connection -> get_result($query);
            return (bool)$result;
        }

    }

?>
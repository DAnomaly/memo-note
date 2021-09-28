<?php
    include_once "../classes/class_db.php";

    class ExecuteDelete {
        function writeScript($no) {
            $controller = new DeleteMemoController;
            $result = $controller -> deleteMemo($no);

            if($result) {
                echo "location.href='../index.html';";
            } else {
                echo "alert('메모 삭제 중 오류가 발생했습니다.');";
            }
        }
    }

    class DeleteMemoController {
        private $connection;

        // constructor
        public function __construct() {
            $this -> connection = new DbConnection;
        }

        // memo 삭제 (삭제 대상 판변 후 메소드 지정)
        public function deleteMemo($no) {
            $cnt = count($no);
            if($cnt == 1) {
                return $this -> deleteMemoOnce($no);
            } else {
                return $this -> deleteMemoMultiple($no);
            }
        }

        // memo 삭제 (삭제 대상 1개)
        public function deleteMemoOnce($no) {
            $query = "DELETE FROM notes WHERE notes_no = " . $no[0];
            $result = $this -> connection -> get_result($query);
            return (bool)$result;
        }


        // memo 삭제 (삭제 대상 2개 이상)
        public function deleteMemoMultiple($no) {
            $nos = "";
            for($i = 0; $i < count($no); $i++) {
                if($i == 0) {
                    $nos .= $no[$i];
                } else {
                    $nos .= " , " . $no[$i];
                }
            }
            $query = "DELETE FROM notes WHERE notes_no IN (" . $nos . ")";
            $result = $this -> connection -> get_result($query);
            return (bool)$result;
        }
    }

    
?>
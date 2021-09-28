<?php
    include_once "../classes/class_category.php";
?>
<!DOCTYPE html>
<html>
    <script>
        <?php
            $categoryUtils = CategoryUtils::getCategoryUtils();
                
            $param = isset($_REQUEST["name"]) ? $_REQUEST["name"] : false;
            if($categoryUtils -> insertCategory($param)){
                echo "location.href='../index.html';";
            } else {
                echo "alert('카테고리 추가 중 문제가 발생하였습니다.');";
            }
        ?>
    </script>
</html>

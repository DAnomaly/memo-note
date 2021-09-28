<?php
    include_once "../classes/class_category.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <script>
            <?php
                $categoryUtils = CategoryUtils::getCategoryUtils();

                if(isset($_REQUEST["no"]) && $categoryUtils -> deleteCategory($_REQUEST["no"])){
                    echo "location.href='../index.html';";
                } else {
                    echo "alert('카테고리 삭제 중 오류가 발생했습니다.');";
                }
            ?>
        </script>
    </head>
</html>
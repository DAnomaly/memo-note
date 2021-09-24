<!DOCTYPE html>
<?php
    include_once "../classes/class_write.php";

    $excuteWrite = new ExecuteWrite;
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <script>
            <?php
                $excuteWrite -> writeScript($_REQUEST["title"],$_REQUEST["content"],$_REQUEST["category"]);
            ?>
        </script>
    </head>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script>
<?php
    include_once "../classes/class_delete.php";

    $execute = new ExecuteDelete;
    $execute -> writeScript($_REQUEST["no"]);
?>
        </script>
    </head>
</html>

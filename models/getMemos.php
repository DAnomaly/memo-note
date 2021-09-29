<?php
    include_once "../classes/class_memos.php";

    // WORK

    if(isset($_REQUEST['no'])){
        Memos::getMemo($_REQUEST['no']);
    } else {
        Memos::getMemos();
    }


?>
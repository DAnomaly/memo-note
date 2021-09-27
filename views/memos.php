<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>NOTES</title>
        <link rel="stylesheet" href="../assets/css/memos.css"/>
        <script src="https://kit.fontawesome.com/7d4c3e1ea0.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="../assets/script/memos.js"></script>
    </head>
    <body>

        <!-- header -->
        <header>
            <div>
                <h1 class="title">NOTES</h1>
                <div class="submenu">
                    <a href="javascript:void(0);" id="delete">
                        <i class="far fa-trash-alt"></i>
                        <span>
                            삭제
                        </span>
                    </a>
                    <a id="write" href="../views/write.php">
                        <i class="far fa-plus-square"></i>
                        <span>새 노트 작성</span>
                    </a>
                </div>
            </div>
        </header>

        <!-- nav -->
        <nav>
            <div>
                <ul>
                    <li>
                        <a id="cat-0" href="../views/memos.php">전체메모</a>
                    </li>      
<?php 
    include_once "../classes/class_db.php";
    
    $connection = new DbConnection();

    $query = "SELECT category_no, category_name FROM category";

    if($result = $connection -> get_result($query)) {

        echo "<ul>";

        while($row = mysqli_fetch_assoc($result)) {
            $category_no = $row['category_no'];
            $category_name = $row['category_name'];
            echo "<li>";
            echo "<a id=\"cat-".$category_no."\" href=\"../views/memos.php?cat=".$category_no."\">";
            echo $category_name;
            echo "</a>";
            echo "</li>";
        }

        echo "</ul>";

    }
    
    mysqli_free_result($result);
?>
                </ul>  
            </div>
        </nav>

        <!-- section -->
        <section>
            <form id="memos-form" method="post">
                <div class="content-box">
<?php
    include_once "../classes/class_db.php";
    
    $connection = new DbConnection();
    
    $query = "";

    $category = isset($_REQUEST['cat']) ? $_REQUEST['cat'] : "";
    if($category) {
        $query = "SELECT notes_no, title, content, category_no FROM notes WHERE category_no = " . $category;
    } else {
        $query = "SELECT notes_no, title, content, category_no FROM notes";
    }

    if($result = $connection -> get_result($query)) {
        while($row = mysqli_fetch_assoc($result)) {
            $notes_no = $row['notes_no'];
            $title = $row['title'];
            $content = $row['content'];
            $category_no = $row['category_no'];
            echo "<label>";
            echo "<div class=\"memo-box index-". $notes_no ."\">";
            echo "<div class=\"title-box\">";
            echo "<span class=\"title\">".$title."</span>";
            echo "<span class=\"checkbox\">"."<input class=\"index-check\" type=\"checkbox\" name=\"no[]\" value=\"{$notes_no}\"/>"."</span>";
            echo "</div>";
            echo "<div class=\"content\">";
            echo "<pre>". $content . "</pre>";
            echo "</div>";
            echo "</div>";
            echo "</label>";
        }
    }

    mysqli_free_result($result);
?>
                </div>
            </form>
        </section>
    </body>
</html>
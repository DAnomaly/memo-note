<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>NOTES : WRITE</title>
        <link rel="stylesheet" href="../assets/css/write.css"/>
        <script src="https://kit.fontawesome.com/7d4c3e1ea0.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="../assets/script/write.js"></script>
    </head>
    <body>
        <header>
            <div>
                <h1 class="title">NOTES : 새 메모 작성</h1>
            </div>
        </header>
        <section>
            <form id="form" action="../models/m_write.php">
                <div class="option-box">
                    <ul class="option-ul left-ul">
                        <li>
                            <button id="back-btn" class="select-option" type="button">
                                <span>
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                                <span>
                                    뒤로가기
                                </span>
                            </button>
                        </li>
                    </ul>
                    <ul class="option-ul right-ul">
                        <li>
                            <span class="select-option">
                                <span>
                                    <i class="fas fa-bars"></i>
                                </span>
                                <span>
                                    <select name="category">
                                        <option value="">[없음]</option>

    <?php
        # 'Find category' And 'Add option tag'
        include_once "../classes/class_db.php";
        
        $connection = new DbConnection();
        
        $query = "SELECT category_no, category_name FROM category";

        if($result = $connection -> get_result($query)) {
            while($row = mysqli_fetch_assoc($result)) {
                $category_no = $row['category_no'];
                $category_name = $row['category_name'];
                echo "<option value=\"".$category_no."\">".$category_name."</option>";
            }
        }

        mysqli_free_result($result);
    ?>

                                    </select>
                                </span>
                            </span>
                        </li>
                        <li>
                            <button id="submit_btn" class="select-option" type="button">
                                <span>
                                    <i class="far fa-sticky-note"></i>
                                </span>
                                <span>
                                    작성
                                </span>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="memo-box">
                    <label class="title-box" style="display: block;">
                        <input type="text" name="title"/>
                    </label>
                    <label class="content" style="display: block;">
                        <textarea name="content"></textarea>
                    </label>
                </div>
            </form>
        </section>
    </body>
</html>
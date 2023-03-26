<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../App.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./diaryLayoutstyle.css?v=<?php echo time(); ?>">
    <title>Trang chủ - DiaryBook</title>
</head>


<body>
    <header>
        <a href="../homeLayout/HomeLayout.html">
            <h1>Diary Book Electric</h1>
        </a>
        <p class="name_user">
            <img src="https://kynguyenlamdep.com/wp-content/uploads/2022/06/avatar-cute-vui-nhon.jpg" class="avt" alt="">
            <?php
            session_start();
            $userNameSession = $_SESSION["user_name"];
            echo $userNameSession;
            ?>
        </p>
    </header>

    <ul>
        <a href="../newNote/newNote.html"><button class="create-new-button"><i class="fa-solid fa-square-plus"></i>Tạo
                mới</button></a>
        <mark style="color: red;">Chào <?php
                                        echo $userNameSession;
                                        ?>, khởi động ngày mới bằng một chút ghi chú chứ nhỉ :))</mark>


        <?php
        $dsn = 'mysql:host=localhost;dbname=bookstore';
        $userNameMSQ = 'root';
        $passwordMSQ = 'password';
        try {
            $pdo = new PDO($dsn, $userNameMSQ, $passwordMSQ);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Kết nối đến cơ sở dữ liệu thất bại: ' . $e->getMessage();
        }
        $sql_select_ctx = $pdo->prepare("select * from list_book where user_id = (select USER_ID from user where user_name = '$userNameSession' )");
        $sql_select_ctx->execute();
        $resultCtx = $sql_select_ctx->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php for ($i = 0; $i < count($resultCtx); $i++) { ?>
            <li>
                <button class="snip1547 hover">
                    <span>
                        <?php
                        echo $resultCtx[count($resultCtx)-$i-1]["DATE_PUSH"];
                        ?>
                    </span>
                </button>
    
    
                <h2><?php
    
                    echo $resultCtx[count($resultCtx)-$i-1]["TITLE_BOOK"];
                    ?></h2>
                <p>
                    <?php
    
                    echo $resultCtx[count($resultCtx)-$i-1]["CONTENT_BOOK"];
                    ?>
                </p>
            </li>
        <?php } ?>



    </ul>
    <footer>
        <p>Copyright © 2023</p>
    </footer>
</body>

</html>
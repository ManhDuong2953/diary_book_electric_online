<?php 
    session_start();
    $userNameSession = $_SESSION["user_name"];

    $dsn = 'mysql:host=localhost;dbname=bookstore';
    $userNameMSQ = 'root';
    $passwordMSQ = 'password';

    $title = $_POST['title'];
    $content = $_POST['content'];
    echo $title . $content . $userNameSession;
    
    try {
        $pdo = new PDO($dsn, $userNameMSQ, $passwordMSQ);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Kết nối đến cơ sở dữ liệu thất bại: ' . $e->getMessage();
    }
    if(!empty($title) && !empty($content)){
        $current_time = date('Y-m-d');
        $sql_select_ctx = $pdo->prepare("INSERT INTO list_book (USER_ID, DATE_PUSH, TITLE_BOOK, CONTENT_BOOK)
        SELECT  user.user_id,'$current_time',  '$title',  '$content'
        FROM user 
        WHERE user_id = (
            select user_id from user where user_name = '$userNameSession'
        )");
    
        $sql_select_ctx->execute();

        header('Location: ../diaryLayout/diaryLayout.php');
        exit;
    }
?>
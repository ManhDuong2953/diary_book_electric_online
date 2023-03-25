


<?php
session_start();
$userName = null;
$passWord = null;
$error = null;

$regrexPopular = "/^[a-zA-Z0-9_\s]*$/";

if (empty($_GET['username']) || empty($_GET['password'])) {
    $error = "Mật khẩu hoặc tên đăng nhập không chính xác";
} else {
    if (!preg_match($regrexPopular, $_GET['username'])) {
        $error = "Tên đăng nhập chỉ được chứa các ký tự chữ, số và gạch dưới";
    } else {

        $userName = $_GET['username'];
        $passWord = $_GET['password'];

        $dsn = 'mysql:host=localhost;dbname=bookstore';
        $userNameMSQ = 'root';
        $passwordMSQ = 'password';

        try {
            $pdo = new PDO($dsn, $userNameMSQ, $passwordMSQ);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Kết nối đến cơ sở dữ liệu thất bại: ' . $e->getMessage();
        }

        try {
            $selectquery = $pdo->prepare("SELECT * from user");
            $selectquery->execute();
            $result = $selectquery->fetchAll(PDO::FETCH_ASSOC);
            for ($i = 0; $i < count($result); $i++) {
                if ($result[$i]["USER_NAME"] === $userName && $result[$i]["USER_PASSWORD"] === $passWord) {
                    $_SESSION['user_name'] = $userName;
                    header("Location: ../diaryLayout/diaryLayout.php");
                    exit;
                    return;
                }
            }
            throw new Exception("Tài khoản không hợp lệ hoặc không tồn tại!!!");
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}

echo $error;

?>




<?php
$userName = null;
$passWord = null;
$confirmPass = null;
$error = null;
$r = null;

$regrexPopular = "/^[a-zA-Z0-9_\s]*$/";

if (empty($_POST['username']) || empty($_POST['password'])  || empty($_POST['re-password'])) {
    $error = "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu";
} else {
    if (!preg_match($regrexPopular, $_POST['username'])) {
        $error = "Tên đăng nhập chỉ được chứa các ký tự chữ, số và gạch dưới";
    } else {
        if ($_POST['password']  != $_POST['re-password']) {
            $error  = 'Mật khẩu không trùng khớp';
        } else {
            $userName = $_POST['username'];
            $passWord = $_POST['password'];
            $confirmPass = $_POST['re-password'];

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
                $checkUserName = $pdo->prepare("SELECT * from user where USER_NAME = '$userName'");
                $checkUserName->execute();
                $checkresult = $checkUserName->fetchAll(PDO::FETCH_ASSOC);

                if (count($checkresult) === 0) {
                    $sql = "INSERT INTO user VALUES (null,'$userName','$passWord')";
                    $pdo->exec($sql);
                    echo "Tài khoản của bạn đã được tạo.";
                    header('Location: ../loginFolder/loginLayout.html');
                    exit;
                    return;
                }

                throw new Exception("Tên tài khoản đã tồn tại hoặc không hợp lệ!!");
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
echo $error;

?>

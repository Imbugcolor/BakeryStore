<?php
    include('conn.php');

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $password_verify = md5($_POST['password-verify']);
        if ($password == $password_verify) {
            $sql = 'INSERT INTO `user` (`user_name`,`password`,`email`,`status`,date_create_user)
                    VALUES ("'.$username.'","'.$password.'","'.$email.'","1","'.date("Y-m-d H:i:s").'")';
            $result = mysqli_query($connect, $sql);
            $message = "Đăng ký tài khoản thành công!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else {
            $message = "Mật khẩu xác nhận chưa đúng!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Sign up</title>
    <link rel="stylesheet" href="./assets/css/logincss.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email" >
            <p class="login-text" style="font-size: 2rem; font-weight: 700;">Đăng ký</p>
            <div class="input-group">
                <input type="text" placeholder="Tài khoản" name="username" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Mật khẩu" name="password" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Xác nhận mật khẩu" name="password-verify" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Đăng ký</button>
            </div>
        </form>
        <p class="login-register-text">Đã có tài khoản? <a href="login.php">Đăng nhập ngay</a></p>
    </div>
</body>
</html>
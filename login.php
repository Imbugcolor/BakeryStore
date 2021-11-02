<?php
    ob_start();
    session_start();
    include("conn.php");
    if(isset($_POST["login"])){
        $userName = $_POST["username"];
        $password = md5($_POST["password"]);

        if(isset($_POST["remember"])){
            setcookie("username",$userName);
            setcookie("password",$_POST["password"]);
        }
        $sqlLogin = "SELECT * FROM `user` WHERE `user_name`='$userName' AND `password`='$password' LIMIT 1 ";
        $result = mysqli_query($connect,$sqlLogin);
        $row = mysqli_fetch_row($result);
        if(mysqli_num_rows($result)==0){
            $message = "Sai tài khoản hoặc mật khẩu!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            // header("location: login.php"); 
        } 
        else{     
            $_SESSION["login"] = $row;
            header("location: infor_user.php");
        } 
    }
    $userName ="";
    $password = "";
    $check = false;
    if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
        $userName = $_COOKIE["username"];
        $password = $_COOKIE["password"];
        $check = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="./assets/css/logincss.css">
    <title>Đăng nhập</title>
</head>
<body>
    <div class="container">
        <div class="home"> <a href="index.php"><i class="fas fa-arrow-left"></i> Quay về trang chủ</a></div>
        <form class="login-email" action="" method="post">
            <p class="login-text" style="font-size: 2rem; font-weight: 700;">Đăng nhập</p>
            <div class="input-group">
                <input type="text" name="username" placeholder="Tên tài khoản" value="<?php echo $userName ?>" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Mật khẩu" value="<?php echo $password ?>" required>
            </div>
            <div class="input-group">
                <input <?php echo ($check)?"checked":"" ?> class="remember" type="checkbox" name="remember" value="1"><span>Ghi nhớ tài khoản</span>
            </div>
            <div class="input-group">
                <button class="btn" name="login">Login</button>
            </div>
        </form>
        <p class="login-register-text">Chưa có tài khoản? <a href="signup.php">Đăng ký ngay</a></p>
    </div>
</body>
</html>
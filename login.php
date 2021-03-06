<?php
ob_start();
session_start();
include("conn.php");
if (isset($_POST["login"])) {
    $userName = $_POST["username"];
    $password = md5($_POST["password"]);

    if (isset($_POST["remember"])) {
        setcookie("username", $userName);
        setcookie("password", $_POST["password"]);
    }
    $sqlLogin = "SELECT * FROM `user` WHERE `user_name`='$userName' AND `password`='$password' LIMIT 1 ";
    $result = mysqli_query($connect, $sqlLogin);
    $row = mysqli_fetch_row($result);
    if (mysqli_num_rows($result) == 0) {
        header("location: login.php?error=Sai tài khoản hoặc mật khẩu");
        exit();
    } else {
        $_SESSION["login"] = $row;
        header("location: infor_user.php");
        exit();
    }
}
$userName = "";
$password = "";
$check = false;
if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
    $userName = $_COOKIE["username"];
    $password = $_COOKIE["password"];
    $check = true;
}
require_once "config.php";

$redirectURL = "http://localhost/BakeryStore/fb-callback.php";
$permissions = ['email'];
$loginURL = $helper->getLoginUrl($redirectURL, $permissions);

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
    <style>
        /*-------------LOADER CSS-----------------*/

        /*CUSTOM PRELOADER*/
        .loader-bg {
            position: fixed;
            z-index: 999999;
            background: #fff;
            width: 100%;
            height: 100%;
        }

        .loader-p {
            border: 0 solid transparent;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            position: absolute;
            top: calc(50vh - 75px);
            left: calc(50vw - 75px);
        }

        .loader-p:before,
        .loader-p:after {
            content: '';
            border: 1em solid #FF4A52;
            border-radius: 50%;
            width: inherit;
            height: inherit;
            position: absolute;
            top: 0;
            left: 0;
            animation: loader 2s linear infinite;
            opacity: 0;
        }

        .loader-p:before {
            animation-delay: 0.5s;
        }

        @keyframes loader {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                transform: scale(1);
                opacity: 0;
            }
        }

        /*end of custom preloader*/

        /*-------------END LOADER CSS-----------------*/
    </style>
    <div class="container">
        <div class="home"> <a href="index.php"><i class="fas fa-arrow-left"></i> Quay về trang chủ</a></div>
        <form class="login-email" action="" method="post">
            <p class="login-text" style="font-size: 2rem; font-weight: 700;">Đăng nhập</p>
            <?php
            if (isset($_GET['error'])) { ?>
                <p style="background-color: #FF4A52; border-radius: 50px; color: #fff; text-align: center; padding:5px 0; margin-bottom: 10px;" class="error"><?php echo $_GET['error']; ?></p>
            <?php  }
            ?>
            <div class="input-group">
                <input type="text" name="username" placeholder="Tên tài khoản" value="<?php echo $userName ?>" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Mật khẩu" value="<?php echo $password ?>" required>
            </div>
            <div class="input-group">
                <input <?php echo ($check) ? "checked" : "" ?> class="remember" type="checkbox" name="remember" value="1"><span>Ghi nhớ tài khoản</span>
            </div>
            <div class="input-group">
                <button class="btn" name="login">Login</button>
            </div>
        </form>
        <p class="login-register-text">Chưa có tài khoản? <a href="signup.php">Đăng ký ngay</a></p>
    </div>
    <!--loader-->
    <div class="loader-bg">
        <div class="loader-p">

        </div>
    </div>
    <!--end loader-->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    //set time loader
    setTimeout(function() {
        $('.loader-bg').fadeToggle();
    }, 1000);
</script>

</html>
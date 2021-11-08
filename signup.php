<?php
    include('conn.php');
    ob_start();
    error_reporting(0);

    session_start();

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $fullname = $_POST['fullname'];
        $password = md5($_POST['password']);
        $password_verify = md5($_POST['password-verify']);
        if ($password == $password_verify) {
            $sql1 = "SELECT * FROM `user` WHERE `email` = '$email'";
            $sql2 = "SELECT * FROM `user` WHERE `user_name` = '$username'";
            $result1 = mysqli_query($connect, $sql1);
            $result2 = mysqli_query($connect, $sql2);
            if (mysqli_num_rows($result1) > 0){
                $_POST['password']='';
                $_POST['password-verify']='';
                header('location: signup.php?error=Email đã được đăng ký');
            } else if (mysqli_num_rows($result2) > 0) {
                $_POST['password']='';
                $_POST['password-verify']='';
                header('location: signup.php?error=Tên người sử dụng đã tồn tại');
            } else {
                $sql = 'INSERT INTO `user` (`user_name`,`password`,`email`,`role`,date_create_user,`status`)
                VALUES ("'.$username.'","'.$password.'","'.$email.'","1","'.date("Y-m-d H:i:s").'","1")';
                $result = mysqli_query($connect, $sql);
                if ($result) {
                    header('location: signup.php?success=Tạo tài khoản thành công, đăng nhập ngay và trải nghiệm!');
                    $username ='';
                    $email = '';
                    $_POST['fullname'] = '';
                    $_POST['password'] = '';
                    $_POST['password-verify'] = '';
                } else {               
                    header('location: signup.php?error=Có gì đó không đúng, vui lòng thử lại!');
                }
            }
        } else {
            header('location: signup.php?error=Xác nhận mật khẩu chưa đúng!');
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
            <?php
                if(isset($_GET['error'])){ ?>
                    <p style="background-color: #FF4A52; border-radius: 50px; color: #fff; text-align: center; padding:5px 0; margin-bottom: 10px;" class="error"><?php echo $_GET['error']; ?></p>
              <?php  }
            ?>
            <?php
                if(isset($_GET['success'])){ ?>
                    <p style="background-color: #01CE69; border-radius: 50px; color: #fff; text-align: center; padding:5px 0; margin-bottom: 10px;" class="error"><?php echo $_GET['success']; ?></p>
              <?php  }
            ?>
            <div class="input-group">
                <input type="text" placeholder="Tài khoản" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Họ và tên" name="fullname" value="<?php echo $_POST['fullname']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Mật khẩu" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Xác nhận mật khẩu" name="password-verify" value="<?php echo $_POST['password-verify']; ?>" required>
            </div>

            <div class="input-group">
                <button name="submit" class="btn">Đăng ký</button>
            </div>
        </form>
        <p class="login-register-text">Đã có tài khoản? <a href="login.php">Đăng nhập ngay</a></p>
    </div>
</body>
</html>
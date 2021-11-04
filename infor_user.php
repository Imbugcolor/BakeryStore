<?php
    ob_start();
    session_start();
    include('header.php');
    include('conn.php');
    if(!isset($_SESSION["login"])){
        header("location: login.php");
    }
    if (isset($_POST['update'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $currentUser_id = $_SESSION["login"]["0"];
        $sqlUpdate = "UPDATE `user` SET `full_name`= '$fullname', `phone`='$phone', `address`='$address' WHERE `user_id` = '$currentUser_id'";
        $result = mysqli_query($connect, $sqlUpdate);
        header("location: infor_user.php?success=Cập nhật thông tin thành công!");
    }  
?>
<div class="inforuser_container">
    <h2>Thông tin khách hàng</h2>
    <form action="" method="post">
            <?php
                if(isset($_GET['success'])){ ?>
                    <p style="background-color: #01CE69; border-radius: 50px; color: #fff; text-align: center; padding:5px 0; margin-bottom: 10px;" class="success"><?php echo $_GET['success']; ?></p>
              <?php  }
            ?>
            <?php                 
                    $currentUser_id = $_SESSION["login"]["0"];
                    $sqlslt = "SELECT * FROM `user` WHERE `user_id`='$currentUser_id'";
                    $result = mysqli_query($connect, $sqlslt);
                    $row = mysqli_fetch_array($result);
            ?>
            <div class="input-group">
                <label>Tên tài khoản:</label>
                <input type="text" placeholder="Tài khoản" name="username" disabled value="<?php echo $row["user_name"]; ?>" required>
            </div>
            <div class="input-group">
                <label>Email:</label>
                <input type="email" placeholder="Email" name="email" disabled value="<?php echo $row["email"]; ?>" required>
            </div>
            <div class="input-group">
                <label>Họ tên khách hàng:</label>
                <input type="text" placeholder="Họ và tên" name="fullname" value="<?php echo $row["full_name"]; ?>" required>
            </div>
            <div class="input-group">
                <label>Số điện thoại:</label>
                <input type="number" placeholder="Số điện thoại" name="phone" value="<?php echo $row["phone"]; ?>" required>
            </div>
            <div class="input-group">
                <label>Địa chỉ:</label>
                <input type="text" placeholder="Địa chỉ" name="address" value="<?php echo $row["address"]; ?>" required>
            </div>
            <div class="input-group">
                <button name="update" class="updatebtn">Cập nhật</button>
            </div>
    </form>
</div>
<?php
 include('footer.php');
?>
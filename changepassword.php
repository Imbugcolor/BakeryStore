<?php
    ob_start();
    session_start();
    include('header.php');
    include('conn.php'); 
    if(isset($_GET["id"])){
        if(isset($_POST["change"])){
            $oldpass = md5($_POST["oldpass"]);
            $newpass = md5($_POST["newpass"]);
            $newpass_verify = md5($_POST["newpass_verify"]);
            $sql_sl = "SELECT * FROM `user` WHERE `user_id`=".$_GET["id"];
            $sql_rsl = mysqli_query($connect,$sql_sl);
            $row = mysqli_fetch_array($sql_rsl);
            if($row["password"] == $oldpass){
                if($newpass == $newpass_verify){
                    $change_pass = "UPDATE `user` SET `password` = '$newpass' WHERE `user_id`=".$_GET["id"];
                    $change_rsl = mysqli_query($connect,$change_pass);
                    header("location: changepassword.php?id=".$_GET['id']."&success=Thay đổi mật khẩu thành công!");
                } else{
                    header("location: changepassword.php?id=".$_GET['id']."&error=Xác nhận mật khẩu mới chưa đúng!");
                }
            }else{
                header("location: changepassword.php?id=".$_GET['id']."&error=Mật khẩu cũ chưa chính xác!");
            }
        }
    }
?>
<style>
    .changePassword{
        margin: 100px 35px;
    }
</style>
<div class="changePassword">
    <h2>Thay đổi mật khẩu</h2>
    <form action="" method="post">
            <?php
                if(isset($_GET['error'])){ ?>
                    <p style="background-color: #FF4A52; border-radius: 50px; color: #fff; text-align: center; padding:5px 0; margin-bottom: 10px;" class="error"><?php echo $_GET['error']; ?></p>
              <?php  }
            ?>
            <?php
                if(isset($_GET['success'])){ ?>
                    <p style="background-color: #01CE69; border-radius: 50px; color: #fff; text-align: center; padding:5px 0; margin-bottom: 10px;" class="success"><?php echo $_GET['success']; ?></p>
              <?php  }
            ?>
            
            <div class="input-group">
                <label>Mật khẩu cũ:</label>
                <input type="password" placeholder="Nhập mật khẩu cũ..." name="oldpass" required>
            </div>
            <div class="input-group" >
                <label>Mật khẩu mới:</label>
                <input style="margin-bottom: 15px;" type="password" placeholder="Nhập mật khẩu mới..." name="newpass" required>
            </div>
            <div class="input-group" >
                <label>Xác nhận mật khẩu mới:</label>
                <input style="margin-bottom: 15px;" type="password" placeholder="Nhập lại mật khẩu mới..." name="newpass_verify" required>
            </div>
            <div class="input-group">
                <button name="change" class="updatebtn">Xác nhận</button>
            </div>
    </form>
</div>

<?php
    include('footer.php');
?>
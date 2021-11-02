<?php
    ob_start();
    session_start();
    include('header.php');
    include('conn.php');
    if(!isset($_SESSION["login"])){
        header("location: login.php");
    }
?>
<div class="inforuser_container">
    Thông tin khách hàng
</div>
<?php
 include('footer.php');
?>
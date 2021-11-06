<?php
    include('../conn.php');

    if(isset($_GET['id'])){
        $Confirmation = "<script> window.confirm('Bạn chắc chắn muốn xóa không?'); </script>";
        echo $Confirmation;

        if ($Confirmation == true) {
            $sql_dlt ="DELETE FROM `product` WHERE id=".$_GET["id"];
            mysqli_query($connect,$sql_dlt);
            header('location: index.php?module=listproduct');
        } else {
            header('location: index.php?module=listproduct');
        }

    }
?>
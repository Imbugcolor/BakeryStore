<?php
    include('conn.php');

    if(isset($_GET['id'])){   
            
            $sql_dlt ="UPDATE `order-info` SET `status`='0' WHERE`order_id`=".$_GET["id"];
            mysqli_query($connect,$sql_dlt);
            header('location: myorder.php?id='.$_GET["userid"]); 
    }

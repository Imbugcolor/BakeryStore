<?php
    ob_start();
   session_start();
   include('header.php');
   include('conn.php');
   if(!isset($_SESSION["login"])){
        header("location: login.php");
    }
?>
<style>
   .myorder-container{
       margin: 100px 50px;
       box-shadow:0 0 30px 0 rgb(82 63 105 / 10%);
       padding: 35px;
   }

   table{
       border: 1px solid #000;
       margin: 15px 0;
   }

   thead tr th a{
       text-decoration: none;
       color: #FF4A52;
   }
   
   thead tr th:nth-child(3){
       background-color: #01CE69;
       width: 20%;
   }
   .revieworder{
       color: #4C95F3;
       font-weight: 700;
   }
   .removeOrder{
        color: #FF1654;
       font-weight: 700;
   }
   tbody tr td{
    text-align: center;
   }
</style>
<div class="myorder-container">
    <h2>Đơn hàng của tôi</h2>
    <div class="row">
        <div class="col-12">
            <?php 
                if(isset($_GET["id"])){
                    $sql_sl = "SELECT * FROM `order-info` WHERE `user_id` =".$_GET["id"];
                   
                    $sql_rsl = mysqli_query($connect,$sql_sl);
                    while($row = mysqli_fetch_array($sql_rsl)){ ?>
                        <table>
                            <thead>
                                <tr>
                                    <th><a href="index.php"><i class="fas fa-store"></i>BAKERY</a></th>
                                    <th colspan="3">tình trạng</th>
                                    <th><?php if($row["status"]==1){ echo "Đang xử lý";} if($row["status"]==2){ echo "Đang vận chuyển";} if($row["status"]==3){ echo "Đã xử lý";} ?></th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <tr>
                                    <td>Mã đơn:<?php echo $row["order_id"] ?></td>
                                    <td>Ngày đặt: <?php echo $row["date_order"]?></td>
                                    <td>Tổng giá: <?php echo number_format($row["total"], 0, '', ','); ?> VND</td>
                                    <td>Số lượng:</td>
                                    <td><a class="revieworder" href="revieworder.php?id=<?=$row["order_id"];?>&userid=<?=$row["user_id"]?>">Xem chi tiết</a>
                                    <?php
                                        if($row["status"]==1){ ?>
                                        <a class="removeOrder" href="deleteorder.php?id=<?=$row["order_id"];?>" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?')">Hủy đơn</a>
                                   <?php     }
                                    ?>
                                    </td>
                                    

                                </tr>
                              
                            </tbody>
                        </table>
              <?php  }
                }
            ?>
            
        </div>
    </div>
</div>

<?php
    include('footer.php');
?>
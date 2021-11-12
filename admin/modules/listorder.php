<?php
    include('../conn.php');
?>
<style>
    tbody td a{
        display: block;
        margin: 5px;
        text-align: center;
    }
    tbody td a:first-child{
        padding: 5px;
        background-color: #0F90F2;
        color: #fff;
        text-decoration: none;
        border: 1px solid #0F90F2;
        transition: 0.3s;
    }
    tbody td a:nth-child(2){
        padding: 5px;
        background-color: #01CE69;
        color: #fff;
        text-decoration: none;
        border: 1px solid #01CE69;
        transition: 0.3s;
    }
    tbody td a:nth-child(3){
        padding: 5px;
        background-color: #FF4A52;
        color: #fff;
        text-decoration: none;
        border: 1px solid #FF4A52;
        transition: 0.3s;
    }
    tbody td a:nth-child(2):hover,
    tbody td a:first-child:hover{
        color: #0F90F2;
        background-color: #fff;
    }
    tbody td a:nth-child(3):hover{
        color: #FF4A52;
        background-color: #fff;
    }
</style>
<div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
               Danh sách đơn hàng
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tổng giá đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Yêu cầu</th>
                        <th>Ngày đặt hàng</th>                                  
                        <th>Trạng thái</th>
                        <th>Cập nhật</th>                                   
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tổng giá đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Yêu cầu</th>
                        <th>Ngày đặt hàng</th>                                  
                        <th>Trạng thái</th>
                        <th>Cập nhật</th>      
                    </tr>
                </tfoot>
                <tbody>
                <?php
                    $sql_sl = "SELECT * FROM `order-info`";
                    $listorder = mysqli_query($connect,$sql_sl);
                    while($row = mysqli_fetch_array($listorder)) {?>
                
                    <tr>
                        <td><?php echo $row["order_id"] ?></td>
                        <td><?php echo number_format($row["total"], 0, '', ',') ?> VND</td>
                        <td><?php echo $row["full_name"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["address"] ?></td>
                        <td><?php echo $row["phone"] ?></td>
                        <td><?php echo $row["request"] ?></td>
                        <td><?php echo $row["date_order"] ?></td>
                        <td><?php if($row["status"]==1){ echo "Đang xử lý";} if($row["status"]==2){ echo "Đã xử lý";} if($row["status"]==3){ echo "Đang vận chuyển";} if($row["status"]==4){ echo "Đã xác nhận";} ?></td>
                        <td style="width: 15%;">
                            <a href="?module=detailsorder&id=<?php echo $row["order_id"]?>" name="review">Xem chi tiết</a>
                            <a href="?module=commitOrder&id=<?php echo $row["order_id"]?>" name="update">Cập nhật trạng thái</a>
                            <a href="?module=deleteorder&id=<?php echo $row["order_id"]?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" name="remove">Xóa</a>
                        </td>
                    </tr>
                   <?php }
                   ?>
                </tbody>
                </div>
    </div>
<?php
include('../conn.php');

?>
<style>
    tbody td a {
        display: block;
        margin: 5px;
        text-align: center;
    }

    tbody td a:first-child {
        padding: 5px;
        background-color: #0F90F2;
        color: #fff;
        text-decoration: none;
        border: 1px solid #0F90F2;
        transition: 0.3s;
    }

    tbody td a:nth-child(2) {
        padding: 5px;
        background-color: #FF4A52;
        color: #fff;
        text-decoration: none;
        border: 1px solid #FF4A52;
        transition: 0.3s;
    }

    tbody td a:first-child:hover {
        color: #0F90F2;
        background-color: #fff;
    }

    tbody td a:nth-child(2):hover {
        color: #FF4A52;
        background-color: #fff;
    }

    tbody td img {
        width: 100px;
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
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá đơn hàng</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá đơn hàng</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                if (isset($_GET["id"])) {
                    $sql_query = "SELECT * FROM `order-details`, `product` WHERE `order-details`.`id`=`product`.`id` AND `order_id` =" . $_GET["id"];
                    $result = mysqli_query($connect, $sql_query);
                }
                while ($row = mysqli_fetch_array($result)) { ?>

                    <tr>
                        <td><?php echo $row["orderdetail_id"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><img src="../upload/<?php echo $row["image"] ?>" alt=""></td>
                        <td><?php echo number_format($row["price"], 0, '', ',') ?> VND</td>
                        <td><?php echo $row["quantity"] ?></td>
                        <td><?php echo $row["total"] ?></td>
                    </tr>
                <?php }
                ?>
            </tbody>
    </div>
</div>
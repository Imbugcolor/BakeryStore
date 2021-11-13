<?php
ob_start();
session_start();
include('header.php');
include('conn.php');
if (!isset($_SESSION["login"])) {
    header("location: login.php");
}
?>
<style>
    .myorder-container {
        margin: 100px 50px;
    }

    .info-order,
    .product-order {
        box-shadow: 0 0 30px 0 rgb(82 63 105 / 10%);
        margin: 15px 0;
    }

    table {
        border: 1px solid #000;
        margin: 15px 0;
    }

    table th,
    table td {
        font-size: 16px;
        color: #040E27;
        font-weight: 700;
    }

    thead tr th a {
        text-decoration: none;
        color: #FF4A52;
    }

    .revieworder {
        color: #4C95F3;
        font-weight: 700;
    }

    .removeOrder {
        color: #FF1654;
        font-weight: 700;
    }

    tbody tr td {
        text-align: center;
    }

    tr td span {
        color: #FF4A52;

    }

    tr td img {
        width: 150px;
    }

    .info-order span,
    .info-order label {
        font-size: 20px;
    }

    .container {
        padding-bottom: 35px;
    }

    .totalSummary span {
        color: #F44336;
    }

    h2 {
        color: #4752C4;
    }

    .label {
        border-bottom: 1px solid #ccc;
        padding-bottom: 15px;
    }

    .status-bar tr th i {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        line-height: 45px;
        border: 3px solid #ccc;
        color: #ccc;
    }

    .tbstatus {
        border-collapse: collapse;
    }

    <?php
    if (isset($_GET["id"])) {
        $sql_status1 = "SELECT * FROM `order-info` WHERE `order_id` =" . $_GET["id"];

        $status_rsl1 = mysqli_query($connect, $sql_status1);
        $row = mysqli_fetch_array($status_rsl1);
    }
    if ($row["status"] == 1) { ?>.status-bar tr th:first-child i {
        border: 3px solid #01CE69;
        color: #01CE69;
    }

    .status-msg {
        background-color: #91ADD3;
        width: 20%;
    }

    <?php }
    if ($row["status"] == 2) { ?>.status-bar tr th:first-child i,
    .status-bar tr th:nth-child(2) i {
        border: 3px solid #01CE69;
        color: #01CE69;
    }

    .status-msg {
        background-color: #1996D7;
        width: 20%;
    }

    <?php }
    if ($row["status"] == 3) { ?>.status-bar tr th:first-child i,
    .status-bar tr th:nth-child(2) i,
    .status-bar tr th:nth-child(3) i {
        border: 3px solid #01CE69;
        color: #01CE69;
    }

    .status-msg {
        background-color: #E46C0A;
        width: 20%;
    }

    <?php }
    if ($row["status"] == 4) { ?>.status-bar tr th:first-child i,
    .status-bar tr th:nth-child(2) i,
    .status-bar tr th:nth-child(3) i,
    .status-bar tr th:nth-child(4) i {
        border: 3px solid #01CE69;
        color: #01CE69;
    }

    .status-msg {
        background-color: #01CE69;
        width: 20%;
    }

    <?php }
    if ($row["status"] == 0) { ?>.status-msg {
        background-color: #FF4A52;
        width: 20%;
    }

    <?php } ?>
</style>
<div class="myorder-container">
    <div class="row">
        <div class="product-order col-12">
            <div class="container">
                <h2 class="label">Chi tiết đơn hàng</h2>
                <div class="status-bar">
                    <table class="tbstatus">
                        <thead>
                            <tr>
                                <?php
                                if ($row["status"] != 0) { ?>
                                    <th>
                                        <i class="fas fa-list"></i>
                                    </th>
                                    <th><i class="fas fa-clipboard-check"></i></th>
                                    <th><i class="fas fa-truck"></i></th>
                                    <th><i class="fas fa-check-circle"></i></th>
                                <?php   } else { ?>
                                    <th></th>
                                    <th><i style="border: 3px solid #FF4A52; color: #FF4A52;" class="far fa-times-circle"></i></th>
                                    <th></th>
                                <?php    } ?>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                if ($row["status"] != 0) { ?>
                                    <td>Đang xử lý</td>
                                    <td>Đã xử lý</td>
                                    <td>Đang vận chuyển</td>
                                    <td>Đã giao hàng</td>
                                <?php   } else { ?>
                                    <th></th>
                                    <th>Đã hủy</th>
                                    <th></th>
                                <?php    } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="overflow-x:auto;">
                    <table>
                        <thead>
                            <tr>
                                <th><a href="index.php"><i class="fas fa-store"></i>BAKERY</a></th>
                                <?php
                                if (isset($_GET["id"])) {
                                    $sql_status = "SELECT * FROM `order-info` WHERE `order_id` =" . $_GET["id"];

                                    $status_rsl = mysqli_query($connect, $sql_status);
                                    $row = mysqli_fetch_array($status_rsl);
                                } ?>
                                <th colspan="3" style="text-align:end;">Tình trạng <span>:</span></th>
                                <th class="status-msg"><?php if ($row["status"] == 1) {
                                                            echo "Đang xử lý";
                                                        }
                                                        if ($row["status"] == 2) {
                                                            echo "Đã xử lý";
                                                        }
                                                        if ($row["status"] == 3) {
                                                            echo "Đang vận chuyển";
                                                        }
                                                        if ($row["status"] == 4) {
                                                            echo "Đã giao hàng";
                                                        }
                                                        if ($row["status"] == 0) {
                                                            echo "Đã Hủy";
                                                        } ?></th>

                            </tr>
                        </thead>
                        <?php
                        if (isset($_GET["id"])) {
                            $sql_sl = "SELECT * FROM `order-details`,`product` WHERE `product`.`id`=`order-details`.`id` AND `order_id` =" . $_GET["id"];

                            $sql_rsl = mysqli_query($connect, $sql_sl);
                            while ($row = mysqli_fetch_array($sql_rsl)) { ?>
                                <tbody>
                                    <tr>
                                        <td>Sản phẩm: <span><?php echo $row["name"] ?></span></td>
                                        <td><img src="./upload/<?php echo $row["image"] ?>" alt=""></td>
                                        <td>Giá tiền: <span><?php echo number_format($row["orderprice"], 0, '', ','); ?> VND</span></td>
                                        <td>Số lượng: <span><?php echo $row["quantity"] ?></span></td>
                                        <td>Thành tiền: <span><?php echo number_format($row["total"], 0, '', ','); ?> VND</span></td>
                                        <td>Ngày đặt: <span><?php echo $row["datecreate"] ?></span></td>

                                    </tr>

                                </tbody>

                        <?php  }
                        }
                        ?>
                    </table>
                </div>
                <?php
                if (isset($_GET["userid"])) {
                    $sql_sl2 = "SELECT * FROM `order-info` WHERE `order_id`=" . $_GET['id'] . " AND `user_id` =" . $_GET["userid"];

                    $sql_rsl2 = mysqli_query($connect, $sql_sl2);
                    $row2 = mysqli_fetch_array($sql_rsl2);
                }
                ?>
                <h3 class="totalSummary">Tổng cộng: <span><?php echo number_format($row2["total"], 0, '', ','); ?> VND </span></h3>
            </div>
        </div>
        <div class="info-order col-12">
            <div class="container">


                <h2 class="label">Thông tin nhận hàng</h2>
                <?php
                if (isset($_GET["userid"])) {
                    $sql_sl2 = "SELECT * FROM `order-info` WHERE `order_id`=" . $_GET['id'] . " AND `user_id` =" . $_GET["userid"];

                    $sql_rsl2 = mysqli_query($connect, $sql_sl2);
                    $row2 = mysqli_fetch_array($sql_rsl2);
                }
                ?>
                <label for="">Tên: </label><span><?php echo $row2["full_name"] ?></span><br>
                <label for="">Địa chỉ: </label><span><?php echo $row2["address"] ?></span><br>
                <label for="">Số điện thoại: </label><span><?php echo $row2["phone"] ?></span><br>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>
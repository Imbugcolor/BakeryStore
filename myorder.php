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
        box-shadow: 0 0 30px 0 rgb(82 63 105 / 10%);
        padding: 35px;
    }

    table {
        border: 1px solid #000;
        margin: 15px 0;
    }

    thead tr th a {
        text-decoration: none;
        color: #FF4A52;
    }

    thead tr th:nth-child(3) {
        text-align: end;
    }

    thead tr th:nth-child(4) {
        width: 20%;
        color: #fff;
    }

    .revieworder {
        color: #4C95F3;
        font-weight: 700;
        text-decoration: none;
    }

    .removeOrder {
        color: #FF1654;
        font-weight: 700;
        text-decoration: none;
    }

    tbody tr td {
        text-align: center;
        font-weight: 600;

    }

    .listStt {
        color: #0B5ED7;
        font-size: 16px;
        font-weight: 600;
    }

    .listStt span {
        color: #FF1654;
        font-size: 18px;
    }
</style>
<div class="myorder-container">
    <h2>Đơn hàng của tôi</h2>
    <?php
    if (isset($_GET["id"])) {
        $count_stt1 = mysqli_query($connect, "SELECT * FROM `order-info` WHERE `status`='1' AND `user_id` =" . $_GET["id"]);
        $count_stt2 = mysqli_query($connect, "SELECT * FROM `order-info` WHERE `status`='2' AND `user_id` =" . $_GET["id"]);
        $count_stt3 = mysqli_query($connect, "SELECT * FROM `order-info` WHERE `status`='3' AND `user_id` =" . $_GET["id"]);
        $count_stt4 = mysqli_query($connect, "SELECT * FROM `order-info` WHERE `status`='4' AND `user_id` =" . $_GET["id"]);
        $count_stt0 = mysqli_query($connect, "SELECT * FROM `order-info` WHERE `status`='0' AND `user_id` =" . $_GET["id"]);
        $row1 = mysqli_num_rows($count_stt1);
        $row2 = mysqli_num_rows($count_stt2);
        $row3 = mysqli_num_rows($count_stt3);
        $row4 = mysqli_num_rows($count_stt4);
        $row0 = mysqli_num_rows($count_stt0);  ?>
        <p class="listStt">Bạn có <span><?= $row1 ?></span> đơn đang được xử lý, <span><?= $row2 ?></span> đơn đã xử lý, <span><?= $row3 ?></span> đơn đang vận chuyển, <span><?= $row4 ?></span> đã giao hàng thành công và <span><?= $row0 ?></span> đơn đã hủy </p>
    <?php }  ?>
    <div class="row">
        <div class="col-12">
            <div style="overflow-x:auto;">
                <?php
                if (isset($_GET["id"])) {
                    $sql_sl = "SELECT * FROM `order-info` WHERE `user_id` =" . $_GET["id"] . " ORDER BY `order-info`.`date_order` DESC";

                    $sql_rsl = mysqli_query($connect, $sql_sl);
                    while ($row = mysqli_fetch_array($sql_rsl)) { ?>
                        <table>
                            <thead>
                                <tr>
                                    <th><a href="index.php"><i class="fas fa-store"></i>BAKERY</a></th>
                                    <th colspan="2"></th>
                                    <th></th>
                                    <th><?php if ($row["status"] == 1) {
                                            echo  "<p style='background-color: #91ADD3; border-radius: 10px;'>" . "Đang xử lý";
                                        }
                                        if ($row["status"] == 2) {
                                            echo "<p style='background-color: #1996D7; border-radius: 10px;'>" . "Đã xử lý";
                                        }
                                        if ($row["status"] == 3) {
                                            echo "<p style='background-color: #FF5801; border-radius: 10px;'>" . "Đang vận chuyển";
                                        }
                                        if ($row["status"] == 4) {
                                            echo "<p style='background-color: #01CE69; border-radius: 10px;'>" . "Đã giao hàng";
                                        }
                                        if ($row["status"] == 0) {
                                            echo "<p style='background-color: #FF4A52; border-radius: 10px;'>" . "Đã Hủy";
                                        } ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Mã đơn:<?php echo $row["order_id"] ?></td>
                                    <td colspan="2">Tổng giá: <?php echo number_format($row["total"], 0, '', ','); ?> VND</td>
                                    <td>Ngày đặt: <?php echo $row["date_order"] ?></td>

                                    <td><a class="revieworder" href="revieworder.php?id=<?= $row["order_id"]; ?>&userid=<?= $row["user_id"] ?>">Xem chi tiết</a>
                                        <?php
                                        if ($row["status"] == 1) { ?>
                                            <a class="removeOrder" href="deleteorder.php?id=<?= $row["order_id"]; ?>&userid=<?= $row["user_id"]; ?>" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?')">Hủy đơn</a>
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
</div>

<?php
include('footer.php');
?>
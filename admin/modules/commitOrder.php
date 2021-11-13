<?php
include('../conn.php');
if (!empty($_GET["id"])) {
    if (isset($_POST['set'])) {
        if ($_POST["status"] == "First") {
            $sql_set = "UPDATE `order-info` SET `status`='1' WHERE `order_id`=" . $_GET["id"];
            mysqli_query($connect, $sql_set) or die("Lỗi!");
        }
        if ($_POST["status"] == "Second") {
            $sql_set = "UPDATE `order-info` SET `status`='2' WHERE `order_id`=" . $_GET["id"];
            mysqli_query($connect, $sql_set) or die("Lỗi!");
        }
        if ($_POST["status"] == "Third") {
            $sql_set = "UPDATE `order-info` SET `status`='3' WHERE `order_id`=" . $_GET["id"];
            mysqli_query($connect, $sql_set) or die("Lỗi!");
        }
        if ($_POST["status"] == "Four") {
            $sql_set = "UPDATE `order-info` SET `status`='4' WHERE `order_id`=" . $_GET["id"];
            mysqli_query($connect, $sql_set) or die("Lỗi!");
        }
        if ($_POST["status"] == "Five") {
            $sql_set = "UPDATE `order-info` SET `status`='0' WHERE `order_id`=" . $_GET["id"];
            mysqli_query($connect, $sql_set) or die("Lỗi!");
        }
    }
}
?>

<link href="../css/styles.css" rel="stylesheet" />
<div class="container-addcategory">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="box-form">
                <form action="" method="POST">
                    <div class="form-group">
                        <div class="boxheader">
                            <label for="">Cập nhật trạng thái</label>
                        </div>
                        <?php
                        if (isset($_GET["id"])) {
                            $sql_sl = "SELECT * FROM `order-info` WHERE  order_id=" . $_GET["id"];
                            $sql_rsl = mysqli_query($connect, $sql_sl);
                            $row = mysqli_fetch_array($sql_rsl);
                        }
                        ?>
                        <label for="" style="opacity: 0.6;">ID đơn hàng</label><br>
                        <input type="text" name="orderId" value="<?php echo $row["order_id"] ?>" disabled><br>
                        <label for="" style="opacity: 0.6;">Tên khách hàng</label><br>
                        <input type="text" name="orderId" value="<?php echo $row["full_name"] ?>" disabled><br>

                        <label style="margin: 3px;" for="" class="custom-checkbox"><input type="radio" class="custom-control-input" name="status" value="First" <?php if (isset($row) && $row["status"] == 1) { ?> checked <?php } ?>><span class="custom-control-label">Đang xử lý</span></label><br>
                        <label style="margin: 3px;" for="" class="custom-checkbox"><input type="radio" class="custom-control-input" name="status" value="Second" <?php if (isset($row) && $row["status"] == 2) { ?> checked <?php } ?>><span class="custom-control-label">Đã xử lý</span></label><br>
                        <label style="margin: 3px;" for="" class="custom-checkbox"><input type="radio" class="custom-control-input" name="status" value="Third" <?php if (isset($row) && $row["status"] == 3) { ?> checked <?php } ?>><span class="custom-control-label">Đang vận chuyển</span></label><br>
                        <label style="margin: 3px;" for="" class="custom-checkbox"><input type="radio" class="custom-control-input" name="status" value="Four" <?php if (isset($row) && $row["status"] == 4) { ?> checked <?php } ?>><span class="custom-control-label">Đã giao hàng</span></label><br>
                        <label style="margin: 3px;" for="" class="custom-checkbox"><input type="radio" class="custom-control-input" name="status" value="Five" <?php if (isset($row) && $row["status"] == 0) { ?> checked <?php } ?>><span class="custom-control-label">Đã Hủy</span></label><br>
                        <input id="setstatus" type="submit" name="set" value="Xác nhận">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
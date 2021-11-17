<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$total = 0;
$subTotal = 0;

session_start();
include('header.php');
include('conn.php');
$numberCart = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $numberCart++;
    }
}
if (isset($_POST["thanhtoan"])) {
    if ($numberCart > 0) {
        $name = $_POST["full_name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $request = $_POST["request"];
        $currentUserid = $_SESSION["login"]["0"];
        foreach ($_SESSION["cart"] as $key => $value) {
            $total = $value["price"] * $value["num"];
            $subTotal += $total;
        }
        $sqlInsertOrder = 'INSERT INTO `order-info` (total,`user_id`,`full_name`,email,`address`,phone,request,date_order,`status`) VALUES("' . $subTotal . '","' . $currentUserid . '","' . $name . '","' . $email . '","' . $address . '","' . $phone . '","' . $request . '","' . date("Y-m-d H:i:s") . '","1")';
        mysqli_query($connect, $sqlInsertOrder) or die("Lỗi!");
        $last_id = mysqli_insert_id($connect);
        $content_mail = "<table width='1000' border='1' style='border-collapse:collapse;'>";
        $content_mail .= "<tr><th>STT</th><th>Ảnh sản phẩm</th><th>Tên sản phẩm</th><th>Đơn giá</th><th>Số lượng</th><th>Thành tiền</th></tr>";
        $i = 0;
        foreach ($_SESSION["cart"] as $key => $value) {
            $i++;
            $total = $value["price"] * $value["num"];
            $sqlInsertDetail = 'INSERT INTO `order-details` (`order_id`,`id`,`orderprice`,`quantity`,`total`,`datecreate`) VALUES("' . $last_id . '","' . $key . '","' . $value["price"] . '","' . $value["num"] . '","' . $value["num"] * $value["price"] . '","' . date("Y-m-d H:i:s") . '")';
            mysqli_query($connect, $sqlInsertDetail);
            $content_mail .= "<tr><td>$i</td><td><img src='.upload/" . $value['image'] . "' width='100' /></td><td>" . $value['name'] . "</td><td>" . number_format($value['price'], 0, '', ',') . " VNĐ</td><td>" . $value["num"] . "</td><td>" . number_format($total, 0, '', ',') . " VNĐ</td></tr>";
        }
        $content_mail .= '</table>';

        //Gửi mail
        include("./PHPMailer/src/PHPMailer.php");
        include("./PHPMailer/src/Exception.php");
        include("./PHPMailer/src/OAuth.php");
        include("./PHPMailer/src/POP3.php");
        include("./PHPMailer/src/SMTP.php");

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = false;
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'dinhhoangviet12a22019@gmail.com';
            $mail->Password   = 'Viet01212133721';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            //Recipients
            $email_send = $_POST["email"];
            $full_name_send = $_POST["full_name"];
            $mail->setFrom('system@gmail.com', 'BAKERY STORE');
            $mail->addAddress($email_send, $full_name_send);

            $mail->isHTML(true);
            $mail->Subject = 'Chào bạn, Bạn vừa hoàn thành đặt hàng sản phẩm của chúng tôi.';
            $mail->Body    = '<h2 style="color: #FF4A52;">Bạn đã đặt các sản phẩm của BAKERY STORE:</h2></br>' . $content_mail . '<h3 style="color: #FF1654;">Tổng tiền đơn hàng: ' . number_format($subTotal, 0, '', ',') . ' VNĐ</h3>';
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        unset($_SESSION["cart"]);
?>
        <h3 style="padding: 0 15px 0 15px; margin-top:150px; text-align:center; color:#fff; background-color:#01CE69; border-radius:50px;">Đặt hàng thành công! Bạn có thể xem đơn hàng tại email hoặc trong mục đơn hàng của tôi</a></h3>
    <?php
    } else { ?>
        <h3 style="padding: 0 15px 0 15px; margin-top:150px; text-align:center; color:#fff; background-color:#FF4A52; border-radius:50px;">Bạn chưa thêm sản phẩm nào trong giỏ hàng.</h3>
<?php   }
}
?>
<style>
    .order-info {
        box-shadow: 0 0 30px 0 rgb(82 63 105 / 10%);
        border-radius: 5px;
        padding: 15px;
        margin: 15px 0;
    }

    form {
        padding-top: 15px;
    }

    .form-group label {
        font-weight: 700;
    }

    .form-group label i {
        color: #FF0000;
    }
</style>
<div class="cart-order">
    <div class="container-cart" id="listCart">
        <div style="overflow-x:auto;">

            <table id="tbCart">
                <tr>
                    <th style="width: 5%;">STT</th>
                    <th style="width: 15%;">Ảnh sản phẩm</th>
                    <th style="width: 25%;">Tên sản phẩm</th>
                    <th style="width: 15%;">Đơn giá</th>
                    <th style="width: 10%;">Số lượng</th>
                    <th style="width: 15%;">Thành tiền</th>
                    <th style="width: 5%;">Xóa</th>
                </tr>
                <?php
                $total = 0;
                $subTotal = 0;
                if (isset($_SESSION["cart"])) {
                    foreach ($_SESSION["cart"] as $key => $value) {
                ?>
                        <tr>

                            <td class="count"></td>
                            <td><img src="./upload/<?php echo $value["image"] ?>" alt=""></td>
                            <td style="color: #4752C4; font-weight: 700;"><?php echo $value["name"] ?></td>
                            <td style="color: #FF4A52; font-weight: 700;"><?php echo  number_format($value["price"], 0, '', ','); ?> <span>VND</span></td>
                            <td>
                                <input style="width: 30px; font-weight: 700;" type="text" onchange="updateCart(<?php echo $key ?>)" id="quantity_<?php echo $key ?>" name="quantity_<?php echo $key ?>" value="<?php echo $value["num"] ?>" min="1">
                                <input type="hidden" name="id[]" value="99">
                            </td>
                            <td style="color: #FF4A52; font-weight: 700;"><?php $total = $value["price"] * $value["num"];
                                                                            echo number_format($total, 0, '', ',');
                                                                            $subTotal += $total;  ?> <span>VND</span></td>
                            <td><a href="javascript:void(0)" onclick="deleteCart(<?php echo $key ?>)"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                <?php }
                } else {
                    echo "Bạn chưa mua hàng";
                } ?>
                <tr>
                    <td colspan="4">
                        <a style="text-decoration: none; width: 50px; height: 10px;padding:3px 35px; background: #1EC4B5; color:#fff;" href="category.php">Mua thêm</a>
                    </td>
                    <td style="color: #333; font-weight: 700">Tổng cộng:</td>
                    <td style="color: #FF5801; font-weight: 700; font-size: 20px;" colspan="1"><?php echo number_format($subTotal, 0, '', ','); ?> <span>VND</span></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="order-info">
        <h2><i class="fas fa-shopping-cart" style="color:#FF0000;"></i> Thông tin đặt hàng</h2>
        <p style="font-size: 18px;">Vui lòng điền đầy đủ thông tin chính xác để chúng tôi hoàn thành đơn hàng!</p>
        <form action="" method="post">
            <div class="form-group">
                <div class="row">
                    <?php

                    $currentUser_id = $_SESSION["login"]["0"];
                    $sqlslt = "SELECT * FROM `user` WHERE `user_id`='$currentUser_id'";
                    $resultO = mysqli_query($connect, $sqlslt);
                    $row = mysqli_fetch_array($resultO);
                    ?>
                    <div class="col-6 col-md-6 col-sm-12">
                        <label><i class="fas fa-user"></i> Tên khách hàng</label>
                        <input type="text" name="full_name" value="<?php echo $row["full_name"]; ?>" class="form-control" placeholder="Họ và tên (Bắt buộc)" required="">
                    </div>
                    <div class="col-6 col-md-6 col-sm-12">
                        <label><i class="fas fa-phone"></i> Điện thoại</label>
                        <input type="number" name="phone" value="<?php echo $row["phone"]; ?>" class="form-control" placeholder="Điện thoại (Bắt buộc)" required="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6 col-md-6 col-sm-12">
                        <label><i class="fas fa-at"></i> Email</label>
                        <input type="email" name="email" value="<?php echo $row["email"]; ?>" class="form-control" placeholder="Email (Bắt buộc)" required="">
                    </div>
                    <div class="col-6 col-md-6 col-sm-12">
                        <label><i class="fas fa-map-marker-alt"></i> Địa chỉ</label>
                        <input type="text" name="address" value="<?php echo $row["address"]; ?>" class="form-control" placeholder="Địa chỉ" required="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-md-12 col-sm-12">
                        <label><i class="fas fa-question-circle"></i> Yêu cầu</label>
                        <textarea type="text" name="request" value="" rows="5" cols="50" placeholder="Nội dung..." class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="order-submit">
                <button type="submit" class="order-btn" name="thanhtoan">Đặt hàng</button>
            </div>
        </form>
    </div>
</div>

<?php
include('footer.php');
?>

</html>
<?php
session_start();
include('header.php');
include_once('conn.php');

$id = "";
if (isset($_GET["id"])) {
    $id = $_GET['id'];
}
$sql_query = "SELECT * FROM `product` WHERE id = $id";
$result = mysqli_query($connect, $sql_query);
?>

<head>
    <style>
        .box-detail {
            background-color: #fff;
            box-shadow: 0 0 30px 0 rgb(82 63 105 / 10%);
            border-radius: 5px;
            overflow: hidden;
            height: 100%;
        }

        .title {
            padding: 15px;
        }

        .img-detail {
            padding: 15px;
            border-radius: 5px;
            overflow: hidden;
        }

        .text-detail {
            margin-top: 50px;
            position: relative;
            width: 100%;
            height: 100%;
            padding: 15px;
        }

        .text-detail h2 {
            margin-bottom: 20px;
        }

        .text-detail p {
            line-height: 40px;
        }

        .text-detail p span {
            color: #FF4A52;
            font-weight: 700;
        }

        .add-cart-btn {
            background-color: #F4511E;
            color: #fff;
            text-decoration: none;
            padding: 25px 50px;
            transition: 0.3s;
        }

        .add-cart {
            padding-bottom: 100px;
        }

        .add-cart button {
            border: none;
        }

        .add-cart-btn:hover {
            color: #FF4A52;
            background-color: #fff;
            border: 1px solid #FF4A52;
        }

        .price-detail span {
            font-size: 26px;
        }

        .quantity-detail p {
            color: #FF4A52;
            font-weight: 700;
        }

        .quantity-detail {
            margin-bottom: 15px;
        }

        .quantity-detail input {
            height: 40px;
            padding: 0 15px;
            width: 100px;
        }

        .back {
            background-color: #FF4A52;
            border-radius: 5px;
            width: 50px;
            text-align: center;
        }

        .back a {
            font-size: 30px;
            color: #fff;
        }

        .back a:hover {
            opacity: 0.6;
        }
    </style>
</head>
<!--sidebar-social-->
<?php
include('socialsidebar.php');
?>
<!--sidebar-social-->
<div class="container" style="margin:100px 35px">
    <?php

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="row">
            <div class="col-5 col-sm-12">
                <div class="box-detail">
                    <div class="back">
                        <a href="category.php"><i class="fas fa-reply"></i></a>
                    </div>
                    <h2 class="title">Chi tiết sản phẩm</h2>
                    <div class="img-detail">
                        <img src="./upload/<?= $row['image'] ?>" style="width: 100%;" alt="">
                    </div>
                </div>
            </div>
            <div class="col-7 col-sm-12">
                <div class="box-detail">
                    <div class="text-detail">
                        <h2 style="color: #4752C4"><?= $row['name']; ?></h2>
                        <p class="price-detail"><span>Giá sản phẩm:</span> <br> <span style="color: #FF1654;"><?= number_format($row['price'], 0, '', ','); ?> VND</span></p>
                        <p><span>Mô tả: </span><?= $row['description']; ?></p>
                        <div class="quantity-detail">
                            <p>Số lượng: </p><input required type="number" min="1" id="num" name="num" value="1">
                        </div>
                        <div class="add-cart">
                            <?php
                            if (isset($_SESSION["login"])) { ?>
                                <button class="add-cart-btn" onclick="addCart(<?php echo $row['id']; ?> )"><i class="fas fa-cart-plus"></i>Thêm vào giỏ hàng</button>
                            <?php } else { ?>
                                <a style="text-decoration: none; font-size: 18px; color: #FF1654; font-weight: 700;" href="login.php">Đăng nhập để thực hiện mua sản phẩm! <i style="font-size: 40px;" class="fas fa-sign-in-alt"></i></a>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>

</div>
<script>
    // Select your input element.
    var number = document.getElementById('num');

    // Listen for input event on numInput.
    number.onkeydown = function(e) {
        if (!((e.keyCode > 95 && e.keyCode < 106) ||
                (e.keyCode > 47 && e.keyCode < 58) ||
                e.keyCode == 8)) {
            return false;
        }
    }
</script>
<?php
include('footer.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/app.css">
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Cửa Hàng Bánh Ngọt</title>
</head>

<body>
    <div id="main">
        <!--header-->
        <div id="header">

            <!--menu nav mobile-->
            <div class="menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
            <!--end menu nav mobile-->

            <!--logo-->
            <div id="logo">
                <a href="index.php"><i class="fas fa-store"></i>BAKERY</a>
            </div>
            <!--end logo-->

            <!--navbar-->
            <div id="navbar">
                <ul>
                    <li><a href="index.php">TRANG CHỦ</a></li>
                    <li class="category"><a href="category.php">SẢN PHẨM</a>

                    </li>
                    <li><a href="blogs.php">BLOG</a></li>
                    <li><a href="contact.php">LIÊN HỆ</a></li>
                    <?php
                    if (isset($_SESSION["login"]) && $_SESSION["login"]["7"] == 1) {
                    ?>
                        <li><a href="admin/index.php">QUẢN LÝ</a></li>
                    <?php  }
                    ?>
                </ul>
            </div>
            <!--end navbar-->

            <!--cart-shopping-->
            <div id="cart">
                <!-- <i class="fas fa-search"></i> -->
                <?php
                $numberCart = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $numberCart++;
                    }
                }
                ?>
                <?php
                if (isset($_SESSION["login"])) { ?>
                    <a href="cart.php"><i class="fas fa-shopping-bag"></i><span class="badge badge-warning" id="numberCart" style="font-size: 14px;"><?php echo $numberCart; ?></span></a>
                <?php   } else { ?>
                    <a class="loginBtn-header" href="login.php">Đăng nhập</a>
                <?php }
                ?>
                <div class="user" onclick="menuUserToggle();">
                    <i class="usertoggle fas fa-user"><i class="fas fa-caret-down"></i></i>
                    <div class="user-menu">
                        <h4 class="user_name">Chào!
                            <?php if (isset($_SESSION["login"])) {
                                echo $_SESSION["login"]["1"];
                            } ?>
                        </h4>
                        <ul>
                            <?php if (!isset($_SESSION["login"])) { ?>
                                <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Đăng Nhập</a></li>
                            <?php
                            }

                            ?>
                            <li><a href="infor_user.php"><i class="fas fa-info-circle"></i> Thông tin</a></li>
                            <?php if (isset($_SESSION["login"])) { ?>
                                <li><a href="myorder.php?id=<?= $_SESSION["login"]["0"]; ?>"><i class="fas fa-box"></i> Đơn hàng của tôi</a></li>
                                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                            <?php
                            }

                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!--end cart-shopping-->

        </div>
        <!--end header-->



    </div>
    <!--loader-->
    <div class="loader-bg">
        <div class="loader-p">

        </div>
    </div>
    <!--end loader-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script>
        /* menu show jquery */
        $(document).ready(function() {
            navMenuActive()
            navMenuHide()
            navSubMenuActive()
            // navSubMenuHide()
        });

        function navMenuActive() {
            $('.menu-toggle').click(function() {
                $('#navbar').toggleClass('active')
            })
        }

        function navMenuHide() {
            $('#navbar li:not(#navbar .category)').on('click', function() {
                // $("#navbar").hide();
                $("#navbar").removeClass('active')
            });
        }
        /*end menu show jquery */

        /* subnav responsive show */
        function navSubMenuActive() {
            $('#navbar .category').click(function() {
                $('#navbar ul li .subnav').toggleClass('show')
            })
        }
        /* end subnav responsive show */

        /* user menu toggle */
        function menuUserToggle() {
            var toggleUserMenu = document.querySelector('.user-menu');
            toggleUserMenu.classList.toggle('active-menu-user')
        }
        /* user menu toggle */

        /*scroll-header active */
        window.addEventListener('scroll', function() {
            let header = document.getElementById('header');
            let windowPosition = window.scrollY > 0;
            header.classList.toggle('scrolling-active', windowPosition);
        })
        /*end scroll-header active */

        /* slide carousel jquery custom */
        $('.owl-carousel').owlCarousel({
            items: 1,
            lazyLoad: true,
            loop: true,
            margin: 10,
            autoplay: true,
            autoPlaySpeed: 5000,
            autoPlayTimeout: 5000,
            autoplayHoverPause: true,
            autoplaySpeed: 1000
        });

        /*end slide carousel jquery custom*/

        function addCart(id) {
            num = $("#num").val();
            $.post('addcart.php', /*gui du lieu */ {
                'id': id,
                'num': num
            }, function(data) /*khi nhan dc du lieu goi ham callback */ {
                alert("Thêm vào giỏ hàng thành công!");
                $('#numberCart').text(data);
            });
        }

        function updateCart(id) {
            num = $("#quantity_" + id).val();
            $.post('updateCart.php', {
                'id': id,
                'num': num
            }, function(data) {
                //after update cart, reload page
                $("#listCart").load("http://localhost/BakeryStore/cart.php #tbCart");
            });
        }

        function deleteCart(id) {
            $.post('updateCart.php', {
                'id': id,
                'num': 0
            }, function(data) {
                //after update cart, reload page
                $("#listCart").load("http://localhost/BakeryStore/cart.php #tbCart");
                $("#iCart").load("http://localhost/BakeryStore/cart.php #numberCart");
            });
        }

        //set time loader
        setTimeout(function() {
            $('.loader-bg').fadeToggle();
        }, 1000);
    </script>
</body>

</html>
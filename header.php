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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
                BAKERY
            </div>
            <!--end logo-->
            <!--navbar-->
            <div id="navbar">
                <ul>
                    <li><a href="index.php">TRANG CHỦ</a></li>
                    <li class="category"><a href="category.php" >SẢN PHẨM</a>
                        
                    </li>                     
                    <li><a href="#">TIN TỨC</a></li>
                    <li><a href="#">LIÊN HỆ</a></li>
                </ul>
            </div>
            <!--end navbar-->
           
            <!--cart-shopping-->
            <div id="cart">
                <!-- <i class="fas fa-search"></i> -->
                <?php
                    $numberCart = 0;
                    if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $key => $value){
                            $numberCart ++;
                        }
                    }
                ?>
                <a  href="cart.php"><i class="fas fa-shopping-bag"></i><span id="iCart"><span id="numberCart" style="font-size: 14px;"><?php echo $numberCart; ?></span></span></a>
                <div class="user" onclick="menuUserToggle();">
                        <i class="usertoggle fas fa-user" ></i>
                        <div class="user-menu">
                            <h4 class="user_name">Chào! 
                                <?php if(isset($_SESSION["login"])){
                                    echo $_SESSION["login"]["1"];
                                }?>
                            </h4>
                            <ul>
                                <?php if(!isset($_SESSION["login"])){ ?>
                                    <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Đăng Nhập</a></li>
                                <?php 
                                    }
                                
                                ?>
                                <li><a href="infor_user.php"><i class="fas fa-info-circle"></i> Thông tin</a></li>
                                <?php if(isset($_SESSION["login"])){ ?>
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

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script>
               
        /* menu show jquery */
        $(document).ready(function(){
            navMenuActive()
            navMenuHide()
            navSubMenuActive()
            // navSubMenuHide()
        });
        function navMenuActive(){
            $('.menu-toggle').click(function(){
                $('#navbar').toggleClass('active')
            })
        }
        function navMenuHide(){
            $('#navbar li:not(#navbar .category)').on('click', function(){
            // $("#navbar").hide();
            $("#navbar").removeClass('active')
        });
        }
        /*end menu show jquery */

        /* subnav responsive show */
        function navSubMenuActive(){
            $('#navbar .category').click(function(){
                $('#navbar ul li .subnav').toggleClass('show')
            })
        }     
        /* end subnav responsive show */

        /* user menu toggle */
        function menuUserToggle(){
            var toggleUserMenu = document.querySelector('.user-menu');
            toggleUserMenu.classList.toggle('active-menu-user')
        }
         /* user menu toggle */

        /*scroll-header active */
        window.addEventListener('scroll', function (){
          let header = document.getElementById('header');
          let windowPosition = window.scrollY > 0;
          header.classList.toggle('scrolling-active', windowPosition);
        })
        /*end scroll-header active */

         /* slide carousel jquery custom */
         $('.owl-carousel').owlCarousel({
            items:1,
            lazyLoad: true,
            loop: true,
            margin: 10,          
            autoplay: true,
            autoPlaySpeed: 5000,
            autoPlayTimeout: 5000,
            autoplayHoverPause: true,
            autoplaySpeed:1000
        });

        /*end slide carousel jquery custom*/
        function addCart(id){
            num = $("#num").val();
            $.post('addcart.php', {'id': id, 'num': num}, function(data){
                alert("Thêm vào giỏ hàng thành công!");
                $('#numberCart').text(data);
            });
        }
        function updateCart(id){
            num = $("#quantity_"+id).val();
            $.post('updateCart.php', {'id': id, 'num': num}, function(data){
                //after update cart, reload page
                $("#listCart").load("http://localhost/BakeryStore/cart.php #tbCart");
            });
        }
        function deleteCart(id){
            $.post('updateCart.php', {'id': id, 'num': 0}, function(data){
                //after update cart, reload page
                $("#listCart").load("http://localhost/BakeryStore/cart.php #tbCart");
                $("#iCart").load("http://localhost/BakeryStore/cart.php #numberCart");
            });
        }
    </script>
</body>
</html>
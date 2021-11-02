<?php
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "bakerystore");
?>
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
    <title>Cửa Hàng Bánh Ngọt</title>
</head>
<body>
    <div id="main">
        <!--header-->
        <?php
            include('header.php');
        ?>
        <!--end header-->

        <!--slider-->
        <div id="slider">
            <div class="owl-carousel owl-theme">
                <div class="container">
                        <div class="intro-content">
                                <h1>Bánh Ngon</h1>
                                <h2>Giảm giá <span>30%</span></h2>
                                <p>Bakery cung cấp bánh ngọt và đồ ngọt tốt nhất cho bạn</p>
                                <button>Mua ngay</button>
                        </div>
                        <div class="img-slideshow"> 
                            <img src="./assets/images/slideshow-v2-img2.png" alt="">
                        </div>
                </div>
                <div class="container">
                    <div class="intro-content">
                            <h1>Bánh Cupcake</h1>
                            <h2>Giảm giá <span>10%</span></h2>
                            <p>Bakery cung cấp bánh ngọt và đồ ngọt tốt nhất cho bạn</p>
                            <button>Mua ngay</button>
                    </div>
                    <div class="img-slideshow"> 
                        <img src="./assets/images/slideshow-v2-img1.png" alt="">
                    </div>
                </div>
                <div class="container">
                    <div class="intro-content">
                            <h1>Bánh Kem Tươi</h1>
                            <h2>Giảm giá <span>40%</span></h2>
                            <p>Bakery cung cấp bánh ngọt và đồ ngọt tốt nhất cho bạn</p>
                            <button>Mua ngay</button>
                    </div>
                    <div class="img-slideshow"> 
                        <img src="./assets/images/slideshow-v2-img3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!--end slider-->

        <!--content-->
        <div id="content">
            <!--services-section-->
            <div id="services-section">
                <div class="container">
                    <div class="row">
                        <div class="box col-4 col-md-4 col-sm-6">
                            <div class="icon-services">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="content-services">
                                <h4>Miễn phí vận chuyển</h4>
                                <p>Miễn phí giao hàng trên toàn thế giới đối với đơn đặt hàng trên 100.000 VND</p>
                            </div>
                        </div>
                        <div class="box col-4 col-md-4 col-sm-6">
                            <div class="icon-services">
                                <i class="fas fa-gift"></i>
                            </div>
                            <div class="content-services">
                                <h4>Tặng món quà tới những người bạn</h4>
                                <p>Sản phẩm lỗi bất kỳ trong vòng 07 ngày đổi ngay.</p>
                            </div>
                        </div>
                        <div class="box col-4 col-md-4 col-sm-6">
                            <div class="icon-services">
                                <i class="far fa-heart"></i>
                            </div>
                            <div class="content-services">
                                <h4>Được yêu thích bởi khách hàng của chúng tôi</h4>
                                <p>Nhóm hỗ trợ của chúng tôi luôn sẵn sàng hỗ trợ cho bạn 7 ngày một tuần</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end services-section-->

            <!--best-seller-section-->
            <div id="best-seller-section">
                <div class="best-seller-header">
                    <h2 class="title-heading">SẢN PHẨM GIẢM GIÁ</h2>
                    <div class="line"></div>
                </div>
                <div class="container">
                    <div class="row">
                        <?php
                            $query = "SELECT * FROM `product` WHERE cat_id=99";
                            $result = mysqli_query($connect, $query);
                            
                            while($row = mysqli_fetch_array($result)) {?>
                             <div class="product col-3 col-md-4 col-sm-12">
                                <form method="get" action="index.php?id=<?=$row['id'] ?>" >  
                                    <div class="product-single">
                                        <div class="img-product">
                                            <img src="./assets/images/<?=$row['image']?>" alt="">
                                        </div>
                                        <div class="name-product">
                                            <p><?=$row['name'];?></p>
                                        </div>
                                        <div class="price-product">
                                            <p><?=$row['price'];?> <span>VND</span></p>
                                        </div>
                                        <div class="view-product">
                                            <a href="product_details.php?id=<?=$row['id'];?>" class="view-details" >Xem chi tiết</a>
                                        </div>
                                    </div>                              
                                </form>
                            </div>
                           <?php }
                            
                        ?>
                        
                    </div>
                </div>
            </div>
            <!--end best-seller-section-->
        </div>
        <!--end content-->


        <!--footer-->
         <div id="footer">
            <div class="footer_top">
                    <div class="container">
                        <div class="row">
                            <div class="footer_widget_single col-4 col-md-4 col-sm-6">
                                <div class="footer_logo">
                                    BAKERY
                                </div>
                                <div class="address">
                                    <p>
                                        TPHCM, Binh Thanh District <br> 
                                        <a href="">+84 83 730 xx8</a> <br> 
                                        <a href="">abcdxyz@gmail.com</a> <br> 
                                    </p>
                                </div>
                                <div class="social-widget">
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                            <div class="footer_widget_single col-4 col-md-4 col-sm-6">
                                <div class="footer_company">
                                    Company
                                </div>
                                <ul class="navlink">
                                    <li> <a href="#">Pricing</a></li>
                                    <li> <a href="#">About</a></li>
                                    <li> <a href="#">Gallery</a></li>
                                    <li> <a href="#">Contact</a></li>
                                </ul>
                            </div>
                            
                            <div class="footer_widget_single col-4 col-md-4 col-sm-6">
                                <div class="footer_instargram">
                                    Instargram
                                </div>
                                <div class="ins-img">
                                    <div class="row">
                                        <div class="col-4 col-md-4 col-sm-6">
                                            <div class="img-item">
                                                <img src="./assets/images/seller-product-1.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-sm-6">
                                            <div class="img-item">
                                                <img src="./assets/images/seller-product-2.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-sm-6">
                                            <div class="img-item">
                                                <img src="./assets/images/seller-product-3.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-sm-6">
                                            <div class="img-item">
                                                <img src="./assets/images/seller-product-4.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-sm-6">
                                            <div class="img-item">
                                                <img src="./assets/images/seller-product-1.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-sm-6">
                                            <div class="img-item">
                                                <img src="./assets/images/seller-product-2.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 border-top-copyright"></div>
                            <div class="copyright-text col-12 col-md-12 col-sm-12">
                                <p>Copyright ©2021 All rights reserved | This template is made with <i class="far fa-heart"></i> by <a href="#">My Thuan Viet</a></p>
                            </div>
                        </div>
                    </div>
                </div>
         </div>    
        <!--end footer-->

    </div>
    
    <script src="./assets/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
     <script>
      
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
    </script>
</body>
</html>
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

            <!--sidebar-social-->
            <?php
                include('socialsidebar.php');
            ?>
            <!--end sidebar-social-->
            
            <!--back-to-top-scroll-->
            <?php
                include('backtotop.php');
            ?>
            <!--end back-to-top-scroll-->

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
                                            <img src="./upload/<?=$row['image']?>" alt="">
                                        </div>
                                        <div class="name-product">
                                            <p><?=$row['name'];?></p>
                                        </div>
                                        <div class="price-product">
                                            <p><?=number_format($row['price'], 0, '', ',');?> <span>VND</span></p>
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
         <?php
            include('footer.php');
         ?>
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
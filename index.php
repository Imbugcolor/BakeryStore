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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="assets/slick/slick-theme.css" />
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
                    <h2 class="title-heading">SẢN PHẨM NỔI BẬT</h2>
                    <div class="line"></div>
                </div>
                <div class="container">
                    <div class="slickslider" style="overflow: hidden;">

                        <?php
                        $query = "SELECT * FROM `product` WHERE cat_id=99";
                        $result = mysqli_query($connect, $query);

                        while ($row = mysqli_fetch_array($result)) { ?>
                            <div class="product" style="padding:0 15px;">
                                <form method="get" action="index.php?id=<?= $row['id'] ?>">
                                    <div class="product-single">
                                        <div class="img-product">
                                            <img src="./upload/<?= $row['image'] ?>" alt="">
                                        </div>
                                        <div class="name-product">
                                            <p><?= $row['name']; ?></p>
                                        </div>
                                        <div class="price-product">
                                            <p><?= number_format($row['price'], 0, '', ','); ?> <span>VND</span></p>
                                        </div>
                                        <div class="view-product">
                                            <a href="product_details.php?id=<?= $row['id']; ?>" class="view-details">Xem chi tiết</a>
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

            <!--menu section-->
            <div id="menu-section">
                <div class="menu-header">
                    <h2 class="title-heading">MENU</h2>
                    <p>Những chiếc bánh ngon nhất trong cửa hàng! Được làm bằng tình yêu thương, đừng bỏ lỡ.</p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="name-cake">
                                <h4>Bánh Vòng Dâu</h4>
                                <div class="material">
                                    <p>(trứng, sữa tươi, đường, vanilla)</p><span>50,000 VND</span>
                                </div>
                                <div class="line"></div>
                            </div>
                            <div class="name-cake">
                                <h4>Bánh Vòng Dâu</h4>
                                <div class="material">
                                    <p>(trứng, sữa tươi, đường, vanilla)</p><span>50,000 VND</span>
                                </div>
                                <div class="line"></div>
                            </div>
                            <div class="name-cake">
                                <h4>Bánh Vòng Dâu</h4>
                                <div class="material">
                                    <p>(trứng, sữa tươi, đường, vanilla)</p><span>50,000 VND</span>
                                </div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="name-cake">
                                <h4>Bánh Vòng Dâu</h4>
                                <div class="material">
                                    <p>(trứng, sữa tươi, đường, vanilla)</p><span>50,000 VND</span>
                                </div>
                                <div class="line"></div>
                            </div>
                            <div class="name-cake">
                                <h4>Bánh Vòng Dâu</h4>
                                <div class="material">
                                    <p>(trứng, sữa tươi, đường, vanilla)</p><span>50,000 VND</span>
                                </div>
                                <div class="line"></div>
                            </div>
                            <div class="name-cake">
                                <h4>Bánh Vòng Dâu</h4>
                                <div class="material">
                                    <p>(trứng, sữa tươi, đường, vanilla)</p><span>50,000 VND</span>
                                </div>
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end menu section-->

        </div>
        <!--end content-->

        <!-- @instagram  -->
        <div id="instagram">
            <div class="container">
                <i class="fab fa-instagram"></i>
                <h4><span>BAKERY</span> ON INSTAGRAM</h4>
                <p>@abcd1234</p>
            </div>
        </div>
        <!--end @instagram -->

        <!--time-open-->
        <div id="opentime">
            <video src="./assets/videos/videooverlay.mp4" muted loop autoplay></video>
            <div class="opentime-container">
                <h2 class="title-heading">GIỜ MỞ CỬA</h2>
                <p class="slogan-title">Đến với cửa hàng của chúng tôi</p>
                <div class="timedate">
                    <div class="mon-to-thur">
                        <h4>Thứ 2 đến thứ 5</h4>
                        <p>09:00</p>
                        <p>22:00</p>
                    </div>
                    <div class="fri-to-sat">
                        <h4>Thứ 6 đến thứ 7</h4>
                        <p>11:00</p>
                        <p>19:00</p>
                    </div>
                </div>
                <p class="text-phone">+84 877 9988 29</p>
            </div>
            <div class="overflow"></div>
        </div>
        <!--end time-open-->

        <!--Map-->
        <div class="map" style="width: 100%;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.0834633205372!2d106.71489441520156!3d10.80491946162071!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529ee6c5d3563%3A0xbe1be1c17b50b3f3!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBHaWFvIHRow7RuZyBW4bqtbiB04bqjaSBUUCBIQ00!5e0!3m2!1svi!2s!4v1637154953112!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <!--End Map-->

        <!--slider track img -->
        <div id="imgslider">
            <div class="container">
                <div class="imgtrack slick">
                    <img src="./assets/images/imgslidefooter1.jpg" alt="">
                    <img src="./assets/images/imgslidefooter2.jpg" alt="">
                    <img src="./assets/images/imgslidefooter3.jpg" alt="">
                    <img src="./assets/images/imgslidefooter4.jpg" alt="">
                    <img src="./assets/images/imgslidefooter5.jpg" alt="">
                    <img src="./assets/images/imgslidefooter6.jpg" alt="">
                </div>
            </div>
        </div>
        <!--slider track img -->

        <!--footer-->
        <?php
        include('footer.php');
        ?>
        <!--end footer-->

    </div>

    <script src="./assets/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="assets/slick/slick.min.js"></script>
    <script>
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

        /* slide slick track */
        $('.imgtrack').slick({
            infinite: true,
            slidesToShow: 4,
            autoplay: true,
            autoplaySpeed: 3000,
            prevArrow: false,
            nextArrow: false,
            slidesToScroll: 1

        });

        $('.slickslider').slick({
            dots: true,
            infinite: false,
            speed: 300,
            arrows: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
        /* end slide slick track */
    </script>
</body>

</html>
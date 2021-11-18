<?php
ob_start();
session_start();
?>
<style>
    #slider-blog {
        background-image: url('./assets/images/banner-blogs.png');
        position: relative;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        height: 550px;
        z-index: 1;
    }

    #layout {
        z-index: 2;
        position: absolute;
        width: 100%;
        top: 0;
        height: 550px;
    }

    .header-titl {
        position: absolute;
        bottom: 200px;
        left: 15px;
        padding: 3px 17px 7px;
        background: #e75a39;
        color: #fff;
        font-weight: 600;
    }

    .text {
        position: absolute;
        bottom: 45px;
        left: 15px;
        width: 50%;
        background: #fff;
        border-bottom: 3px solid #e75a39;
        padding: 3px 17px 7px;
    }

    .text p {
        opacity: 0.7;
    }
</style>

<body>
    <div id="main">
        <!--header-->
        <?php
        include('header.php');
        ?>
        <!--end header-->

        <!--slider-->
        <div id="slider-blog">
            <div class="owl-carousel owl-theme">
                <div class="container">

                </div>
            </div>
            <div class="header-titl">
                <h2>Do you like our cakes?</h2>
            </div>
            <div class="text">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo cequat.</p>
            </div>
        </div>
        <div id="layout">

        </div>
        <!--end slider-->

        <!--footer-->
        <?php
        include('footer.php');
        ?>
        <!--end footer-->

    </div>

</body>
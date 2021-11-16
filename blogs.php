<?php
ob_start();
session_start();
?>
<style>
    #slider-blog {
        background: #eb01a5;
        background-image: url('./assets/images/banner-blog.jpg'), linear-gradient(to top, transparent, #18151f);
        position: relative;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        height: 650px;
        z-index: 1;
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
        </div>
        <!--end slider-->

        <!--footer-->
        <?php
        include('footer.php');
        ?>
        <!--end footer-->

    </div>

</body>
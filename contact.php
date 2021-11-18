<?php
session_start();
include('header.php');
include('sendmail.php');
?>
<style>
    #contact-wrapper {
        margin: 100px 35px;
    }

    h2 {
        text-align: center;
        font-weight: 700;
        color: #FF4A52;
    }

    .contact-form {
        text-align: justify;
        box-shadow: 0 0 30px 0 rgb(82 63 105 / 10%);
        padding: 15px;
        border-radius: 5px;
    }

    .info-contact {
        line-height: 40px;
        color: #3C5A98;
        font-size: 18px;
        font-weight: 600;
    }

    .form-group {
        font-weight: 600;
        font-size: 15px;
        padding-top: 15px;
    }

    .form-group i,
    .info-contact i {
        color: #FF5801;
        width: 30px;
    }

    input,
    textarea {
        width: 100%;
    }

    input {
        height: 46px;
    }
</style>



<div id="contact-wrapper">
    <div class="row" style="align-items: center;">
        <div class="col-4 col-md-4 col-sm-12">
            <div class="info-contact">
                <p><i class="fas fa-map-marker-alt"></i> 29X, P25 Binh Thanh, Ho Chi Minh city</p>
                <p><i class="fas fa-at"></i> bakerystore@email.com</p>
                <p><i class="fas fa-phone"></i> +84 988 988 978</p>
                <p><i class="fas fa-clock"></i> Thứ hai - Thứ 6 : 8:00 AM tới 5:00 PM</p>
            </div>
        </div>
        <div class="col-8 col-md-8 col-sm-12">
            <div class="contact-form">
                <h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>
                <!--alert messages start-->
                <?php echo $alert; ?>
                <!--end alert messages start-->
                <form action="" method="post">
                    <div class="form-group">
                        <div class="row">

                            <div class="col-6 col-md-6 col-sm-12">
                                <label><i class="fas fa-user"></i> Tên của bạn</label><br>
                                <input type="text" name="full_name" value="" class="form-control" placeholder="Họ và tên (Bắt buộc)" required="">
                            </div>
                            <div class="col-6 col-md-6 col-sm-12">
                                <label><i class="fas fa-at"></i> Email</label><br>
                                <input type="email" name="email" value="" class="form-control" placeholder="Email (Bắt buộc)" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-md-12 col-sm-12">
                                <label><i class="far fa-envelope"></i> Nội dung</label><br>
                                <textarea type="text" name="message" value="" rows="8" cols="50" placeholder="Nội dung..." class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="order-submit">
                        <button type="submit" class="send-btn" name="send">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--Contact to us-->


<!--Map-->
<div class="map" style="width: 100%; border: 20px solid #fff; border-radius: 10px; box-shadow: 0 0 30px 0 rgb(82 63 105 / 20%);">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.114950633502!2d106.70935881520147!3d10.802507161664732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528bb2b618487%3A0xa0367c3c1420e674!2zMjkyIFjDtCBWaeG6v3QgTmdo4buHIFTEqW5oLCBQaMaw4budbmcgMjUsIELDrG5oIFRo4bqhbmgsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1637243961055!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
<!--End Map-->


<!--END Contact to us-->

<script type="text/javascript">
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php
include('footer.php');
?>
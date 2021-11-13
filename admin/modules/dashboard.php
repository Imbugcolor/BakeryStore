<?php
include('../conn.php');
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Thống Kê</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Đơn hàng</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <?php
                    $sql_sl = "SELECT * FROM `order-info` WHERE `status` = 1";
                    $count_rsl = mysqli_query($connect, $sql_sl);
                    $count = mysqli_num_rows($count_rsl);
                    ?>
                    <div class="card-body">Đang xử lý</div> <span style="text-align: center; font-size: 50px; color: "><?php echo $count ?></span>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Xem chi tiết</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <?php
                    $sql_sl2 = "SELECT * FROM `order-info` WHERE `status` = 2";
                    $count_rsl2 = mysqli_query($connect, $sql_sl2);
                    $count2 = mysqli_num_rows($count_rsl2);
                    ?>
                    <div class="card-body">Đã xử lý</div> <span style="text-align: center; font-size: 50px; color: "><?php echo $count2 ?></span>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Xem chi tiết</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <?php
                    $sql_sl3 = "SELECT * FROM `order-info` WHERE `status` = 3";
                    $count_rsl3 = mysqli_query($connect, $sql_sl3);
                    $count3 = mysqli_num_rows($count_rsl3);
                    ?>
                    <div class="card-body">Đang vận chuyển</div> <span style="text-align: center; font-size: 50px; color: "><?php echo $count3 ?></span>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Xem chi tiết</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <?php
                    $sql_sl4 = "SELECT * FROM `order-info` WHERE `status` = 4";
                    $count_rsl4 = mysqli_query($connect, $sql_sl4);
                    $count4 = mysqli_num_rows($count_rsl4);
                    ?>
                    <div class="card-body">Đã giao hàng</div> <span style="text-align: center; font-size: 50px; color: "><?php echo $count4 ?></span>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Xem chi tiết</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <?php
                    $sql_sl5 = "SELECT * FROM `order-info` WHERE `status` = 0";
                    $count_rsl5 = mysqli_query($connect, $sql_sl5);
                    $count5 = mysqli_num_rows($count_rsl5);
                    ?>
                    <div class="card-body">Đã Hủy</div> <span style="text-align: center; font-size: 50px; color: "><?php echo $count5 ?></span>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Xem chi tiết</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
</main>
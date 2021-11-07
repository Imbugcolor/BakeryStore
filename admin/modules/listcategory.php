<?php
    include('../conn.php');
?>
<div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
               Danh sách danh mục
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>                                    
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>                                    
                    </tr>
                </tfoot>
                <tbody>
                <?php
                    $sql_sl = "SELECT * FROM `category`";
                    $listCat = mysqli_query($connect,$sql_sl);
                    while($row = mysqli_fetch_array($listCat)) {?>
                
                    <tr>
                        <td><?php echo $row["cat_id"] ?></td>
                        <td><?php echo $row["cat_name"] ?></td>
                        <td><?php echo $row["cat_status"] ?></td>
                        <td><?php echo $row["date_create"] ?></td>
                    </tr>
                   <?php }
                   ?>
                </tbody>
                </div>
    </div>
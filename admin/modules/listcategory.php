<?php
    include('../conn.php');
?>
<style>
    tbody td a:first-child{
        padding: 5px;
        background-color: #0F90F2;
        color: #fff;
        text-decoration: none;
        border: 1px solid #0F90F2;
        transition: 0.3s;
    }
    tbody td a:nth-child(2){
        padding: 5px;
        background-color: #FF4A52;
        color: #fff;
        text-decoration: none;
        border: 1px solid #FF4A52;
        transition: 0.3s;
    }
    tbody td a:first-child:hover{
        color: #0F90F2;
        background-color: #fff;
    }
    tbody td a:nth-child(2):hover{
        color: #FF4A52;
        background-color: #fff;
    }
</style>
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
                        <th>Cập nhật</th>                                    
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th> 
                        <th>Cập nhật</th>                                    

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
                        <td style="width: 15%;">
                            <a href="?module=addcategory&id=<?php echo $row["cat_id"]?>" name="update">Sửa</a>
                            <a href="?module=deletecategory&id=<?php echo $row["cat_id"]?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" name="remove">Xóa</a>
                        </td>
                    </tr>
                   <?php }
                   ?>
                </tbody>
                </div>
    </div>
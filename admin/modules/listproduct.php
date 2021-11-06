<?php
    include('../conn.php');

?>
<style>
    tbody td a:first-child{
        padding: 5px 10px;
        background-color: #0F90F2;
        color: #fff;
        text-decoration: none;
        border: 1px solid #0F90F2;
        transition: 0.3s;
    }
    tbody td a:nth-child(2){
        padding: 5px 10px;
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
                DANH SÁCH SẢN PHẨM
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Loại sản phẩm</th>
                        <th>
                            Cập nhật
                        </th>                                       
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Loại sản phẩm</th>   
                        <th>
                            Cập nhật
                        </th>                                      
                    </tr>
                </tfoot>
                <?php
                    $sql_sl = "SELECT * FROM `product`";
                    $listProduct = mysqli_query($connect,$sql_sl);
                    while($row = mysqli_fetch_array($listProduct)) {?>

                <tbody>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><img style="width:50px; height:50px;" src="../upload/<?php echo $row["image"] ?>"></td>
                        <td><?php echo $row["description"] ?></td>
                        <td><?php echo $row["price"] ?></td>
                        <td><?php echo $row["cat_id"] ?></td>
                        <td>
                            <a href="?module=addproduct&id=<?php echo $row["id"]?>" name="update">Sửa</a>
                            <a href="?module=deleteproduct&id=<?php echo $row["id"]?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" name="remove">Xóa</a>
                        </td>
                    </tr>
                   <?php }
                   ?>
            
                </div>
    </div>

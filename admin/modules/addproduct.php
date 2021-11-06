<?php
    ob_start();
    include('../conn.php');
    if(empty($_GET["id"])){

    if(isset($_POST['add_product'])){
        $name = $_POST["name_product"];
        $img = $_FILES['image_product']['name'];
        $description = $_POST["description_product"];
        $price = $_POST["price_product"];
        $cat_product = $_POST["cat_product"];
        if($img != null){
            $path = "../upload/";
            $tmp_name = $_FILES['image_product']['tmp_name'];
            $img = $_FILES['image_product']['name'];

            move_uploaded_file($tmp_name,$path.$img);
            $sql = "INSERT INTO `product`(`name`,`image`,`description`,`price`,`cat_id`) VALUES('$name','$img','$description','$price','$cat_product')";
            mysqli_query($connect,$sql);
            $message = "Thêm sản phẩm thành công!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $message2 = "Chưa thêm ảnh!";
            echo "<script type='text/javascript'>alert('$message2');</script>";
        }
        }
    } else {
        if(isset($_POST['add_product'])){
            $name = $_POST["name_product"];
            $img = $_FILES['image_product']['name'];
            $description = $_POST["description_product"];
            $price = $_POST["price_product"];
            $cat_product = $_POST["cat_product"];
            $path = "../upload/";
            $tmp_name = $_FILES['image_product']['tmp_name'];
            $img = $_FILES['image_product']['name'];
         
            move_uploaded_file($tmp_name,$path.$img);
            $sql = "UPDATE `product` SET `name`='$name',`image`='$img',`description`='$description',`price`='$price',`cat_id`='$cat_product' WHERE id=".$_GET["id"];
            mysqli_query($connect,$sql);
            
            $message = "Cập nhật sản phẩm thành công!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            }
    }
?>
<style>
    table tr td{
        color: #0B5ED7;
        font-weight: 700;
    }
    table tr:last-child{
        height: 100px;
    }
</style>
<div class="container-add-product" style="margin:50px 100px; padding:50px; border-radius:5px; box-shadow:0 0 30px 0 rgb(82 63 105 / 10%);">

    <h2><?=!empty($_GET["id"])?"SỬA SẢN PHẨM" :"THÊM SẢN PHẨM MỚI"?></h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <?php
            if(isset($_GET["id"])){
            $sqlsl = "SELECT * FROM `product` WHERE id=".$_GET["id"];
            $result_sl = mysqli_query($connect,$sqlsl);
            $row = mysqli_fetch_array($result_sl);
            }
        ?>
        <table>
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" required name="name_product" value="<?=(!empty($row)? $row["name"]:"")?>"></td>
            </tr>
            <tr>
                <td>Ảnh</td>
                <td><?php if(!empty($row["image"])){ ?>
                    <img style="width: 100px; height:100px; " src="../upload/<?=$row["image"] ?>" alt="">
                   
                    <?php } ?> 
                </td>      
            </tr>
            <tr>
                <td></td>
                <td><input type="file"  name="image_product" value="<?=(!empty($row)? $row["image"]:"")?>"></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><textarea name="description_product" id="" cols="50" rows="5"><?=(!empty($row)? $row["description"]:"")?></textarea></td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><input type="number" required name="price_product" value="<?=(!empty($row)? $row["price"]:"")?>"></td>
            </tr>
            <tr>
                <td>Danh mục sản phẩm</td>
                <td><select name="cat_product" id="cat_select">
                    <?php
                          $listCat = "SELECT * FROM `category`";
                          $result = mysqli_query($connect,$listCat);
                          while($row = mysqli_fetch_array($result)){
                       ?>
                        <option value="<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_name"]; ?></option>
                   <?php } ?>
                  
                </select></td>
            </tr>
            <tr>
                <td><input type="submit" name="add_product" value="<?=!empty($_GET["id"])?"Cập nhật" :"Thêm mới"?>"></td>
            </tr>
        </table>

    </form>
</div>
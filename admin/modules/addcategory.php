<?php
    include('../conn.php');
    if(isset($_POST['addNewCat'])){
        $catName = $_POST["catName"];
        $status = isset($_POST["status"]) ? $_POST["status"] : 0;
        $sql_insert = "INSERT INTO `category`(cat_name,cat_status,date_create) VALUES('$catName','$status','".date("Y-m-d H:i:s")."') ";
        $addCat = mysqli_query($connect,$sql_insert) or die ("Lỗi thêm mới!");
    }
?>

<link href="../css/styles.css" rel="stylesheet" />
<div class="container-addcategory">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="box-form" >
                <form action="" method="POST">
                    <div class="form-group">
                        <div class="boxheader">
                            <label for="">Thêm mới danh mục</label>
                        </div>
                        <label for="" style="opacity: 0.6;">Tên danh mục</label><br>
                        <input id="catName" type="text" name="catName" placeholder="Nhập tên danh mục.." > <br>
                        <label for="" class="custom-checkbox"><input type="checkbox" class="custom-control-input" name="status" value="1"><span class="custom-control-label">Trạng thái</span></label><br>
                        <input id="addCat"  type="submit" name="addNewCat" value="Thêm mới">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
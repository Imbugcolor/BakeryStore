<?php
    session_start();
    include('conn.php');
    include('header.php');
?>
 <!--sidebar-social-->
 <?php
    include('socialsidebar.php');
    ?>
    <!--sidebar-social-->
<div class="category-product">
    <div class="row">
        <div class="col-3 col-md-2 " style="box-shadow: 0 0 30px 0 rgb(82 63 105 / 10%); border-radius:5px;">
            <div class="sbar">
            <?php
            include('sidebar.php')
            ?>
            </div>
        </div>
        <div class="col-9 col-md-10 col-sm-12"> 
            <?php           
                $search = isset($_GET['product-name']) ? $_GET['product-name'] : "";
    
                if($search){
                    $where = "AND `name` LIKE '%".$search."%'";
                }
            ?>
            <div class="search-product">
                <form action="" method="GET">
                    <label for="">Tìm kiếm sản phẩm</label>
                    <input class="search_input" type="text" value="<?=isset($_GET['product-name']) ? $_GET['product-name'] : "";?>" placeholder="Nhập tên sản phẩm..."name="product-name">
                    <input class="search_submit" type="submit" value="Tìm kiếm">
                </form> 
            </div>
            <div class="list-product product-container">
                <div class="row">
                <?php
                    if(isset($_GET['id'])){
                        
                    $id = $_GET['id'];
                    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:6;
                    $current_page = !empty($_GET['page'])?$_GET['page']:1;
                    $offset = ($current_page - 1) * $item_per_page;   
                    if($search){
                        $productquery = "SELECT * FROM `product` WHERE cat_id = $id AND `name` LIKE '%".$search."%' ORDER BY `id` ASC LIMIT ".$item_per_page." OFFSET ".$offset; 
                        $result2 = mysqli_query($connect, $productquery);
                        $totalRecords = mysqli_query($connect, "SELECT * FROM `product` WHERE cat_id = $id AND `name` LIKE '%".$search."%' ");
                    } else {
                        $productquery = "SELECT * FROM `product` WHERE cat_id = $id ORDER BY `id` ASC LIMIT ".$item_per_page." OFFSET ".$offset; 
                        $result2 = mysqli_query($connect, $productquery);
                        $totalRecords = mysqli_query($connect, "SELECT * FROM `product` WHERE cat_id = $id ");
                    }
                    $totalRecords = $totalRecords -> num_rows;
                    $totalPages = ceil($totalRecords / $item_per_page);         
                    while($row = mysqli_fetch_array($result2)) {?>
                    <div class="product col-3 col-md-4 col-sm-6">
                        <form method="get" action="category.php?id=<?=$row['id'] ?>" > 
                            <div class="product-single">
                                <div class="img-product">
                                    <img src="./upload/<?=$row['image']?>" alt="">
                                </div>
                                <div class="name-product">
                                    <p><?=$row['name'];?></p>
                                </div>
                                <div class="price-product">
                                    <p><?=number_format($row['price'], 0, '', ',');?> <span>VND</span></p>
                                </div>
                                <div class="view-product">
                                    <a href="product_details.php?id=<?=$row['id'];?>" class="view-details" >Xem chi tiết</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php }}else {
                    $id = 0;
                    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:6;
                    $current_page = !empty($_GET['page'])?$_GET['page']:1;
                    $offset = ($current_page - 1) * $item_per_page;
                    if($search){
                        $productquery = "SELECT * FROM `product` WHERE `name` LIKE '%".$search."%' ORDER BY `id` ASC LIMIT ".$item_per_page." OFFSET ".$offset;
                        $result2 = mysqli_query($connect, $productquery);
                        $totalRecords = mysqli_query($connect, "SELECT * FROM `product` WHERE `name` LIKE '%".$search."%' ");
                    } else{
                        $productquery = "SELECT * FROM `product` ORDER BY `id` ASC LIMIT ".$item_per_page." OFFSET ".$offset;
                        $result2 = mysqli_query($connect, $productquery);
                        $totalRecords = mysqli_query($connect, "SELECT * FROM `product` ");
                    }
                    $totalRecords = $totalRecords -> num_rows;
                    $totalPages = ceil($totalRecords / $item_per_page);      
                    while($row = mysqli_fetch_array($result2)) {?>
                    <div class="product col-3 col-md-4 col-sm-12">
                        <form method="get" action="category.php?id=<?=$row['id'] ?>" > 
                            <div class="product-single">
                                <div class="img-product">
                                    <img src="./upload/<?=$row['image']?>" alt="">
                                </div>
                                <div class="name-product">
                                    <p><?=$row['name'];?></p>
                                </div>
                                <div class="price-product">
                                    <p><?=number_format($row['price'], 0, '', ',');?> <span>VND</span></p>
                                </div>
                                <div class="view-product">
                                    <a href="product_details.php?id=<?=$row['id'];?>" class="view-details" >Xem chi tiết</a>
                                </div>
                            </div>
                        </form>                      
                    </div> 
                    <?php  
                    } } ?>
                </div>
                <div style="text-align: center; padding-bottom: 25px;" class="pagination">
                    <?php include("pagination.php");     ?>
                </div>    
            </div>
            </div>
            
    </div>
</div>

<?php
 include('footer.php');
?>
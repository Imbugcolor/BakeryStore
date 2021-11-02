<?php
    session_start();
    include('conn.php');
    include('header.php');
?>
<div class="category-product">
    <div class="row">
        <div class="col-3 col-md-3 ">
            <!-- <div class="nav-sidebar">
                    <div class="nav-text">Danh Mục Sản Phẩm</div>
                    <ul>
                        <?php
                            $listCat = "SELECT * FROM `category`";
                            $result = mysqli_query($connect,$listCat);
                            while($row = mysqli_fetch_array($result)){
                    
                        ?>
                            <li><a href="category.php?id=<?php echo $row['cat_id'];?>"><?php echo $row['cat_name']; ?></a></li>  
                            
                        <?php }
                        
                        ?>    
                    </ul>
            </div> -->
            <?php
            include('sidebar.php')
            ?>
        </div>
        <div class="col-9 col-md-9 col-sm-12">  
            <div class="list-product">
                <div class="row">
                <?php
                    if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $productquery = "SELECT * FROM `product` WHERE cat_id = $id";
                    $result2 = mysqli_query($connect, $productquery);
                            
                    while($row = mysqli_fetch_array($result2)) {?>
                    <div class="product col-3 col-md-4 col-sm-6">
                        <form method="get" action="category.php?id=<?=$row['id'] ?>" > 
                            <div class="product-single">
                                <div class="img-product">
                                    <img src="./assets/images/<?=$row['image']?>" alt="">
                                </div>
                                <div class="name-product">
                                    <p><?=$row['name'];?></p>
                                </div>
                                <div class="price-product">
                                    <p><?=$row['price'];?> <span>VND</span></p>
                                </div>
                                <div class="view-product">
                                    <a href="product_details.php?id=<?=$row['id'];?>" class="view-details" >Xem chi tiết</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php }}else {
                    $productquery = "SELECT * FROM `product`";
                    $result2 = mysqli_query($connect, $productquery);
                            
                    while($row = mysqli_fetch_array($result2)) {?>
                    <div class="product col-3 col-md-4 col-sm-12">
                        <form method="get" action="category.php?id=<?=$row['id'] ?>" > 
                            <div class="product-single">
                                <div class="img-product">
                                    <img src="./assets/images/<?=$row['image']?>" alt="">
                                </div>
                                <div class="name-product">
                                    <p><?=$row['name'];?></p>
                                </div>
                                <div class="price-product">
                                    <p><?=$row['price'];?> <span>VND</span></p>
                                </div>
                                <div class="view-product">
                                    <a href="product_details.php?id=<?=$row['id'];?>" class="view-details" >Xem chi tiết</a>
                                </div>
                            </div>
                        </form>
                    </div>  
                    <?php  
                    } } 
                            
                ?>
                </div>
            </div>
            </div>
            
    </div>
</div>

<?php
 include('footer.php');
?>
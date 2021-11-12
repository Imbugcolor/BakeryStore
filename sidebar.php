<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  body {
    font-family: "Lato", sans-serif;
  }

  .sidenav {
    height: calc(100% - 80px);
    width: 0;
    position: fixed;
    z-index: 1;
    top: 80px;
    left: 0;
    background-color: #C7B299;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
  }

  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 18px;
    color: #040E27;
    display: block;
    transition: 0.3s;
  }

  .sidenav a:hover {
    color: #FF4A52;
  }

  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }
  .sideNavtoggle{
    display: none;
  }
  #main {
    transition: margin-left .5s;
    padding: 16px;
  }
  @media screen and (max-width: 1024px) {
    .categoryNav{
      display: none;
    }
    .sideNavtoggle{
      display: block;
    }
  }
  @media screen and (max-width: 740px) {
    .categoryNav{
      display: none;
    }
    .sideNavtoggle{
      display: block;
    }
    .sideNavtoggle span{
      font-size: 18px;
      position: fixed;
      left: 0;
      top: 80px;
      color: #4752C4;
    }
  }
  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
  .categoryNav ul li{
    list-style-type: none;
    transition: 0.3s;
  }
  .categoryNav ul li a{
    text-decoration: none;
    font-size: 16px;
    color: #3C5A98;
    font-weight: 700;
    line-height: 40px;
    display: block;
  }
  .categoryNav  a i{
    color: #353E4E;
  }
  .categoryNav h2{
    color: #353E4E;
    border-bottom: 1px solid #353E4E;
  }
  .categoryNav ul li:hover{
    background-color: #FF4A52;
    border-radius: 20px;
    cursor: pointer;
    transition: 0.3s;
  }
  .categoryNav ul li:hover a,
  .categoryNav ul li:hover i{
    color: #fff;
    padding-left: 3px;
    transition: 0.3s;
  }
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="category.php">Tất cả</a>
  <?php
        include('conn.php');
        $listCat = "SELECT * FROM `category`";
        $result = mysqli_query($connect,$listCat);
        while($row = mysqli_fetch_array($result)){
     ?>
    <a href="category.php?id=<?php echo $row['cat_id'];?>"><i class="fas fa-chevron-right"></i> <?php echo $row['cat_name']; ?></a>  
                            
    <?php }
                            
    ?>    
</div>

<div id="main" class="sideNavtoggle" >
  <h2>Danh mục</h2>
  <p>Hiển thị các danh mục <br> sản phẩm</p>
  <span onclick="openNav()">&#9776; open</span>
</div>
<div class="categoryNav">
  <h2>Danh mục</h2>
  <ul>
    <li><a href="category.php"><i class="fas fa-chevron-right"></i> Tất cả</a></li>
  <?php
        include('conn.php');
        $listCat = "SELECT * FROM `category`";
        $result = mysqli_query($connect,$listCat);
        while($row = mysqli_fetch_array($result)){
     ?>
       <li><a href="category.php?id=<?php echo $row['cat_id'];?>"><i class="fas fa-chevron-right"></i> <?php echo $row['cat_name']; ?></a></li>                            
    <?php }
                            
    ?>     
  </ul>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>
</html> 
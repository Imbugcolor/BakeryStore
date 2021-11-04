<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 500px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 100px;
  left: 0;
  background-color: #C7B299;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
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

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
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
    <a href="category.php?id=<?php echo $row['cat_id'];?>"><?php echo $row['cat_name']; ?></a></li>  
                            
    <?php }
                            
    ?>    
</div>

<div id="main" class="sideNavtoggle" style="">
  <h2>Danh mục</h2>
  <p>Hiển thị các danh mục <br> sản phẩm</p>
  <span style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776; open</span>
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
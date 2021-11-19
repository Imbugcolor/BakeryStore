<?php
session_start();
if (isset($_POST["id"]) && isset($_POST["num"])) {
    include('conn.php');
    $id = $_POST["id"];
    $num = $_POST["num"];
    $sql_query = "SELECT * FROM `product` WHERE id = $id";
    $result = mysqli_query($connect, $sql_query);
    $row = mysqli_fetch_array($result);
    //lan dau tien them san pham vao gio hang
    if (!isset($_SESSION["cart"])) {
        $cart = array();
        $cart[$id] = array(
            'name' => $row['name'],
            'num' => $num,
            'price' => $row['price'],
            'image' => $row['image']
        );
    } else { /* da thuc hien them san pham nao do vao gio hang*/
        $cart = $_SESSION["cart"];
        if (array_key_exists($id, $cart)) {
            $cart[$id] = array(
                'name' => $row['name'],
                'num' => (int)$cart[$id]['num'] + $num,
                'price' => $row['price'],
                'image' => $row['image']
            );
        } else {
            $cart[$id] = array(
                'name' => $row['name'],
                'num' => $num,
                'price' => $row['price'],
                'image' => $row['image']
            );
        }
    }
    $_SESSION["cart"] = $cart; //tao ra gio hang
    $numCart = 0;
    foreach ($cart as $key => $value) {
        $numCart++;
    }
    echo $numCart;
}

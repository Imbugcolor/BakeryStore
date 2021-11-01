<?php
    session_start();
    if(isset($_POST["id"]) && isset($_POST["num"])){
        include('conn.php');
        $id = $_POST["id"];
        $num = $_POST["num"];
        $sql_query = "SELECT * FROM `product` WHERE id = $id";
        $result = mysqli_query($connect, $sql_query);
        $row = mysqli_fetch_array($result);
        if(!isset($_SESSION["cart"])){
            $cart = array();
            $cart[$id] = array(
                'name' => $row['name'],
                'num' => $num,
                'price' => $row['price'],
                'image' => $row['image']
            );
        } else{
            $cart = $_SESSION["cart"];
            if(array_key_exists($id, $cart)){
                $cart[$id] = array(
                    'name' => $row['name'],
                    'num' => (int)$cart[$id]['num'] + $num,
                    'price' => $row['price'],
                    'image' => $row['image']
                );
            } else{
                $cart[$id] = array(
                    'name' => $row['name'],
                    'num' => $num,
                    'price' => $row['price'],
                    'image' => $row['image']
                );
            }
        }
        $_SESSION["cart"] = $cart;
        $numCart = 0;
        foreach($cart as $key => $value){
            $numCart ++;
        }
        echo $numCart;
    }
?>
<?php
require "php/connection.php";
if (isset($_GET['cart_id'])){
    $cartid = $_GET['cart_id'];
        $query = "UPDATE shop SET cart_count=1 where ID = $cartid";
         $result = mysqli_query($conn,$query);
         header('Location: index.php');
}
if (isset($_GET['delete_id'])){
    $deleteid = $_GET['delete_id'];
        $query = "UPDATE shop SET cart_count=0 where ID = $deleteid";
         $result = mysqli_query($conn,$query);
         header('Location: cart.php');
}
?>
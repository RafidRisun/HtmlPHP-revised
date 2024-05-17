<?php
    require_once('sessionCheck.php');
    require_once('../models/cartModel.php');
    
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $amount = $_POST['amount'];
    $userName = $_SESSION['currentUserName'];

    addCart($userName, $productName, $productPrice, $amount);

    echo "<script>";
    echo "alert('Item has been added to the cart.');";
    echo "window.location.href = '../views/homepage.php';";
    echo "</script>";
?>

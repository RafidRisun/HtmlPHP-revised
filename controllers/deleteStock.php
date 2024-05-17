<?php
    require_once('sessionCheck.php');
    require_once('../models/productModel.php');
    require_once('../models/cartModel.php');

    $userName = $_SESSION['currentUserName'];
    $productName = $_POST['productName'];

    deleteStockItem($userName, $productName);

    echo "<script>";
    echo "alert('Deleted from Stock!.');";
    echo "window.location.href = '../views/instock.php';";
    echo "</script>";
?>

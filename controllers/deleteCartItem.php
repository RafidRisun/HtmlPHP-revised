<?php
    require_once('sessionCheck.php');
    require_once('../models/cartModel.php');

    $userName = $_SESSION['currentUserName'];
    $productName = $_POST['productName'];

    deleteCartItem($userName, $productName);

    echo "<script>";
    echo "alert('Deleted from Cart!.');";
    echo "window.location.href = '../views/cart.php';";
    echo "</script>";
?>

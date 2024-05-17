<?php
    require_once('sessionCheck.php');
    require_once('../models/cartModel.php');
    require_once('../models/productModel.php');

    $userName = $_SESSION['currentUserName'];

    $cartItems = getCart($userName);
    $allItemsInStock = true;

    foreach ($cartItems as $item) {
        $productName = $item['productName'];
        $product = getProduct($productName);
        if ($product['availability'] != 'yes') {
            $allItemsInStock = false;
            break;
        }
    }

    if ($allItemsInStock) {
        confirmCart($userName);
        echo "<script>";
        echo "alert('Order Confirmed!.');";
        echo "window.location.href = '../views/homepage.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Some items are out of stock. Please remove them from your cart before confirming.');";
        echo "window.location.href = '../views/cart.php';";
        echo "</script>";
    }
?>

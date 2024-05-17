<?php

require_once('db.php');

function addCart($userName, $productName, $productPrice, $amount) {
    $con = getConnection();
    $sql = "INSERT INTO cart (userName, productName, productPrice, amount, confirmed) VALUES ('$userName', '$productName', '$productPrice', '$amount', 'no')";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function confirmCart($userName) {
    $con = getConnection();
    $sql = "UPDATE cart SET confirmed = 'yes' WHERE userName = '$userName'";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function getCart($userName) {
    $con = getConnection();
    $sql = "SELECT * FROM cart WHERE userName='$userName' AND confirmed='no'";
    $result = mysqli_query($con, $sql);

    if (!$result || mysqli_num_rows($result) == 0) {
        return NULL; 
    }

    $cart = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $cart[] = $row; 
    }
    return $cart;
}
function getOrders($userName) {
    $con = getConnection();
    $sql = "SELECT * FROM cart WHERE userName='$userName' AND confirmed='yes'";
    $result = mysqli_query($con, $sql);

    if (!$result || mysqli_num_rows($result) == 0) {
        return NULL; 
    }

    $cart = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $cart[] = $row; 
    }
    return $cart;
}

function getInStock($userName) {
    $con = getConnection();
    $sql = "SELECT *, SUM(amount) as totalAmount
            FROM cart 
            WHERE userName='$userName' AND confirmed='yes'
            GROUP BY productName";
    $result = mysqli_query($con, $sql);

    if (!$result || mysqli_num_rows($result) == 0) {
        return NULL; 
    }

    $cart = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $cart[] = $row; 
    }
    return $cart;
}


function deleteCartItem($userName, $productName) {
    $con = getConnection();
    $sql = "DELETE FROM cart WHERE userName='$userName' AND productName='$productName' AND confirmed='no'";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}
function deleteStockItem($userName, $productName) {
    $con = getConnection();
    $sql = "DELETE FROM cart WHERE userName='$userName' AND productName='$productName' AND confirmed='yes'";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

?>

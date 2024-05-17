<?php
    require_once('db.php');

    function createProduct($productName, $price, $amount, $availability, $inStock, $category) {
        $con = getConnection();
        $sql = "insert into products (productName, price, amount, availability, inStock, category) values ('$productName', '$price', '$amount', '$availability', '$inStock', '$category')";
        
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    function deleteFromStock($userName, $productName){
        $con = getConnection();
        $sql = "delete from products where userName = '$userName', productName = '$productName'";
        
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    function getProduct($productName) {
        $con = getConnection();
        $sql = "select * from products where productName = '$productName'";
        $result = mysqli_query($con, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    function getAllProducts() {
        $con = getConnection();
        $sql = "select * from products";
        $result = mysqli_query($con, $sql);
        $products = [];
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
        }
        
        return $products;
    }

    function getProductsByCategory($category) {
        $con = getConnection();
        $sql = "select * from products where category = '$category'";
        $result = mysqli_query($con, $sql);
        $products = [];
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
        }
        
        return $products;
    }

    function getAvailableProducts() {
        $con = getConnection();
        $sql = "select * from products where availability = 'yes'";
        $result = mysqli_query($con, $sql);
        $products = [];
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
        }
        
        return $products;
    }
?>

<?php
    require_once('../controllers/sessionCheck.php');
    require_once('../models/productModel.php');
    require_once('../models/cartModel.php');
    $userName = $_SESSION['currentUserName'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .products-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .product-card {
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 10px;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .product-img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        nav {
            display: inline-block;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../views/homepage.php">Home</a></li>
                <li><a href="../views/category.php">Category</a></li>
                <li><a href="../views/instock.php">In Stock</a></li>
                <li><a href="../views/orders.php">Order History</a></li>
                <li><a href="../views/dashboard.php">Dashboard</a></li>
                <li><a href="../views/cart.php">Cart</a></li>
                <li><a href="../views/aboutus.html">About Us</a></li>
                <li><a href="../views/logout.php">Log Out</a></li>
            </ul>
        </nav>
    </header>
    <h2>Items in stock</h2>
    <div class="products-container">
    <?php
        $products = getInStock($userName);
        if ($products !== null) {
            foreach ($products as $product) {
                echo "<div class='product-card'>";
                echo "<img src='" . $product['photo'] . "' class='product-img' alt='Product Image'>";
                echo "<h3>" . $product['productName'] . "</h3>";
                echo "<p>$" . $product['productPrice'] . "</p>";
                echo "<p>Total Amount: " . $product['totalAmount'] . "</p>";
                echo "<form action='../controllers/deleteStock.php' method='post'>";
                echo "<input type='hidden' name='productName' value='" . $product['productName'] . "'>";
                
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "<p>No products found</p>";
        }
    ?>
</div>

</body>
</html>

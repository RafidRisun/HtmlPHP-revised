<?php
    require_once('../controllers/sessionCheck.php');
    require_once('../models/cartModel.php');
    require_once('../models/productModel.php');
    $userName = $_SESSION['currentUserName'];
    $cartItems = getCart($userName);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .products-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Center items horizontally */
            padding: 20px;
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
        .product-card h3 {
            margin-top: 10px;
            margin-bottom: 5px;
        }
        .product-card p {
            margin: 5px 0;
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
                <li><a href="../views/orders.php">Orders</a></li>
                <li><a href="../views/dashboard.php">Dashboard</a></li>
                <li><a href="../views/cart.php">Cart</a></li>
                <li><a href="../views/aboutus.html">About Us</a></li>
            </ul>
        </nav>
    </header>
    <h2>Cart</h2>
    <div class="products-container">
        <?php
            $totalBill = 0; // Initialize total bill variable
            if ($cartItems) {
                foreach ($cartItems as $item) {
                    $productName = $item['productName'];
                    $product = getProduct($productName);
                    $totalBill += $product['productPrice']; // Update total bill
                    echo "<div class='product-card'>";
                    echo "<img src='" . $product['photo'] . "' class='product-img' alt='Product Image'>";
                    echo "<h3>" . $product['productName'] . "</h3>";
                    echo "<p>$" . $product['productPrice'] . "</p>";
                    
                    echo "<form action='../controllers/deleteCartItem.php' method='post'>";
                    echo "<input type='hidden' name='productName' value='" . $productName . "'>";
                    echo "<button type='submit'>Delete</button>";
                    echo "</form>";
                    echo "</div>";
                }
                
                echo "<h2>Total Bill: $" . $totalBill . "</h2>";
                echo "<form action='../controllers/confirmCart.php' method='post'>";
                echo "<button type='submit' name='confirmAll'>Confirm All</button>";
                echo "</form>";
            } else {
                echo "<p>No items in the cart</p>";
            }
        ?>
    </div>
</body>


</html>

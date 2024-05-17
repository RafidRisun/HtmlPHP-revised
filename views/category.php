<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products by Category</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .category-container {
            margin-bottom: 20px;
        }
        .category-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .products-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
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
    <?php
        require_once('../models/productModel.php');
        
        $categories = array("Milk", "Yogurt", "Cheese", "Butter", "Ghee", "Cream", "Chocolate");
        
        foreach ($categories as $category) {
            $products = getProductsByCategory($category);
            
            if (!empty($products)) {
                echo "<div class='category-container'>";
                echo "<h2 class='category-title'>$category</h2>";
                echo "<div class='products-container'>";
                
                foreach ($products as $product) {
                    echo "<div class='product-card'>";
                    echo "<img src='" . $product['photo'] . "' class='product-img' alt='Product Image'>";
                    echo "<h3>" . $product['productName'] . "</h3>";
                    echo "<p>$" . $product['productPrice'] . "</p>";
                    echo "<form action='../controllers/cart.php' method='post'>";
                    echo "<input type='hidden' name='productName' value='" . $product['productName'] . "'>";
                    echo "<input type='hidden' name='productPrice' value='" . $product['productPrice'] . "'>";
                    echo "<input type='hidden' name='amount' value='" . $product['amount'] . "'>";
                    echo "<input type='hidden' name='availability' value='" . $product['availability'] . "'>";
                    echo "<button type='submit'>Add to Cart</button>";
                    echo "</form>";
                    echo "</div>";
                }
                echo "</div>";
                echo "</div>";
            }
        }
    ?>
</body>
</html>

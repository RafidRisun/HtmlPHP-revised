<?php
    require_once('../controllers/sessionCheck.php');
    require_once('../models/userModel.php');

    $userName = $_SESSION['currentUserName'];
    $user = getUser($userName);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .user-info {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .user-info h2 {
            margin-bottom: 20px;
        }
        .user-info p {
            margin-bottom: 10px;
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
<div class="user-info">
    <h2>User Information</h2>
    <p><strong>Full Name:</strong> <?php echo $user['FullName']; ?></p>
    <p><strong>User Name:</strong> <?php echo $user['UserName']; ?></p>
    <p><strong>Email:</strong> <?php echo $user['Email']; ?></p>
    <p><strong>Address:</strong> <?php echo $user['address']; ?></p>
    <form action="../views/editUser.php" method="post">
        <input type="hidden" name="fullName" value="<?php echo $user['FullName']; ?>">
        <input type="hidden" name="userName" value="<?php echo $user['UserName']; ?>">
        <input type="hidden" name="email" value="<?php echo $user['Email']; ?>">
        <input type="hidden" name="address" value="<?php echo $user['address']; ?>">
        <input type="submit" name="edit" value="Edit">
    </form>
</div>

</body>
</html>

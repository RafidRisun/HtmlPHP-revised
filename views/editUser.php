<?php
    require_once('../controllers/sessionCheck.php');

    $fullName = $_POST['fullName'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .edit-form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .edit-form h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .edit-form input[type="text"], .edit-form input[type="email"], .edit-form textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .edit-form input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }
        .edit-form input[type="submit"]:hover {
            background-color: #0056b3;
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
    <div class="edit-form">
        <h2>Edit User Information</h2>
        <form action="../controllers/editUserCheck.php" method="post">
            Full Name:
            <input type="text" id="newFullName" name="newFullName" value="<?php echo $fullName; ?>">
            Email:
            <input type="text" id="newEmail" name="newEmail" value="<?php echo $email; ?>">
            Address:
            <input type="text" id="newAddress" name="newAddress" value="<?php echo $address; ?>">
            
            <input type="submit" name="update" value="Update">
        </form>
    </div>
</body>
</html>

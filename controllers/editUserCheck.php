<?php
    require_once('../models/userModel.php');

    require_once('../controllers/sessionCheck.php');
    $userName = $_SESSION['currentUserName'];

    $newFullName = $_POST['newFullName'];
    $newEmail = $_POST['newEmail'];
    $newAddress = $_POST['newAddress'];

        if (updateUser($userName, $newFullName, $newEmail, $newAddress)) {
            echo "<script>alert('User information updated successfully!'); window.location.href = '../views/dashboard.php';</script>";
        } else {
            echo "<script>alert('Failed to update user information.');</script>";
        }
?>
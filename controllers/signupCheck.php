<?php
    require_once('../models/userModel.php');
    $fullName = $_POST['fullName'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $confirmpass = $_POST['confirmpass'];

    if ($userName == "" || $fullName == "" || $email == "" || $pass == "") {
        echo "Fill up the form first";
    } else if (strlen($pass) < 8 && $pass != $confirmpass) {
        echo "password shorter than 8 character or does not match";
        } else {
            signUp($userName, $fullName, $email, $pass);
            header("location: ../views/login.html");
        }
?>
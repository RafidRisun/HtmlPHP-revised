<?php
    session_start();
    require_once('../models/userModel.php');
    $userName = $_REQUEST['userName'];
    $password = $_REQUEST['password'];

    if($userName == "" || $password == "" ){
        echo "Empty userName or password!";
        
    }else{
        $status = login($userName, $password);
        if ($status){
            $_SESSION['flag'] = 'true';
            $_SESSION['currentUserName'] = $userName;
            $_SESSION['username'] = $userName;
            $_SESSION['password'] = $password;
            header("location: ../views/homepage.php");

        }else{
            echo "Invalid User!";
        }
    }
?>
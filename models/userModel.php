<?php

    require_once('db.php');
    function login($userName, $password)
    {
        $con = getConnection();
        $sql = "select * from users where username='{$userName}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        $user = mysqli_fetch_array($result);
        if ($count == 1) {
            session_start();
            setcookie('userName', $row['UserName'], time() + 3600, '/');
            //setcookie('flag', 'true', time()+3600, '/');
            $_SESSION['username'] = $row['UserName'];
            $_SESSION['currentUserName'] = $row['UserName'];
            $_SESSION['password'] = $row['Password'];
            $_SESSION['flag'] = "true";
            return true;
        } else {
            return false;
        }
    }

    function signUp($userName, $name, $email, $pass)
    {
        $con = getConnection();
        $user = getUser($userName);
        if($user){
            echo "User already exists!";
            return false;
        }
        $sql = "insert into users (UserName, FullName, Email, Password) values ('$userName', '$name', '$email', '$pass')";
        $res = mysqli_query($con, $sql);
        
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
    

    function getUser($userName){
        $con = getConnection();
        $sql = "select * from Users where userName='{$userName}'";
        $result = mysqli_query($con, $sql);

        if(!$result) {
            return NULL;
        }

        $user = mysqli_fetch_assoc($result);
        return $user;
    }


    function deleteUser($userName){
        $con = getConnection();
        $sql = "delete from Users where userName = '{$userName}'";
        $result = mysqli_query($con, $sql);
        
        if(!$result){
            return false;
        }else{
            return true;
        }

    }

    function updateUser($userName, $newFullName, $newEmail, $newAddress){
        $user = getUser($userName);
        $con = getConnection();

        
        $sql = "update Users set email = '{$newEmail}', fullName = '{$newFullName}', address = '{$newAddress}' where userName = '{$userName}'";

        $result = mysqli_query($con, $sql);
        if(!$result){
            return false;
        }else{
            return true;
        }
    }

    function checkDuplicateUserName($userName){
        $con = getConnection();
        $sql = "select * from Users where userName='{$userName}'";
        $result = mysqli_query($con, $sql);

        if(!$result) {
            return NULL;
        }

        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    function checkDuplicateEmail($email){
        $con = getConnection();
        $sql = "select * from Users where email='{$email}'";
        $result = mysqli_query($con, $sql);

        if(!$result) {
            return NULL;
        }

        $user = mysqli_fetch_assoc($result);
        return $user;
    }

?>
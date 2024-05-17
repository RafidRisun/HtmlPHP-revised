<?php 
    session_start();
    unlink($_SESSION['currentUserName']);
    header('location: ../views/login.html');
?>
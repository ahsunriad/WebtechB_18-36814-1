<?php
    if(isset($_COOKIE['rememberMe'])){
        session_start();
    }
    else if(isset($_COOKIE['isValid'])){
        session_start();
    }
    else if(!isset($_SESSION)){
        session_start();
    }
    else 
    {
        header('location: login.php');
    }
?>
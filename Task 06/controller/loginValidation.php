<?php
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        require_once('../db/userServices.php');
        if(empty($_POST['username']) && empty($_POST['password'])){
            header('location: ../views/login.php?message=both_empty');
        }
        else if (empty($_POST['username'])){
            header('location: ../views/login.php?message=empty_username');
        }
        else if (empty($_POST['password'])){
            header('location: ../views/login.php?message=empty_password');
        }
        else {
            $userData = ["username" => $username, "password" => $password];
            $status = validateUser($userData);
            if(!empty($status)){
                if(count($status) == 6){ 
                    if (isset($_POST['rememberMe'])) {
                        setcookie('rememberMe', 'true',  time()+180, '/');
                    }
                    setcookie('Valid', 'true',  time()+60, '/');
                    session_start();
                    $_SESSION['start'] = 'true';
                    $_SESSION['name'] = $status['name'];
                    $_SESSION["username"] = $status['username'];
                    //print_r($_SESSION);exit;
                    header ('location: ../views/dashboard.php'); //Redirecting to Homepage after successfull login.
                }
            }
            else {
                header('location: ../views/login.php?message=invalid_user');
            }
        }

    }
    else {
        header('location: ../views/login.php');
    }
?>
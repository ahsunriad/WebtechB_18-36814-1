<?php
    if(isset($_POST['submit'])){
        if(empty($_POST['username']) && empty($_POST['password'])){
            header('location: login.php?message=both_empty');
        }
        else if (empty($_POST['username'])){
            header('location: login.php?message=empty_username');
        }
        else if (empty($_POST['password'])){
            header('location: login.php?message=empty_password');
        }
        else {
            $data = file_get_contents("data.json");  
            $data = json_decode($data, true); 
            $userData = [];
            foreach($data as $row)  
            { 
                if($row["username"] == $_POST['username'] && $row["password"] != $_POST['password'] ){
                    header ('location: login.php?message=wrong_password');
                    break;
                }
                else if($row["username"] == $_POST['username'] && $row["password"] == $_POST['password'] ){
                    $userData = $row;
                    break;
                }
            }
            if(empty($userData)){
                    header ('location: login.php?message=invalid_user'); //Redirecting to Login Page because Username & Password mismatch
            }
            else{ 
                if (isset($_POST['rememberMe'])) {
                    setcookie('rememberMe', 'true',  time()+180, '/');
                }
                session_start();
                $_SESSION['start'] = 'true';

    
                header ('location: profile picture.php'); //Redirecting to Homepage after successfull login.
            }
        }

    }
    else {
        header('location: login.php');
    }
?>
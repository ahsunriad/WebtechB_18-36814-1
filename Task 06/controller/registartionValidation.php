<?php
    if (!isset($_POST['submit'])) {
        header('location: ../views/registration.php');
    }
    else{
        require_once('../db/userServices.php');
        if (empty($_POST['name']) && empty($_POST['email']) && empty($_POST['username']) && empty($_POST['password']) && empty($_POST['cpassword']) && empty($_POST['gender']) && empty($_POST['dob'])){
            header('location: ../views/registration.php?message=all_empty');
        }
        else if (empty($_POST['name'])){
            header('location: ../views/registration.php?message=empty_name');
        }
        else if (empty($_POST['email'])){
            header('location: ../views/registration.php?message=empty_email');
        }
        else if (empty($_POST['username'])){
            header('location: ../views/registration.php?message=empty_username');
        }
        else if (empty($_POST['password'])){
            header('location: ../views/registration.php?message=empty_password');
        }
        else if (empty($_POST['cpassword'])){
            header('location: ../views/registration.php?message=empty_conpassword');
        }
        else if (empty($_POST['gender'])){
            header('location: ../views/registration.php?message=empty_gender');
        }
        else if (empty($_POST['dob'])){
            header('location: ../views/registration.php?message=empty_dob');
        }
        else if ($_POST['password'] != $_POST['cpassword']){
            header('location: ../views/registration.php?message=password_missmatch');
        }
        else{
            $userData = ["username" => $_POST['username'], "name" => $_POST['name'], "email"=> $_POST['email'], "password" => $_POST['password'], "gender"=> $_POST['gender'], "dob"=> $_POST['dob']];
            //print_r($userData);exit;
            $status = insertUser($userData);

            if($status){ 
                header('location: ../views/registration.php?message=sucess');  
            }   
            else  
            {  
                header('location: ../views/registration.php?message=failed');
            } 
        }

    }
?>
<?php
    require_once('../views/includes/header.php');
    if(isset($_POST['submit'])){
        require_once('../db/userServices.php');
        $username = $_SESSION["username"];
        if(empty($_POST['name']) && empty($_POST['email']) && empty($_POST['gender']) && empty($_POST['dob']))
        {
            header('location: ../views/editProfile.php?message=all_empty');
        }
        else if(empty($_POST['name']))
        {
            header('location: ../views/editProfile.php?message=empty_name');
        }
        else if(empty($_POST['email']))
        {
            header('location: ../views/editProfile.php?message=empty_email');
        }
        else if(empty($_POST['gender']))
        {
            header('location: ../views/editProfile.php?message=empty_gender');
        }
        else if(empty($_POST['dob']))
        {
            header('location: ../views/editProfile.php?message=empty_dob');
        }
        else {
            $userData= ["username" => $username, "name" => $_POST['name'], "email" =>  $_POST['email'], "gender" => $_POST['gender'], "dob" => $_POST['dob']];
            $status = updateProfile($userData);
            if($status){
                header('location: ../views/editProfile.php?message=sucess');
                $message="Profile Updated sucessfully.";
            }
            else  
                {  
                    header('location: ../views/editProfile.php?message=error');
                } 
        }
        
    }
    else  
    {  
        header('location: ../views/login.php');
    }
?>
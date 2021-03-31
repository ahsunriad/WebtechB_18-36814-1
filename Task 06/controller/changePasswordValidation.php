<?php 
    require_once('../views/includes/header.php');
    if(isset($_POST['submit'])){
        require_once('../db/userServices.php');
        
        $username = $_SESSION["username"];
        $newPassword = $_POST['newPassword'];
        
        if(empty($_POST['oldPassword']) && empty($_POST['newPassword']) && empty($_POST['retypeNewPassword']))
        {
            header('location: ../views/changePassword.php?message=all_empty');
        }
        else if(empty($_POST['oldPassword']))
        {
            header('location: ../views/changePassword.php?message=empty_oldPassword');
        }
        else if(empty($_POST['newPassword']))
        {
            header('location: ../views/changePassword.php?message=empty_newPassword');
        }
        else if(empty($_POST['retypeNewPassword']))
        {
            header('location: ../views/changePassword.php?message=empty_retypeNewPassword');
        }
        else {
            if($_POST['newPassword'] == $_POST['retypeNewPassword']){
                $userData = ["password" => $newPassword, "username" => $username];
                $status = validatePassword($userData);
                //print_r($status);exit;
                if($status){
                    //print_r($status);exit;
                    header('location: ../views/changePassword.php?message=sucessfull');
                }
                else  
                    {  
                        header('location: ../views/changePassword.php?message=not_exists');
                    } 
            }
        }
        
    }
    else  
    {  
        header('location: ../views/login.php');
    }
?>
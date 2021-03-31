<?php
    $localhost = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
    $database = 'hydra';

    function getConnection(){
        global $localhost;
        global $dbuser;
        global $dbpassword;
        global $database;
        
        $conn= mysqli_connect($localhost, $dbuser, $dbpassword, $database);
        return $conn;
    }
?>
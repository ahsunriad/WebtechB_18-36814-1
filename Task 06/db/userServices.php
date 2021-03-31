<?php
    require_once('db.php');
    function validateUser($userData){
        $conn=getConnection(); 
        $sql = "select * from users where username='{$userData['username']}' and password = '{$userData['password']}'";
        $result = mysqli_query($conn, $sql);
        $userData = mysqli_fetch_assoc($result);
        //print_r($userData);exit;
        if($userData > 0){
            return $userData;
        }
        else {
            return 0;
        }
    }
    
    function getByUsername($userData){
        $conn=getConnection(); 
        $sql = "select * from users where username='{$userData['username']}'";
        $result = mysqli_query($conn, $sql);
        $userData = mysqli_fetch_assoc($result);
        if($userData > 0){
            return $userData;
        }
        else {
            return false;
        }
    }
    function validatePassword($userData){
        $conn=getConnection();
        //print_r($userData);exit; 
        $sql = "UPDATE users SET password='{$userData['password']}' WHERE username='{$userData['username']}'";
        $result = mysqli_query($conn, $sql);
        //print_r($result);exit;
        if($userData > 0){
            return  true;
        }
        else {
            return false;
        }
    }

    function updateProfile($userData){
        $conn=getConnection();
        //print_r($userData);exit; 
        $sql = "update users SET 
                                name='{$userData['name']}', 
                                email='{$userData['email']}', 
                                gender='{$userData['gender']}', 
                                dob='{$userData['dob']}' 
                            WHERE username='{$userData['username']}'";
        $result = mysqli_query($conn, $sql);
        //print_r($result);exit;
        if($userData > 0){
            return  true;
        }
        else {
            return false;
        }
    }

    function insertUser($userData){
        //print_r($userData);exit;
        $conn = getConnection();
		$sql = "insert into users values(
                                '{$userData['username']}', 
                                '{$userData['name']}', 
                                '{$userData['email']}',
                                '{$userData['password']}', 
                                '{$userData['gender']}', 
                                '{$userData['dob']}'
                                )";
		$result = mysqli_query($conn, $sql);
		print_r($result);exit;
		if($result){
			return true; 
		}else{
			return false;
		}
        
    }
            
?>

 
<?php
    require_once('includes/header.php');
    require_once('../db/userServices.php');
    //$conn=getConnection();
    $username = $_SESSION["username"];
    $sucess=$error=$nameError=$emailError=$genderError=$dobError="";
    if(isset($_GET['message'])){
        if($_GET['message'] == 'sucess'){
			$sucess='Profile Updated.';
		}
        else if($_GET['message'] == 'all_empty'){
            $nameError="Name Empty!";
            $emailError="Email Empty!";
            $genderError="Gender Empty!";
            $dobError="Date of Birth Empty!";
        }
        else if($_GET['message'] == 'empty_name'){
			$nameError='Name empty!';
		}
		else if($_GET['message'] == 'empty_email'){
			$emailError='Email empty!';
		}
		else if($_GET['message'] == 'empty_gender'){
			$genderError='Gender empty!';
		}
		else if($_GET['message'] == 'empty_dob'){
			$dobError='Date of Birth empty!';
		}
		else if($_GET['message'] == 'error'){
			$error='Something went wrong!';
		}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <table border='1' cellpadding="10" align="center" height="600px" width="60%" style="border-collapse: collapse">
    <tr height="15px">
        <td align="left" ><img src="../img/logo.png" width="15%"></td>
        <td align="right">Logged in as <a href="profile.php"><?=$_SESSION['name'];?></a> | <a href="../controller/logout.php">Logout</a></td>
    </tr>
    <tr align="center" height="500px">
        <td width="20%">Account Details<hr>
            <?php include_once('includes/sidebar.php');?>
        </td>
        <td  align="center"width="60%">
        <form action="../controller/editProfileValidation.php" method="POST">
        <?php
            
            $userData = ["username" => $_SESSION['username']];
            $data = getByUsername($userData);
            //print_r($data);exit; 
            
        ?>
                    <fieldset>
                        <legend>EDIT PROFILE</legend>
                        <table align="center" height="100px">
                        <tr>
                            <td>Name</td>
                            <td>: <input type="text" name="name" value="<?=$data["name"]?>"> <span style="color:red"><?=$nameError?></span></td>
                        </tr>
                        <tr><td colspan="2"><hr></td></tr>
                        <tr>
                            <td>Email</td>
                            <td>: <input type="mail" name="email" value="<?=$data["email"]?>"> <span style="color:red"><?=$emailError?></span></td>
                        </tr>
                        <tr><td colspan="2"><hr></td></tr>
                        <tr>
                            <td>Gender</td>
                            <td>: <input type="radio" name="gender" value="male">Male
                            <input type="radio" name="gender" value="female">Female
                            <input type="radio" name="gender" value="other">Other  <span style="color:red"><?=$genderError?></span></td>
                        </tr>
                        <tr><td colspan="2"><hr></td></tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td>: <input type="date" name="dob" value="<?=$data["dob"]?>">  <span style="color:red"><?=$dobError?></span></td>
                        </tr>
                        <tr><td colspan="2"><hr></td></tr>
                        <tr>
                            <td><input type="submit" name="submit"> <span style="color:green"><?=$sucess;?></span><span style="color:red"><?=$error;?></span></td>
                        </tr>
                        </table>
                    </fieldset>
                </form>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center" height="55px">
            <?php include_once('includes/footer.php');?>
        </td>
    </tr>
    </table>
</body>
</html>
<?php  
	$currentPassword = "password";
	$newPassword  = $renewPassword ="";

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['submit'])){

			$npass= $_POST['newPassword'];
			$rpass= $_POST['renewPassword'];

			if($currentPassword != $_POST['currentPassword']){
				$errorMsg="old password not macted";
			}else{
				if($newPassword == $renewPassword){
					$errorMsg = "Password changed";
				}
				else{
					$errorMsg="confirm password not machted";
				}
			}
		}

		
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <form method="POST">
        <fieldset>
            <legend>Change Password</legend>
            <table>
                <tr>
                    <td>Current Password</td>
                    <td><input type="password" name="currentPassword"</td>
                </tr>
                <tr>
                    <td style="color: green;">New Password</td>
                    <td><input type="password" name="newPassword"</td>
                </tr><tr>
                    <td style="color: red;">Retype New Password</td>
                    <td><input type="password" name="renewPassword"</td> 
                </tr>
                
                <tr>
                    <td><input type="submit" name="submit"></td>
                </tr>

            </table>
        </fieldset>
    </form>
</body>
</html>
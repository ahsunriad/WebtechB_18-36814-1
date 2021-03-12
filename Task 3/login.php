<?php
$usernameError=$passwordError="";
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if($username == ""){
        $usernameError = "Empty Username!";
    }
    else{
        if(!preg_match("/^[a-zA-Z-' .{8,}$]*$/", $username)){
            $usernameError = "Only letter allowed";
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
    <title>Login</title>
</head>
<body>
    <form method="POST">
        <fieldset>
            <legend>Login</legend>
            <table>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username">
                        <span style="color:red"> <?php echo $usernameError; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password">
                        <span style="color:red"> <?php echo $passwordError; ?></span>
                    </td>
                    
                </tr>
                <tr>
                    <td><input type="checkbox" name="rememberMe"></td>
                    <td>Remember Me</td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Login"</td>
                    <td><a href="forgot password.php">Forgot Password?</a></td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>
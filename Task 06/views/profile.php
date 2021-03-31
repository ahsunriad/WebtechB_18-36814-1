<?php
    require_once('includes/header.php');
    require_once('../db/db.php');
    $conn=getConnection();
    $username = $_SESSION["username"];
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <table border='1' cellpadding="10" align="center" height="600px" width="60%" style="border-collapse: collapse">
    <tr height="15px">
        <td align="left" ><img src="../img/logo.png" width="15%"></td>
        <td align="right">Logged in as <a href="login.php"><?=$_SESSION['name'];?></a> | <a href="../controller/logout.php">Logout</a></td>
    </tr>
    <tr align="center" height="500px">
        <td width="20%">Account Details<hr>
            <?php include_once('includes/sidebar.php');?>
        </td>
        <td  align="center"width="60%">
        <?php
            $sql = "select * from users where username='$username'";
            $result = mysqli_query($conn, $sql);
            $userData = mysqli_fetch_assoc($result);
        ?>
                    <fieldset>
                        <legend>PROFILE</legend>
                        <table align="center" height="100px" >
                            <tr>
                                <td>
                                    <table align="left" >
                                        <tr>
                                        <td>Name</td>
                                        <td>: <?=$userData['name'];?></td>
                                        </tr>
                                        <tr><td colspan="2"><hr></td></tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>: <?=$userData['email'];?></td>
                                        </tr>
                                        <tr><td colspan="2"><hr></td></tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>: <?=$userData['gender'];?></td>
                                        </tr>
                                        <tr><td colspan="2"><hr></td></tr>
                                        <tr>
                                            <td>Date of Birth</td>
                                            <td>: <?=$userData['dob'];?></td>
                                        </tr>
                                        <tr><td colspan="2"><hr></td></tr>
                                        <tr>
                                            <td><a href="editProfile.php">Edit Profile</a></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table align = "right">
                                        <tr>
                                            <td><img src="../img/u1.png" alt="user"></td>
                                        </tr>
                                        <tr>
                                            <td align="center"><a href="changeProfilePicture.php">Change</a></td>
                                        </tr>
                                    </table>
                                </td>
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
<?php
    $message = '';  
    $error = '';  
    if(isset($_POST["submit"]))  
    {    
              if(file_exists('data.json'))  
              {  
                   $current_data = file_get_contents('data.json');  
                   $array_data = json_decode($current_data, true);  
                   $extra = array(  
                        'name' => $_POST['name'],  
                        'email' => $_POST['email'],  
                        'userName' => $_POST['userName'],
                        'password' => $_POST['password'],
                        'newPassword' => $_POST['newPassword'],
                        'gender' => $_POST['gender'],
                        'dob' => $_POST['dob']
                   );
                  
                   $array_data[] = $extra;  
                   $final_data = json_encode($array_data);
                   if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label class='text-success'><h3>Registration Successfull</h3>";  
                }
                }   
            else  
              {  
                   $error = 'JSON File not exits';  
              }  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form method="POST">
    <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?> 
        <fieldset>
            <legend>REGISTRATION</legend>
            <table cellpadding="2">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>User Name</td>
                <td><input type="text" name="userName"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="newPassword"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female">Female
                    <input type="radio" name="gender" value="other">Other
                </td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><input type="date" name="dob"></td>
            </tr> 
              
            <tr>
                
                <td><input type="submit" name="submit"></td>
                <td><input type="reset" name="reset"</td>
            </tr>
            </table>
        </fieldset>
    </form>
    <?php  
        if(isset($message)){  
            echo $message;  
        }  
    ?>
</body>
</html>
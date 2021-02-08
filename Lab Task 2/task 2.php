<!DOCTYPE HTML>  
<html>
<head>
<title>Form Validation</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $bloodGroupErr = $degreeErr = "";
$name = $email = $gender = $bloodGroup = $degree = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    //if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        if (!preg_match($regex, $email)) {
          $emailErr = "Invalid email format";
        } 
  }
    


  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["bloodGroup"])) {
    $bloodGroupErr = "Blood Group is required";
  } else {
    $bloodGroup = test_input($_POST["bloodGroup"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Assessment Task</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <fieldset>
  <legend>Name</legend> <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  </fieldset>
  
  <fieldset>
  <legend>E-mail</legend> <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  </fieldset>
  
  <fieldset>
  <legend>Gender</legend>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  </fieldset>
  
  <fieldset>
  <legend>DEGREE</legend>
    <input type="checkbox" name="SSC" value="SSC" />SSC
    <input type="checkbox" name="HSC"  value="HSC" />HSC
    <input type="checkbox" name="BSc" value="BSc" />BSc
    <input type="checkbox" name="MSc" value="MSc" />MSc
    <span class="error">* <?php echo $genderErr;?></span>

  </fieldset>
  
  <fieldset>
  <legend>BLOOD GROUP</legend>
  <select name="bloodGroup">
    <option></option>
    <option>A+ ve</option>
    <option>A- ve</option>
    <option>AB+ ve</option>
    <option>B+ ve</option>
    <option>B- ve</option>
    <option>O+ ve</option>
    <option>O- ve</option>
  </select>
  </fieldset>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Given Input:</h2>";
echo $name."<br>";
echo $email."<br>";
echo $gender."<br>";
echo $bloodGroup."<br>";
echo $degree."<br>";

?>
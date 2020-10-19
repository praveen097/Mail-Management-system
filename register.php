<?php
$error=NULL;
if(isset($_POST['submit'])){
$psd1=$_POST['psd1'];
$psd2=$_POST['psd2'];
if($psd2!=$psd1){
$error="Paswords do not match!";
}else{
$link = mysqli_connect("localhost", "myuser", "", "cse");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$first_name = mysqli_real_escape_string($link, $_POST['fname']);
$last_name = mysqli_real_escape_string($link, $_POST['lname']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$pass = mysqli_real_escape_string($link, $_POST['psd1']);
$pass=md5($pass);
$gen=$_POST['gender'];

$birth = mysqli_real_escape_string($link, $_POST['dob']);


$sql = "INSERT INTO TEST(FIRST_NAME, LAST_NAME, EMAIL, PASSWORD, GENDER, DATE_OF_BIRTH) VALUES ('$first_name', '$last_name', '$email', '$pass', '$gen', '$birth')";
if(mysqli_query($link, $sql)){
    header('location:login.php');
session_destroy();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
}
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-img {
  background-image: url("1.png");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height:100%;
}

.container {
  position: absolute;
  left: 500px;
  margin: 20px;
  border-radius: 25px;
  border-style: solid;
  border-color:black ;
  max-width: 450px;
  padding: 16px;
 background-color: white;
}

input[type=text], input[type=password],input[type=email] {
  width: 100%;
  padding: 13px;
  margin: 5px 0 22px 0;
  border: 1px;
  border-style:solid;
  border-color:green;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus,input[type=email]:focus {
  background-color: #ddd;
  outline: none;
}
.btn {
  background-color: blue;
  color: white;
  padding: 16px 20px;
  border: none;
  margin: 10px;
  cursor: pointer;
  width: 45%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 10;
}
.btn2 {
  background-color: red;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  margin:10px;
  width: 40%;
  opacity: 0.9;
}

.btn2:hover {
  opacity: 1;
}
</style>
</head>
<body>

<div class="bg-img">
  <form action="" method="post" class="container">
    <h1>Register here</h1>
    <input type="text" name="fname" placeholder="First Name" required>
    <input type="text" name="lname" placeholder="Last Name" required><br>
    <input type="email" placeholder="Enter Email" name="email" required>
    <input type="password" name="psd1" placeholder="Password"
    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    <input type="password" name="psd2" placeholder="Confirm Password" required>
    Select Gender: <input type="radio" name="gender" value="female" required>Female
    <input type="radio" name="gender" value="male" required>Male
    <input type="radio" name="gender" value="others" required>Others<br><br>
    Date of Birth:   <input type="date"  name="dob" ><br><br>
    <marquee><p style="color:red">Your passwords are now encrypted and even we can't access them</p></marquee>
    <button type="reset" class="btn2">Reset</button>
    <button type="submit" class="btn" name="submit" >Register</button>
    <center><br><br> Already member?  <a href="login.php">Login here</a></center>
    <center><p style="color:red"> <?php if(isset($_POST['submit']))
    { echo $error; } ?></p></center>
</form>
</div><center>
</body>
</html>



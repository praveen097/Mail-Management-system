<?php
session_start();
$error=NULL;
if(isset($_POST['submit'])){
$mysqli=new mysqli('localhost','myuser','','cse');
$email=$mysqli->real_escape_string($_POST['email']);
$pass=$mysqli->real_escape_string($_POST['psw']);
$pass=md5($pass);
$check=$mysqli->query("SELECT * FROM TEST WHERE EMAIL='$email' LIMIT 1");
if($check->num_rows !=0){
$resultSet = $mysqli->query("SELECT * FROM TEST WHERE EMAIL='$email' AND PASSWORD='$pass' LIMIT 1");
if($resultSet->num_rows !=0){
$_SESSION["email"]=$email;
header('location:home.php');

}else{
$error="Entered password is incorrect";
}
}else{
header('location:register.php');
session_destroy();
}
}
?>

<!DOCTYPE html>
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

  min-height: 380px;
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.container {
  position: absolute;
  left: 500px;
  top:50px;
  margin: 20px;
  border-radius: 25px;
  border-style:solid;
  border-color:black;
  max-width: 450px;
  padding: 16px;
  background-color: white;
}
input[type=email], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: 1px;
  border-style:solid;
  border-color:green;
  background: #f1f1f1;
}

input[type=email]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

.btn {
  background-color: blue;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 5;
}
</style>
</head>
<body>

<div class="bg-img">
  <form action="" method="post" class="container">
    <h1>Login</h1>

    <input type="email" placeholder="Enter Email" name="email" required>

    <input type="password" placeholder="Enter Password" name="psw" required>
    <marquee><p style="color:red">Your passwords are now encrypted and even we can't access them</p></marquee>
    <button type="submit" name="submit" class="btn">Login</button>
    <center><br><br> Not member?  <a href="register.php">Register here</a></center>
    <center><p style="color:red"> <?php if(isset($_POST['submit'])){ echo $error; } ?></p></center>
</form>
</div>
</body>
</html>

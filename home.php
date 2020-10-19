<form method="POST">
<button type="submit class="btn" name="submit2">Logout</button></form>
<?php if(isset($_POST['submit2'])){
$error=NULL;
header("Location:login.php");
session_destroy();
}?>
<br><br><h1 style="color:blue"><center>
<?php
error_reporting(0);
session_start();
$mysqli=new mysqli('localhost','myuser','','cse');
$email=$_SESSION["email"];
$first=$mysqli->query("select FIRST_NAME,LAST_NAME from TEST where EMAIL='$email'");
while($row = $first->fetch_assoc()){
        echo "Welcome ". $row['FIRST_NAME'] ." ".$row['LAST_NAME']. "!"."<br>";
if(isset($_POST['submit'])){
$to=$_POST['to'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$header=$email;

mail("$to","$subject","$message","header");
if(mail){
?><script>alert("Mail has been sent Successfully")</script><?php
}else{
?><script> alert("An error occured, please try again!");</script><?php
}
}
}
echo $error;
?></h1>
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
input[type=text], textarea,input[type=email] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: 1px;
  border-style:solid;
  border-color:green;
  background: #f1f1f1;
}

input[type=text]:focus, textarea:focus,input[type=email]:focus {
  background-color: #ddd;
  outline: none;
}
.btn {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius:50%;
}
.btn:hover {
  opacity: 10;
}
</style>
</head>
<body>

  <form action="" method="post" >
    <h1>Send your mail here!</h1>
    <input type="email" name="to" placeholder="TO" required>
    <input type="text" name="subject" placeholder="Subject" required><br>
    <input type="text" id="country"  value=<?php  echo " $email"; ?> readonly>
    <textarea  name="message" rows=10 placeholder="Enter your message here" required></textarea>
   <center> <button type="submit" class="btn" name="submit" >SEND</button></center>
   </form>
</body>
</html>

<h6 style="color:red">This will originally send mails only if SMTP is enabled with latest version of PHP installed on your computer</h6>


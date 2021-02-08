<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'fruitfresh';

$conn = new mysqli($server,$user,$pass,$db) or die('Could not connect');
if(isset($_POST['register'])){
	$username = ($_POST['username']);
    $email = ($_POST['email']);
    $number = ($_POST['number']);
    $password = (password_hash($_POST['password'], PASSWORD_BCRYPT));
    $hash = ( md5( rand(0,1000) ) );
    $sql = "INSERT INTO userdet (Username, Email, Phone_Number, Password, Hash)
  VALUES('$username','$email','$number','$password','$hash')";
  if(mysqli_query($conn,$sql)){
  	echo 'Successfully registered';
  	
  }
  else{
  	echo 'Fail';
  }
}
if(isset($_POST['log'])){
  $email = ($_POST['email']);
   $password = (password_hash($_POST['password'], PASSWORD_BCRYPT));
    $hash = ( md5( rand(0,1000) ) );
    $sql = ("SELECT * FROM userdet WHERE Email = '$email' AND Password = '$password'") or die("Failed to query database");
    $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_assoc($result);
   if($row['Email']==$email && $row['Password']==$password){
    echo "Logged in";
   }else{
    echo "Fail";
   }
}
?>
<html>
<head>

</head>
<body>
<form method="POST" action="op.php">
<fieldset>
<h1>Register</h1>
Username:<input type="text" name="username" required/><br>
Email:<input type="text" name="email" required/><br>
Phone Number:<input type="text" name="number" required/><br>
Password:<input type="password" name="password" required/><br>
<input type="submit" name="register"/>
</fieldset>
</form>
<h1>Login</h1>
<form method="POST" action="op.php">
<fieldset>
Email:<input type="text" name="email" required/><br>
Password:<input type="password" name="password" required/>
<input type="submit" name="log"/>
</fieldset>
</form>
</body>
</html>
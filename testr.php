<?php 
require_once 'includes/init.php';
if(isset($_SESSION['UserID'])){
	$email = $_SESSION['UserID'];
	$user = mysqli_query($db,"SELECT * FROM 'users' WHERE 'Email'= '$email'");
	$userinfo = mysqli_fetch_array($user);
    $firstname = $userinfo['FirstName'];
	$lastname = $userinfo['LastName'];
	$email = $userinfo['Email'];
	$pnumber = $userinfo['PhoneNumber'];
	$street = $_POST['street1'];
	$description = $_POST['description'];
	$curr_timestamp = date('Y-m-d H:i:s');
  if(isset($_POST['submit'])){
	$query1 = $db->query("INSERT INTO customers(email,phone,address,created,modified,firstname,lastname,description) VALUE
	('$email','$pnumber','$street','2018-06-25 12:20:39','2018-06-25 12:20:39',$firstname','$lastname','$description')");
    echo 'Successfully inserted order details';
	header('Location: checkout.php');
	}else{
		echo 'Nothing inserted';
	}  
}
 ?>
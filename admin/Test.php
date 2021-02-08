<?php 
require_once '../includes/init.php';
  $email=$_POST['email'];
  $password=$_POST['password'];
   if(isset($_POST['submit'])){
    //check length of password - in registration
    if(strlen($password)<=7){
      echo "Your password should be atleast 8 characters.";
    }
else{
    //check if records exist
    $query = "SELECT * FROM Users WHERE Email = '$email'";
    $user = mysqli_query($db,$query);
    $usercount = mysqli_num_rows($user);
    if($usercount < 1){
      echo "The email doesn't exist in the database";
    }else{
		$data=mysqli_fetch_assoc($user);
		$Type=$data['UserType'];
		if($Type=="admin" || $Type=="agent"){
			$_SESSION['UserID']=$email;
			header("Location: ../index.php");
   }else{
	   $_SESSION['UserID']=$email;
	   header("Location: ../index.php");
   }
   }}}
  ?>

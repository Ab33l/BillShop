<?php 
require_once '../includes/init.php';
  $email=$_POST['email'];
  $password =$_POST['password'];
  $confirm = $_POST['confirm']; 
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $pnumber = $_POST['pnumber'];
   if(isset($_POST['submit'])){
      $emailquery = $db->query("SELECT * FROM Users WHERE Email = '$email'");
    $emailcount = mysqli_num_rows($emailquery);
 if($emailcount != 0){
    $error = 'The email already exists.Use another one';
}
$uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number = preg_match('@[1-9]@', $password);
if(!$uppercase || !$lowercase || !$number){
  $error = 'Your password should have a capital letter,text and a number';
}
 //check password length
    if(strlen($password) <= 8){
      $error = 'Your password needs to be atleast 8 characters';
    }
    //check password and confirm match
    if($password != $confirm){
      $error = 'Your passwords do not match';
    }
    //email validation
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $error = 'You must enter a valid email';
    }
    if(!empty($errors)){
      echo display_errors($errors);
    }else{
      //add user to db plus set session
      $hashed = password_hash($password,PASSWORD_DEFAULT);
      $query = $db->query("INSERT INTO Users (FirstName,LastName,Email,PhoneNumber,Password,UserType) VALUES ('$fname','$lname','$email','$pnumber','$hashed','user')");
      $_SESSION['success_pop'] = 'You have been added successfully';
      header('Location: login.php');
    }
}
  ?>

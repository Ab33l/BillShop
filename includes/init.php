<?php
$db = mysqli_connect('localhost','root','','billshop');
if(mysqli_connect_errno()){
 echo 'Database connection failed because of: '.mysqli_connect_error; 
 die(); 
}
session_start();
//require_once $_SERVER['DOCUMENT_ROOT'].'/project/config.php';
//require_once BASEURL.'helpers/helpers.php';

$cart_id = '';
//if(isset($_COOKIE[CART_COOKIE])){
 // $cart_id = sanitize($_COOKIE[CART_COOKIE]);
//}

if(isset($_SESSION['User'])){
	$user_id = $_SESSION['User'];
  $query = $db->query("SELECT * FROM Users WHERE Sessionid = '$user_id'");
  $user_data = mysqli_fetch_assoc($query);
}

if(isset($_SESSION['success_pop'])){
 echo '<div class="bg-success"><p class="text-center" style="color:white;">'.$_SESSION['success_pop'].'</p></div>';
 unset($_SESSION['success_pop']);
}
//let pop up message last for sometime -15sec
 if(isset($_SESSION['error_pop'])){
 echo '<div class="bg-danger"><p class="text-center" style="color:white;">'.$_SESSION['error_pop'].'</p></div>';
 unset($_SESSION['error_pop']);
}
?>
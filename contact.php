<?php
//require_once 'includes/init.php';
include 'Cart.php';
require_once 'includes/init.php';
if(empty($_SESSION['UserID'])){
  header('Location: /copy/admin/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fresh Farm Online Shopping</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <style>
    .container5{padding: 50px;background-image:url("fruit1.jpg");min-width: 100%;height:1000px; .topnav a:hover:before{visibility: visible;-webkit-transform:scaleX(1);transform: scaleX(1);}}
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
	.col-lg-3 {width: 27%;}
	.card{
    margin:4px -12px;
      -webkit-transition: all 200ms ease-in;
    -webkit-transform: scale(1); 
    -ms-transition: all 200ms ease-in;
    -ms-transform: scale(1); 
    -moz-transition: all 200ms ease-in;
    -moz-transform: scale(1);
    transition: all 200ms ease-in;
    transform: scale(1);   
}
.card:hover{
    box-shadow: 0px 0px 150px rgba(0,0,0,0.4);
    z-index: 2;
    -webkit-transition: all 200ms ease-in;
    -webkit-transform: scale(1.5);
    -ms-transition: all 200ms ease-in;
    -ms-transform: scale(1.5);   
    -moz-transition: all 200ms ease-in;
    -moz-transform: scale(1.5);
    transition: all 200ms ease-in;
    transform: scale(1.1);
}
.rowz{
  padding:17px 98px;
  margin-right:-56px;
  margin-left:-12px;
}
.action{
  transition: .5s ease;
  opacity:0;
  position:absolute;
  top: 62%;
  height:60px;
  min-width:100%;
  background-color:white;
  border-radius:25px;
}
.card:hover .action{
 opacity:0.8;
}
.rows{
  margin:58px 20px;
}
<!--.toplayer{
  height:45px;
}-->
.offers{
  height:45px;
  <!--width:25%;-->
  background-color:green;
  color:white;
  font-size:18px;
  padding:5px 70px;
  margin-left:-53px;
}
.offers a{
  color:white;
  font-size:20px;
  text-decoration:none;
  padding:0px 63px;
}
.contact{
  height:45px;
  <!--width:25%;-->
  background-color:red;
  color:white;
  font-size:18px;
  margin-left:270px;
  padding:6px 25px;
}
form{
	height:41px;
	<!--width:25%;-->
	font-size:18px;
	margin-left:120px;
}
input{
     margin-left:28px;
	 height:44px;
	 font-size:14px;
}
.contact a{
  color:white;
  font-size:20px;
  text-decoration:none;
  <!--padding:0px 63px;-->
}
    </style>
</head>
<body>
<div class="container" style="background-color:grey;width:100%;">
<div class="row">
  <div class="col-lg-6" style="background-color:green;">
  <div class="offers">
  <a href="countdown.php" style="text-align:center;">Today's Special Offers!</a>
  </div>
  </div>
  <div class="col-lg-6" style="background-color:red;">
  <div class="contact">
  <a href="contact.php" style="text-align:center;">Contact Us</a>
  </div>
  </div>
</div>
</div>
<div class="container5">
<!-- Top links -->
<?php include("toplinks.php") ?>
<!--End top links-->

	<div class="title text-center">
		<h1 style="font-size:3.8em;color:white;">Contact Us</h1>
	</div>
  <div style="font-size:20px;color:white;">
  <p>Phone Number: 0701020304</p>
  <p>Email: farmfresh@farmerz.ke</p>
</div>
</div>

</body>
</html>
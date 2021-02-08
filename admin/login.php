<?php  
require_once '../includes/init.php'; 
/*$password = 'messi';
$hashed = password_hash($password,PASSWORD_DEFAULT);
echo $hashed;*/
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" type="image/png" href="../billsblack.png"/>
    <title>Sign In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   
    <script href="index.js"></script>
    <style>
*,
*:before,
*:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
   h2{
  font-weight: 100;
  letter-spacing: 1px;
  margin: 10px 0 20px 10px;
    }
.container5{
  min-width:100%;
  height:240px;
}
.medcover{
  min-width:100%;
  height:170px;
}
.med{
    padding-top:0px;
  padding-left:0px;
  padding-right:0px;
  padding-bottom:0px;
}
.row{
  zoom:1;
}
.overall{
  padding-top:20px;
  padding-left:89px;
  padding-right:48px;
  padding-bottom:0px;
}
.col-md-6{
  padding:9px 122px;
  margin:0px 0px;
  box-sizing:border-box;
  height:177px;
}
/*us removal **/
footer{
  min-width:100%;
  height:200px;
}
.foot{
 height:100px;
}
.foot1{
 background-color:#f3f3f3;
 height:350px;
 margin-top:53px;
}
i {
  border: solid black;
  border-width: 0px 3px 3px 0;
  display: inline-block;
  padding: 21px;
}
.pfooter{
 padding:44px 148px;
}
.btn-group-lg > .btn, .btn-lg{
  border-radius:2.3rem;
}
footer a{
  color:black;
  text-align:center;
  font-size:1.1em;
}
#login-form{
  /*width:50%;
  height:60%;
  border:2px solid#000;
  border-radius:15px;
  box-shadow:7px 7px 15px rgba(0,0,0,0.6);
  margin:7% auto;
  padding:15px;
  background-color: transparent;*/
  width: 100%;
  margin: auto;
  padding: 10px;
  max-width: 400px;
  border-radius: 2px;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
  background-color: rgba(0, 0, 0, 0.2);
}
body{
    /*background-attachment:fixed;*/
  color: white;
  display: flex;
  padding: 20px;
  min-height: 100vh;
  position: relative;
  flex-direction: column;
  justify-content: center;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  background-color: #a06060;
  background: linear-gradient(130deg, #0B2035 20%, #aaa 100%) no-repeat center center fixed;
}
.form-group {
    font-size: 22px;
  padding: 5px 10px;
  padding-top: 30px;
  position: relative;
  border-radius: 2px;
  margin-bottom: 10px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  background-color: rgba(0, 0, 0, 0.1);
}
.form-group input{
   width: 100%;
  border: none;
  outline: none;
  display: block;
  font-weight: 300;
  letter-spacing: 1px;
  background-color: transparent;
}
.form-group label{
  left: 10px;
  opacity: 0.7;
  font-weight: 100;
  letter-spacing: 2px;
  pointer-events: none;
  transition: all 0.2s ease-in;
}
.form-group input:focus + label, .form-group input.active + label{
  top: 5px;
  left: 5px;
  font-size: 16px;
}
    </style>
  </head>
<body>
  <img src="../billsblack.png" alt="BillShop" style="padding-left: 40%;height:60%;width:60%;"/>
 <div id="login-form">
  <div>
    
  
  </div>
  <h2 style="text-align:center;">Welcome Back</h2><hr>
   <form action="Test.php" method="POST">
    <div class="form-group">
      <input type="email" name="email" id="email" onblur="checkInput(this)" required>
       <label for="email">Email:</label>
    </div>
     <div class="form-group">
      <input type="password" name="password" id="password" onblur="checkInput(this)" required>
      <label for="password">Password:</label>
    </div>
    <div class="form-group">
      <input type="submit" value="Login" name="submit" class="btn btn-primary">
    </div>
   </form>
   <p class="text-right">Not Registered  <a href="registration.php" style="color:white;">Sign Up!</a></p><!--could remove -->
 </div>
 <!-- <footer>
<div class="foot"><img src="/project/f1.jpg" alt="farm" style="padding-left:87px;"/></div>
<div class="foot1" style="color:black;">

<div class="container5">
<div class="overall">
<div class="row">
<div class="col-lg-4 col-md-6 col-sm-6">
<h2>Site Map</h2>
<hr>
<a href="#">Home</a><br>
<a href="#">Buy</a><br>
<a href="#">Learn More</a>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
<h2>About</h2>
<hr>
<a href="#">Terms and Conditions</a><br>
<a href="#">Privacy Policy</a><br>
<a href="#">Contact Us</a>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
<h2>Connect</h2>
<hr>
<div class="medcover">
<div class="med">
<div class="row">
<div class="col-lg-3 col-md-4 col-sm-6">
 <a href=#><img src="/project/instagram.png" alt="Instagram" style="height:67px;padding:4px 0px;"/></a>
</div>
<div class="col-lg-3 col-md-4 col-sm-6">
<a href=#><img src="/project/twitter.png" alt="Twitter" style="height:67px;padding:4px 20px;"/></a>
</div>
<div class="col-lg-3 col-md-4 col-sm-6">
<a href=#><img src="/project/pinterest.png" alt="Pinterest" style="height:67px;padding:4px 38px;" /></a>
</div>
<div class="col-lg-3 col-md-4 col-sm-6">
<a href=#><img src="/project/whatsApp.png" alt="Whatsapp" style="height:67px;padding:4px 58px;" /></a>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
<hr style="width:90%;opacity:1;">
 <h4 style="font-size:1em;text-align:center;">&copy 2017 Copyright FarmFresh</h4>
</div>
</footer>-->
<script>
  function checkInput(input) {
  if (input.value.length > 0) {
    input.className = 'active';
  } else {
    input.className = '';
  }
}
</script>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
  </html>
<?php  
require_once 'includes/init.php';

if(!is_logged_in()){
  header('Location: /project/admin/login.php');
}

$hashed = $user_data['Password'];
$old_password = ((isset($_POST['old_password']))?sanitize($_POST['old_password']):'');
$old_password = trim($old_password);
$password = ((isset($_POST['password']))?sanitize($_POST['password']):'');
$password = trim($password);
$confirm = ((isset($_POST['confirm']))?sanitize($_POST['confirm']):'');
$confirm = trim($confirm);
$new_hashed = password_hash($password, PASSWORD_DEFAULT);
$user_id = $user_data['Sessionid'];
$errors = array();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   
    <script href="index.js"></script>
    <style>
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
  width:50%;
  height:60%;
  border:2px solid#000;
  border-radius:15px;
  box-shadow:7px 7px 15px rgba(0,0,0,0.6);
  margin:7% auto;
  padding:15px;
  background-color:white;
}
    </style>
  </head>
<body>
 <div id="login-form">
  <div>
    
  <?php 
   if($_POST){
     //form validation
    if(empty($_POST['old_password']) || empty($_POST['password']) || empty($_POST['confirm'])){
      $_SESSION['error_pop'] = "You must fill out all fields";
    }

    //check length of password - in registration
    if(strlen($password)<=7){
      $_SESSION['error_pop'] = "Your password should be atleast 8 characters";
    }

    //if new password matches confirm
    if($password != $confirm){
      $_SESSION['error_pop'] = "The new password and confirm new password don't match";
    }

    if(!password_verify($old_password, $hashed)){
      $_SESSION['error_pop'] = "Your old password don't match those in the records";
    }

    //check errors 
    if(!empty($errors)){
     echo display_errors($errors);
    }else{
      //change password
      $db->query("UPDATE Users SET Password = '$new_hashed' WHERE Sessionid = '$user_id'");
      $_SESSION['success_pop'] = 'Your password has been updated';
      header('Location: index.php');
    }
   }
  ?>

  </div>
  <h2 style="text-align:center;">Change Password</h2><hr>
   <form action="change_password.php" method="POST">
    <div class="form-group">
      <label>Old Password:</label>
      <input type="password" name="old_password" id="old_password" class="form-control" value="<?php echo$old_password;?>">
    </div>
     <div class="form-group">
      <label>New Password:</label>
      <input type="password" name="password" id="password" class="form-control" value="<?php echo$password;?>">
    </div>
      <div class="form-group">
      <label>Confirm New Password:</label>
      <input type="password" name="confirm" id="confirm" class="form-control" value="<?php echo$confirm;?>">
    </div>
    <div class="form-group">
      <a href="admin.php" class="btn btn-default">Cancel</a>
      <input type="submit" value="Login" class="btn btn-primary">
    </div>
   </form>
   <p class="text-right"><a href="/project/index.html">Visit HomePage</a></p><!--could remove -->
 </div>

  <footer>
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
</footer>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
  </html>
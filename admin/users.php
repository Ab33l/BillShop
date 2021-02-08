<?php
require_once '../includes/init.php';
  if(empty($_SESSION['UserID'])){
    header('Location: login.php');
  }
  function update_date($date){
 return date("M d, Y h:i A",strtotime($date));
}
  if(isset($_GET['delete'])){
   $delete_id = sanitize($_GET['delete']);
   $db->query("DELETE FROM Users WHERE Sessionid = '$delete_id'");
   $_SESSION['success_pop'] = 'The User has been deleted!';
   header('Location: users.php');
  }
  $fname = ((isset($_POST['fname']))?sanitize($_POST['fname']):'');
  $lname = ((isset($_POST['lname']))?sanitize($_POST['lname']):'');
  $email = ((isset($_POST['email']))?sanitize($_POST['email']):'');
  $pnumber = ((isset($_POST['pnumber']))?sanitize($_POST['pnumber']):'');
  $password = ((isset($_POST['password']))?sanitize($_POST['password']):'');
  $confirm = ((isset($_POST['confirm']))?sanitize($_POST['confirm']):'');
  $permissions = ((isset($_POST['permissions']))?sanitize($_POST['permissions']):'');
  $errors = array();
  if($_POST){
    //existence of email
    $emailquery = $db->query("SELECT * FROM Users WHERE Email = '$email'");
    $emailcount = mysqli_num_rows($emailquery);
    if($emailcount != 0){
      $errors[] = 'The email already exists.Use another one';
    }

    $required = array('fname', 'lname', 'email', 'pnumber', 'password', 'confirm', 'permissions');
    foreach($required as $f){
     if(empty($_POST[$f])){
       $errors[] = 'You must fill out all fields';
       break;
     }
    }
    //check password length
    if(strlen($password) <= 7){
      $errors[] = 'Your password needs to be atleast 8 characters';
    }
    //check password and confirm match
    if($password != $confirm){
      $errors[] = 'Your passwords do not match';
    }
    //email validation
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $errors[] = 'You must enter a valid email';
    }

    if(!empty($errors)){
      echo display_errors($errors);
    }else{
      //add user to db plus set session
      $hashed = password_hash($password,PASSWORD_DEFAULT);
      $db->query("INSERT INTO Users (FirstName,LastName,Email,PhoneNumber,Password,UserType) VALUES ('$fname','$lname','$email','$pnumber','$hashed','$permissions')");
      $_SESSION['success_pop'] = 'User has been added successfully';
      header('Location: users.php');
    }
  }
  ?>
  <?php if(isset($_GET['add'])): ?>
   <h2 class="text-center">Add A New User</h2><hr>
   <form action="users.php?add=1" method="POST">
     <div class="form-group col-lg-6">
       <label>First Name:</label>
       <input type="text" id="fname" name="fname" class="form-control" value="<?php echo$fname;?>">
     </div>
      <div class="form-group col-lg-6">
       <label>Last Name:</label>
       <input type="text" id="lname" name="lname" class="form-control" value="<?php echo$lname;?>">
     </div>
      <div class="form-group col-lg-6">
       <label>Email:</label>
       <input type="email" id="email" name="email" class="form-control" value="<?php echo$email;?>">
     </div>
      <div class="form-group col-lg-6">
       <label>Phone Number:</label>
       <input type="tel" id="pnumber" name="pnumber" class="form-control" value="<?php echo$pnumber;?>">
     </div>
      <div class="form-group col-lg-6">
       <label>Password:</label>
       <input type="password" id="password" name="password" class="form-control" value="<?php echo$password;?>">
     </div>
      <div class="form-group col-lg-6">
       <label>Confirm Password:</label>
       <input type="password" id="confirm" name="confirm" class="form-control" value="<?php echo$confirm;?>">
     </div>
      <div class="form-group col-lg-6">
       <label>Permission:</label>
       <select class="form-control" name="permissions">
         <option value=""<?php echo(($permissions == '')?' selected':'');?>></option>
         <option value="admin"<?php echo(($permissions == 'admin')?' selected':'');?>>Admin</option> 
         <option value="agent"<?php echo(($permissions == 'agent')?' selected':'');?>>Agent</option> 
         <option value="customer"<?php echo(($permissions == 'customer')?' selected':'');?>>Customer</option>  
       </select>
     </div>
     <div class="form-group col-lg-6" style="float:right;">
       <a href="users.php" class="btn btn-default">Cancel</a>
       <input type="submit" value="Add User" class="btn btn-primary">
     </div>
   </form>
  <?php endif;?>
<?php
  $userquery = $db->query("SELECT * FROM Users ORDER BY FirstName");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script href="index.js"></script>
    <style>
.start{
  background-image:url("/copy/fruit1.jpg");
    min-width: 100%;
    height:700px; 
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    font-family: 'Handlee', cursive;
}
.topnav{
  padding-top:20px;
  padding-left: 593px;
  padding-right:0px;
  display:inline-block;
  text-decoration: underline;
}
.topnav a{
  color:white;
  margin:0px 20px;
  font-size:1.0em;
  text-decoration: none;
    display:inline-block;
    position:relative;
}
.topnav a:hover{
  color:white;
}
.topnav a:before{
  content: "";
  position: absolute;
  width: 100%;
  height: 2px;
  bottom: 0;
  left: 0;
  background-color: white;
  visibility: hidden;
  -webkit-transform: scaleX(0);
  transform: scaleX(0);
  -webkit-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
}
.topnav a:hover:before{
  visibility: visible;
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
}
.title{
  padding:173px 457px;
  min-width:46%;
  height:50px;
  text-align:center;  
}
.title1{
  padding:0px 400px;
  color:white;
  text-align:center;
}
.buttons{
  padding:16px 466px;
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
    </style>
  </head>
<body>
  <div class="start">
  <div class="topnav">	
<a href="admin.php">Home</a>
<a href="../index.php">Site</a>
<!--table in shop with supermarket,category, brand -->
<a href="categories.php">Categories</a>
<a href="products.php">Products</a>
<a href="users.php">Users</a>
<a href="archived.php">Archived</a>

<a href="vieworders.php">View Orders</a>
<ul>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello <?php echo $_SESSION['UserID']; ?> !
  <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="change_password.php" style="color:black;">Change Password</a></li>
    <li><a href="logout.php" style="color:black;">Log Out</a></li>
  </ul>
</li>
</ul>
</div>
<div class="title text-center">
<h1 style="font-size:3.8em;color:white;">Users</h1>
</div>
<div class="title1 text-center">
<h2>Reliable. Affordable. Available.</h2>
</div>
  </div>

<h2>Users</h2>
<a href="users.php?add=1" class="btn btn-success" style="float:right;">Add New Users</a>
<hr>
<table class="table table-bordered table-striped table-condensed">
  <thead><th></th><th>FirstName</th><th>LastName</th><th>Email</th><th>Phone Number</th><th>Last Login</th><th>Permission</th></thead>
  <tbody>
    <?php while($user = mysqli_fetch_assoc($userquery)):?>
    <tr>
      <td>
      <?php if($user['Email'] != $_SESSION['UserID']):?>
       <a href="users.php?delete=<?php echo$user['Sessionid'];?>" class="btn btn-default btn-xs">Disable</a>
      <?php endif;?>
      </td>
      <td><?php echo $user['FirstName'];?></td>
      <td><?php echo $user['LastName'];?></td>
      <td><?php echo $user['Email'];?></td>
      <td><?php echo $user['PhoneNumber'];?></td>
      <td><?php echo (($user['Timestamp'] == NULL)?'Never logged in':update_date($user['Timestamp']));?></td>
      <td><?php echo $user['UserType'];?></td>
    </tr>
  <?php endwhile;?>
  </tbody>
</table>

  <footer>
<div class="foot"><img src="/copy/f1.jpg" alt="farm" style="padding-left:87px;"/></div>
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
 <a href=#><img src="/copy/instagram.png" alt="Instagram" style="height:67px;padding:4px 0px;"/></a>
</div>
<div class="col-lg-3 col-md-4 col-sm-6">
<a href=#><img src="/copy/twitter.png" alt="Twitter" style="height:67px;padding:4px 20px;"/></a>
</div>
<div class="col-lg-3 col-md-4 col-sm-6">
<a href=#><img src="/copy/pinterest.png" alt="Pinterest" style="height:67px;padding:4px 38px;" /></a>
</div>
<div class="col-lg-3 col-md-4 col-sm-6">
<a href=#><img src="/copy/whatsApp.png" alt="Whatsapp" style="height:67px;padding:4px 58px;" /></a>
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
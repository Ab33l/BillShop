<?php
require_once '../includes/init.php';
  if(empty($_SESSION['UserID'])){
    header('Location: login.php');
  }
$sql = "SELECT * FROM Category WHERE Parent = 0";
$result = $db->query($sql);
$category = '';
$post_parent = '';
//edit category
if(isset($_GET['edit']) && !empty($_GET['edit'])){
  $edit_id = (int)$_GET['edit'];
  $edit_id = ('$edit_id');
  $edit_sql = "SELECT * FROM Category WHERE Categoryid = '$edit_id'";
  $edit_result = $db->query($edit_sql);
  $edit_category = mysqli_fetch_assoc($edit_result);
}

//delete category
if(isset($_GET['delete']) && !empty($_GET['delete'])){
  $delete_id = (int)$_GET['delete'];
  $delete_id = ($delete_id);
  $sql = "SELECT * FROM Category WHERE Categoryid = '$delete_id'";
  $result = $db->query($sql);
  $category = mysqli_fetch_assoc($result);
  if($category['Parent'] ==0){
    $sql = "DELETE FROM Category WHERE Parent = '$delete_id'";
    $db->query($sql);
  }
  $dsql = "DELETE FROM Category WHERE Categoryid = '$delete_id'";
  $db->query($dsql);
  $_SESSION['success_pop'] = 'The Category has been deleted!';
  header('Location:categories.php');
}

//form category
if(isset($_POST) && !empty($_POST)){
 $post_parent = ($_POST['parent']);
 $category = ($_POST['category']);
 $sqlform = "SELECT * FROM Category WHERE Name= '$category' AND Parent = '$post_parent'";
 if(isset($_GET['edit'])){
  $id = $edit_category['Categoryid'];
  $sqlform = "SELECT * FROM Category WHERE Name = '$category' AND Parent = '$post_parent' AND Categoryid != '$id'";
 }

 $fresult = $db->query($sqlform);
 $count = mysqli_num_rows($fresult);
 //if category is empty
 if($category == ''){
  $_SESSION['success_pop'] = 'The Category cannot be left blank!';
 }
  //if exists in db
  if($count > 0){
    $_SESSION['error_pop'] = $category.' already exists. Please enter another.'; 
   }else{
    //update db
    $updatesql = "INSERT INTO Category (Name, Parent) VALUES ('$category','$post_parent')";
    if(isset($_GET['edit'])){
      $updatesql = "UPDATE Category SET Name = '$category', Parent = '$post_parent' WHERE Categoryid = '$edit_id'";
    }
    $db->query($updatesql);
    $_SESSION['success_pop'] = 'The Category has been added successfully!';
    header('Location:categories.php');
  }

}

$category_value = '';
$parent_value = 0;
if(isset($_GET['edit'])){
$category_value = $edit_category['Name'];
$parent_value = $edit_category['Parent'];
}else{
 if(isset($_POST)){
   $category_value = $category;
   $parent_value = $post_parent;
 }
}
 ?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

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
<!--table in shop with supermarket,category, brand -->
<a href="../index.php">Site</a>
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
<h1 style="font-size:3.8em;color:white;">Categories</h1>
</div>
<div class="title1 text-center">
<h2>Reliable. Affordable. Available.</h2>
</div>
  </div>
<div class="row" style="height:900px;margin-bottom: 360px">
  <!--Form -->
  <div class="col-md-6">
  <form class="" action="categories.php<?php echo((isset($_GET['edit']))?'?edit='.$edit_id:''); ?>" method="POST">
    <legend><?php echo((isset($_GET['edit']))?'Edit ':'Add '); ?> A Category</legend>
    <div id="errors"></div>
  <div class="form-group">
    <label>Parent</label>
    <select name="parent" id="parent">
      <option value="0"<?php echo(($parent_value == 0)?' selected="selected"':''); ?>>Parent</option>
      <?php while($parent = mysqli_fetch_assoc($result)): ?>
        <option value="<?php echo($parent['Categoryid']); ?>"><?php echo(($parent_value == $parent['Categoryid'])?' selected:"selected"':''); ?><?php echo($parent['Name']); ?></option>
      <?php endwhile; ?>
    </select>
  </div>
   <div class="form-group">
    <label>Category</label>
    <input type="text" name="category" value="<?php echo $category_value; ?>"/>
   </div>
   <div class="form-group">
     <input type="submit" value="<?php echo ((isset($_GET['edit']))?'Edit ':'Add '); ?> Category" class="btn btn-success"/>
   </div>
  </form>  
  </div>

  <!--Category Table-->
  <div class="col-md-6">
    <table class="table table-bordered">
      <thead>
        <th>Categories</th><th>Parent</th><th></th>
      </thead>
      <tbody>
        <?php 
        $sql = "SELECT * FROM Category WHERE Parent = 0";
          $result = $db->query($sql);
        while($parent = mysqli_fetch_assoc($result)):
          $parent_id = (int)$parent['Categoryid']; 
          $sql2 = "SELECT * FROM Category WHERE Parent = '$parent_id'";
          $cresult = $db->query($sql2);
        ?>
        <tr class="bg-primary">
         <td><?php echo $parent['Name']; ?></td>
        <td>Parent</td>
          <td>
           <a href="categories.php?edit=<?php echo $parent['Categoryid']; ?>" style="color:white;">Edit</a>
           <a href="categories.php?delete=<?php echo $parent['Categoryid']; ?>" style="color:white;">Delete</a>
          </td>
        </tr>
        <?php while($child = mysqli_fetch_assoc($cresult)): ?>
           <tr class="bg-info">
         <td><?php echo $child['Name']; ?></td>
        <td><?php echo $parent['Name']; ?></td>
          <td>
           <a href="categories.php?edit=<?php echo $child['Categoryid']; ?>" style="color:white;">Edit</a>
           <a href="categories.php?delete=<?php echo $child['Categoryid']; ?>" style="color:white;">Delete</a>
          </td>
        </tr>
       <?php endwhile; ?>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
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
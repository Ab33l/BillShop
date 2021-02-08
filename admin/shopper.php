<?php
 require_once '../includes/init.php';
   if(!is_logged_in()){
    login_error_redirect();
  }
 $sql = "SELECT * FROM Brand ORDER BY Brand";
 $results = $db->query($sql);
 $errors = array();

 //insert records
if(isset($_GET['edit']) && !empty($_GET['edit'])){
 $edit_id = (int)$_GET['edit'];
 $edit_id = sanitize($edit_id);
 $sql2 = "SELECT * FROM Brand WHERE Brandid = '$edit_id'";
 $edit_result = $db->query($sql2);
 $eBrand = mysqli_fetch_assoc($edit_result);
}
 //delete records
if(isset($_GET['delete']) && !empty($_GET['delete'])){
 $delete_id = (int)$_GET['delete'];
 $delete_id = sanitize($delete_id);
 $sql = "DELETE FROM Brand WHERE Brandid ='$delete_id'";
 $db->query($sql);
 header('Location: shopper.php');
}

 if(isset($_POST['AddBrand'])){
  $brand = $_POST['brand'];/**Not displaying default message  */
  if(isset($_POST['brand']) == ''){
     $errors[] .= 'You need to enter a Brand!';
  }
  //checks presence of brand in database
  $sql = "SELECT * FROM Brand WHERE Brand = '$brand'";
  if(isset($_GET['edit'])){
    $sql = "SELECT * FROM Brand WHERE Brand = '$brand' AND Brandid != '$edit_id'";
  }
  $result = $db->query($sql);
  $count = mysqli_num_rows($result);
   if($count > 0){
    $errors[] = $brand.' exists in the system. Please enter another brand name';
  }
  if(!empty($errors)){
    echo display_errors($errors);
  }else{
    //Admin can proceed to add brand to db
    $sql = "INSERT INTO Brand (Brand) VALUES ('$brand')";//inserted successfully pop up
    if(isset($_GET['edit'])){
     $sql = "UPDATE Brand SET Brand = '$brand' WHERE Brandid ='$edit_id'";
    }
    $db->query($sql);
    header('Location: shopper.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   
    <script href="index.js"></script>
    <style>
.start{
  background-image:url("/project/fruit1.jpg");
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
<a href="index.html">HOME</a>
<!--table in shop with supermarket,category, brand -->
<a href="shopper.php">SHOP</a>
<a href="account.html">MY ACCOUNT</a>
</div>
<div class="title text-center">
<h1 style="font-size:3.8em;">FreshFarm</h1>
</div>
<div class="title1 text-center">
<h2>Reliable. Affordable. Available.</h2>
</div>
  </div>
  <h2 style="text-align:center;">Products Management</h2>
  <form class="form-inline" action="shopper.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:''); ?>" method="POST">
    <?php
    $brand_value = '';
    if(isset($_GET['edit'])){
     $brand_value = $eBrand['Brand'];
    }else{
      if(isset($_POST['brand'])){
        $brand_value = sanitize($_POST['brand']);
      }
    }
    ?>
  <label><?=((isset($_GET['edit']))?'Edit A':'Add A'); ?> a Brand:</label>
  <input type="text" name="brand" id="brand" value="<?=$brand_value; ?>"/>
  <?php
  if(isset($_GET['edit'])):?>
   <a href="shopper.php" class="btn btn-default">Cancel</a>
  <?php endif; ?>
    <input type="submit" value="<?=((isset($_GET['edit']))?'Edit A':'Add A'); ?> Brand" name="AddBrand"/><!--Customize brand button -->

  </form>
<table>
  <thead>
<tr>
<th>Brand</th>
<th>Supermarket</th>
</tr>
</thead>
<tbody>
  <?php while($brand = mysqli_fetch_assoc($results)): ?>
<tr>
<td><?php echo $brand['Brand']; ?></td>
<td><?php echo $brand['Supermarket']; ?></td>
<td><a href="shopper.php?delete=<?= $brand['Brandid']; ?>"><img src="" alt="Delete" name="delete" style="height:21px;width:21px;"/>Delete</a></td>
<td><a href="shopper.php?edit=<?= $brand['Brandid']; ?>"><img src="" alt="Add" name="edit" style="height:21px;width:21px;"/>Edit</a></td>
  </tr>
<?php endwhile; ?>
</tbody>
</table>
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
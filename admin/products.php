<?php
require_once '../includes/init.php';
  if(empty($_SESSION['UserID'])){
    header('Location: login.php');
  }
$dbpath = '';
//Delete Product
if(isset($_GET['delete'])){
  $id = sanitize($_GET['delete']);
  $db->query("UPDATE Products SET Deleted = 1 WHERE Productid = '$id'");
  ?>
  <script>
    swal("Good job!", "You clicked the button!", "success");
    </script>
  <?php
  $_SESSION['success_pop'] = 'Product successfully deleted'; 
  header('Location: products.php');
}

?>
<?php                                                     
$sql = "SELECT * FROM Products WHERE Deleted = 0";
$presults = $db->query($sql);
if(isset($_GET['featured'])){
 $id = (int)$_GET['productid'];
 $featured = (int)$_GET['featured'];
 $featuredsql = "UPDATE Products SET Featured = '$featured' WHERE Productid = '$id'";
 $db->query($featuredsql);
 $_SESSION['success_pop'] = 'Action on the product has been updated!';
 header('Location: products.php');
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
<h1 style="font-size:3.8em;color:white;">Products</h1>
</div>
<div class="title1 text-center">
<h2>Reliable. Affordable. Available.</h2>
</div>
  </div>
  <a href="products.php?add=1" class="btn btn-success" style="float:right;">Add Products</a><!--Margin of page-->
<table class="table table-bordered table-condensed table-striped">
<thead>
  <th></th>
  <th>Product</th>
  <th>Price</th>
  <th>Category</th>
  <th>Featured</th>
  <th>Sold</th>
</thead>
<tbody>
  <?php while($product = mysqli_fetch_assoc($presults)):
     $childID = $product['Category'];
     $catsql = "SELECT * FROM Category WHERE Categoryid = '$childID'";
     $result = $db->query($catsql);
     $child = mysqli_fetch_assoc($result);
     $parentID = $child['Parent'];
     $parentsql = "SELECT * FROM Category WHERE Categoryid = '$parentID'";
     $presult = $db->query($parentsql);
     $parent = mysqli_fetch_assoc($presult);
     $category = $parent['Name'].'~'.$child['Name'];
   ?>
   <tr>
     <td>
       <a href="products.php?edit=<?php echo $product['Productid'];?>">Edit</a>
       <a href="products.php?delete=<?php echo $product['Productid'];?>">Delete</a>
     </td>
     <td>
       <?php echo $product['Name']; ?>
     </td>
     <td>
       <?php echo 'Ksh '.($product['UnitPrice']); ?>
     </td>
     <td><?php echo $category; ?></td>
     <td>
       <a href="products.php?featured=<?php echo(($product['Featured']== 0)?'1':'0'); ?>&productid=<?php echo$product['Productid'];?>">
        <button><?php echo(($product['Featured']== 1)?'Minus':'Plus'); ?></button>
       </a> &nbsp <?php echo(($product['Featured']== 1)?'Featured Product':''); ?>
     </td>
     <td>0</td>
   </tr>
  <?php endwhile; ?>
</tbody>
</table>

<?php if(isset($_GET['add']) || isset($_GET['edit'])): ?>
<?php
$brandquery = $db->query("SELECT * FROM Brand ORDER BY Brand");
$parentquery = $db->query("SELECT * FROM Category WHERE Parent = 0 ORDER BY Name");
$name = ((isset($_POST['name']) && $_POST['name'] != '')?sanitize($_POST['name']):'');
 $brand = ((isset($_POST['brand']) && !empty($_POST['brand']))?sanitize($_POST['brand']):'');
 $parent = ((isset($_POST['parent']) && !empty($_POST['parent']))?sanitize($_POST['parent']):'');
  $category = ((isset($_POST['child']) && !empty($_POST['child']))?sanitize($_POST['child']):'');
  $price = ((isset($_POST['price']) && $_POST['price'] != '')?sanitize($_POST['price']):'');
  $description = ((isset($_POST['description']) && $_POST['description'] != '')?sanitize($_POST['description']):'');
  $sizes = ((isset($_POST['sizes']) && $_POST['sizes'] != '')?sanitize($_POST['sizes']):'');
  $sizes = rtrim($sizes,',');
  $saved_image = '';

if(isset($_GET['edit'])){
 $edit_id = (int)$_GET['edit'];
 $productResults = $db->query("SELECT * FROM Products WHERE Productid = '$edit_id'");
 $product = mysqli_fetch_assoc($productResults);
 
 if(isset($_GET['delete_image'])){
   $image_url = $_SERVER['DOCUMENT_ROOT'].$product['Image'];
   unlink($image_url);
   $db->query("UPDATE Product SET Image = '' WHERE Productid = '$edit_id'");
   header('Location: products.php?edit='.$edit_id);
 }

 $category = ((isset($_POST['child']) && $_POST['child'] != '')?sanitize($_POST['child']):$product['Category']);
 $name = ((isset($_POST['name']) && !empty($_POST['name']))?sanitize($_POST['name']):$product['Name']);
 //$brand = ((isset($_POST['brand']) && !empty($_POST['brand']))?sanitize($_POST['brand']):$product['Brand']);
 $parentQ = $db->query("SELECT * FROM Category WHERE Categoryid = '$category'");
 $parentResult = mysqli_fetch_assoc($parentQ);
  $parent = ((isset($_POST['parent']) && ($_POST['parent'] != ''))?sanitize($_POST['parent']):$parentResult['Parent']);
  $price = ((isset($_POST['price']) && !empty($_POST['price']))?sanitize($_POST['price']):$product['UnitPrice']);
   //$description = ((isset($_POST['description']))?sanitize($_POST['description']):$product['Description']);
   //$sizes = ((isset($_POST['sizes']) && !empty($_POST['sizes']))?sanitize($_POST['sizes']):$product['Size']);
   //$sizes = rtrim($sizes,',');
   $saved_image = (($product['Image'] != '')?$product['Image']:'');
   $dbpath = $saved_image;
}

   if(!empty($sizes)){
   $sizeString = sanitize($sizes);
   $sizeString = rtrim($sizeString,',');
   $sizesArray = explode(',',$sizeString);
   $sArray = array();
   $qArray = array();
   foreach($sizesArray as $ss){
    $s = explode(':',$ss);
    $sArray[] = $s[0];
    $qArray[] = $s[1];
   }
 }else{$sizesArray = array();}

if($_POST){
 $required = array('name','brand','parent','child','price','sizes');
 foreach($required as $field){
   if($_POST[$field] == ''){
      $errors = "You need to fill the fields with an asterik";
      echo($errors);
      break;
   }
 }
 if($_FILES['photo']['name'] != ''){
   $photo = $_FILES['photo'];
   $name = $photo['name'];
   $nameArray = explode('.',$name);
   $fileName = $nameArray[0];
   $fileExt = $nameArray[1];
   $mime = explode('/',$photo['type']);
   $mimeType = $mime[0];
   $mimeExt = $mime[1];
   $tmpLoc = $photo['tmp_name'];
   $fileSize = $photo['size'];
   $allowed = array('jpg','jpeg','png','gif');
   $uploadName = md5(microtime()).'.'.$fileExt;
   $uploadPath = BASEURL.'/copy/'.$uploadName;
   $dbpath = '/copy/'.$uploadName;
   if($mimeType != 'image'){
    $error = "You need to submit an image";
    echo($error);
   }
   if(!in_array($fileExt, $allowed)){
     $errors = "You image needs to have a file extension of png, jpeg, png or gif";
     echo($errors);
   }
   if($fileSize > 1500000){
     $errors = "The file must be under 15MB";
     echo($errors);
   }
 }
 else{
  //upload file and update database
  if(!empty($_FILES)){
  move_uploaded_file($tmpLoc,$uploadPath);
}
  $insertsql = "INSERT INTO Products ('Name','UnitPrice','Description','Category','Image','Size','Brand') VALUES ('$name','$price','$description','$category','$dbpath','$sizes','$brand')";
    if(isset($_GET['edit'])){
      $insertsql = "UPDATE Products SET Name = '$name', UnitPrice = '$price', Description = '$description', Category = '$category', Image = '$dbpath', Size = '$sizes', Brand = '$brand' WHERE Productid = '$edit_id'";
    }
    $db->query($insertsql);
    header('Location: products.php');
 }
}
?>

<!--enclose in div -->

<h3 style="text-align:center;"><?php echo((isset($_GET['edit']))?'Edit':'Add A New'); ?> Product</h3>
<form action="products.php?<?php echo((isset($_GET['edit']))?'edit='.$edit_id:'add=1'); ?>" method="POST" enctype="multipart/form-data">
  <div class="form-group col-lg-6 col-md-6">
    <label>Name*:</label required>
    <input type="text" name="name" value="<?php echo $name;?>">
  </div>
  <!--<div class="form-group col-lg-6 col-md-6">
    <label>Brand*:</label required>
    <select name="brand">
      <option value=""<?php echo (($brand == '')?' selected':''); ?>></option>
      <?php while($b = mysqli_fetch_assoc($brandquery)): ?>
<option value="<?php echo $b['Brandid']; ?>"<?php echo (($brand == $b['Brandid'])?' selected':''); ?>><?php echo $b['Brand'];?></option>
      <?php endwhile; ?>
    </select>
  </div>-->
  <div class="form-group col-lg-6 col-md-6">
    <label>Parent Category*:</label>
      <select name="parent" id="parent">
        <option value=""<?php echo(($parent == '')?' selected':''); ?>></option>
        <?php while($p = mysqli_fetch_assoc($parentquery)): ?>
          <option value="<?php echo $p['Categoryid']; ?>"<?php echo (($parent == $p['Categoryid'])?' selected':''); ?>><?php echo $p['Name']; ?></option>
        <?php endwhile; ?>
      </select>
  </div>
  <div class="form-group col-lg-6 col-md-6">
    <label>Child Category*:</label>
    <select name="child" id="child">
    </select>
  </div>
  <div class="form-group col-lg-6 col-md-6">
    <label>UnitPrice*:</label>
    <input type="text" id="price" name="price" value="<?php echo $price; ?>">
  </div>
  <!--<div class="form-group col-lg-6 col-md-6">
    <label>Quantity and Sizes</label>
    <button class="btn btn-default form-control" onclick="jQuery('#sizesModal').modal('toggle');return false;">Quantity and Size</button>
  <div class="modal fade" id="sizesModal" tabindex="-1" role="dialog" aria-labelledby="sizesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sizesModalLabel">Quantity and Size</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
        <?php for($i=1;$i<=12;$i++): ?>
        <div class="form-control col-md-6 col-lg-6">
          <label for="size<?php echo $i;?>">Size</label>
          <input type="text" name="size<?php echo $i;?>" id="size<?php echo$i;?>" value="<?php echo((!empty($sArray[$i-1]))?$sArray[$i-1]:''); ?>" class="form-control">
        </div>
         <div class="form-control col-md-6 col-lg-6">
          <label for="qty<?php echo $i;?>">Quantity</label>
          <input type="number" name="qty<?php echo $i;?>" id="qty<?php echo$i;?>" value="<?php echo((!empty($qArray[$i-1]))?$qArray[$i-1]:''); ?>" min="0" class="form-control">
        </div>
        <?php endfor;?>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateSizes();jQuery('#sizesModal').modal('toggle');return false;">Save changes</button>
      </div>
    </div>
  </div>
</div>
  </div>-->
<!--<div class="form-group col-lg-6 col-md-6">
    <label>Quantity and Sizes preview*:</label>
    <input type="text" name="sizes" id="sizes" value="<?php echo $sizes; ?>" readonly>
  </div>-->
  <div class="form-group col-lg-6 col-md-6">
    <?php if($saved_image != ''): ?>
      <div class="saved-image">
        <img src="<?php echo$saved_image;?>" alt="saved image" style="height:auto;width:200px;"/><br>
        <a href="products.php?delete_image=1&edit=<?php echo$edit_id;?>" class="text-danger">Delete Image</a>
      </div>
    <?php else: ?>
  <label>Product Image</label>
  <input type="file" name="photo" id="photo">
<?php endif; ?>
  </div>
  <a href="products.php" class="btn btn-default" style="float:right;">Cancel</a>
  <input type="submit" value="<?php echo((isset($_GET['edit']))?'Edit':'Add'); ?> Product" class="btn btn-success" style="float:right;"/>
</form>
<?php endif; ?>


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
</div>
  </div>
</div>
  <script>
  function updateSizes(){
   var sizeString = '';
    for(var i=1;i<=12;i++){
       if(jQuery('#size'+i).val() != ''){
         sizeString += jQuery('#size'+i).val()+':'+jQuery('#qty'+i).val()+',';
       }
    }
    jQuery('#sizes').val(sizeString);
  }

  function get_child_options(){
    if(typeof selected === 'undefined'){
      var selected = '';
    }

    var parentID = jQuery('#parent').val();
    jQuery.ajax({
     url: '/copy/admin/childhelper/child_categories.php',
     type: 'POST',
     data: {parentID: parentID, selected: selected},
     dataType: 'json',
     success: function(data){
      jQuery('#child').html(data);
     },
     error: function(){alert('Something went wrong with child options')},
    });
  }
 jQuery('select["parent"]').change(function(){
  get_child_options();
 });
</script>
<script>
  jQuery('document').ready(function(){
    get_child_options('<?php echo $category;?>');
  });
</script>
      <!-- jQuery first, then Tether, then Bootstrap JS. -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
 </body>
  </html>
    
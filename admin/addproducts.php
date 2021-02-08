<?php
require_once '../includes/init.php';
  if(!is_logged_in()){
    login_error_redirect();
  }
?>
<?php if(isset($_GET['add'])): ?>
<?php 
$brandquery = $db->query("SELECT * FROM Brand ORDER BY Brand");
$parentquery = $db->query("SELECT * FROM Category WHERE Parent = 0 ORDER BY Name");
?>

<!--enclose in div -->

<!--<h3 style="text-align:center;">Add A New Product</h3>
<form action="products.php?add=1" method="POST" enctype="multipart/form-data">
  <div class="form-group col-lg-4">
    <label>Name:</label required>
    <input type="text" name="title" value="<?php echo ((isset($_POST['title']))?sanitize($_POST['title']):''); ?>">
  </div>
  <div class="form-group col-lg-4">
    <label>Brand</label required>
    <select name="brand">
      <option value=""<?php echo ((isset($_POST['brand']) && $_POST['brand'] == '')?' selected':''); ?>></option>
      <?php while($brand = mysqli_fetch_assoc($brandquery)): ?>
       <option value="<?php echo $brand['Brandid']; ?>"<?php echo ((isset($_POST['brand']) && $_POST['brand'] == $brand['Brandid'])?' selected':''); ?>><?php echo $brand['Brand']; ?></option>
      <?php endwhile; ?>
    </select>
  </div>
  <div class="form-group col-lg-4">
    <label>Parent Category</label required>
      <select name="parent" id="parent">
        <option value="" <?php echo((isset($_POST['Parent']) && $_POST['Parent'] == '')?' selected':''); ?>></option>
        <?php while($parent = mysqli_fetch_assoc($parentquery)): ?>
          <option value="<?php echo $parent['Categoryid']; ?>"<?php echo ((isset($_POST['Parent']) && $_POST['Parent'] == $parent['Categoryid'])?' selected':''); ?>><?php echo $parent['Name']; ?></option>
        <?php endwhile; ?>
      </select>
  </div>
  <div class="form-group col-lg-4">
    <label>Child Category</label>
    <select name="child" id="child">
      
    </select>
  </div>
  <div class="form-group col-lg-4">
    <label>UnitPrice</label>
    <input type="text" id="price" name="price" value="<?php echo((isset($_POST['price']))?sanitize($_POST['price']):''); ?>">
  </div>
  <div class="form-group col-lg-4">
    <label>Quantity and Sizes</label>
    <button type="button" class="btn btn-default form-control" onclick="jQuery('#sizesModal').modal('toggle');return false;">Quantity and Size</button>
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
        <div class="form-control col-md-4">
          <label for="size<?php echo $i;?>">Size</label>
          <input type="text" name="size<?php echo $i;?>" id="size<?php echo$i;?>" value="" class="form-control">
        </div>
         <div class="form-control col-md-2">
          <label for="qty<?php echo $i;?>">Quantity</label>
          <input type="number" name="qty<?php echo $i;?>" id="qty<?php echo$i;?>" value="" min="0" class="form-control">
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
  </div>
  <div class="form-group col-lg-4">
    <label>Quantity and Sizes preview</label>
    <input type="text" name="sizes" id="sizes" value="<?php echo((isset($_POST['sizes']))?$_POST['sizes']:''); ?>" readonly>
  </div>
  <div class="form-group col-lg-6">
  <label>Product Image</label>
  <input type="file" name="photo" id="photo">
  </div>
  <div class="form-group col-lg-6">
    <label>Description</label>
    <textarea name="description" id="description" rows="6"><?php echo((isset($_POST['description']))?sanitize($_POST['description']):''); ?></textarea>
  </div>
  <input type="submit" value="Add Product" name="" class="btn btn-default btn-success" style="float:right;">
</form>
<!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Quantity and Size</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    
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
<a href="products.php">PRODUCTS</a>
<a href="categories.php">CATEGORIES</a>
<a href="account.html">MY ACCOUNT</a>
</div>
<div class="title text-center">
<h1 style="font-size:3.8em;">PRODUCTS</h1>
</div>
<div class="title1 text-center">
<h2>Reliable. Affordable. Available.</h2>
</div>
<div class="buttons">
<a href="shop.html"><button type="button" class="btn btn-primary btn-round-lg btn-lg">Shop now</button></a>
<button type="button" class="btn btn-primary btn-round-lg btn-lg">Sell</button>
<button type="button" class="btn btn-primary btn-round-lg btn-lg">Learn more</button>
</div>
  </div>
<h3 style="text-align:center;">Add A New Product</h3>
<form action="addproducts.php" method="POST" enctype="multipart/form-data">
  <div class="form-group col-lg-4">
    <label>Name:</label required>
    <input type="text" name="title" value="<?php echo ((isset($_POST['title']))?sanitize($_POST['title']):''); ?>">
  </div>
  <div class="form-group col-lg-4">
    <label>Brand</label required>
    <select name="brand">
      <option value=""<?php echo ((isset($_POST['brand']) && $_POST['brand'] == '')?' selected':''); ?>></option>
      <?php while($brand = mysqli_fetch_assoc($brandquery)): ?>
       <option value="<?php echo $brand['Brandid']; ?>"<?php echo ((isset($_POST['brand']) && $_POST['brand'] == $brand['Brandid'])?' selected':''); ?>><?php echo $brand['Brand']; ?></option>
      <?php endwhile; ?>
    </select>
  </div>
  <div class="form-group col-lg-4">
    <label>Parent Category</label required>
      <select name="parent" id="parent">
        <option value="" <?php echo((isset($_POST['Parent']) && $_POST['Parent'] == '')?' selected':''); ?>></option>
        <?php while($parent = mysqli_fetch_assoc($parentquery)): ?>
          <option value="<?php echo $parent['Categoryid']; ?>"<?php echo ((isset($_POST['Parent']) && $_POST['Parent'] == $parent['Categoryid'])?' selected':''); ?>><?php echo $parent['Name']; ?></option>
        <?php endwhile; ?>
      </select>
  </div>
  <div class="form-group col-lg-4">
    <label>Child Category</label>
    <select name="child" id="child">
      
    </select>
  </div>
  <div class="form-group col-lg-4">
    <label>UnitPrice</label>
    <input type="text" id="price" name="price" value="<?php echo((isset($_POST['price']))?sanitize($_POST['price']):''); ?>">
  </div>
  <div class="form-group col-lg-4">
    <label>Quantity and Sizes</label>
    <button type="button" class="btn btn-default form-control" onclick="jQuery('#sizesModal').modal('toggle');return false;">Quantity and Size</button>
  </div>
  <div class="form-group col-lg-4">
    <label>Quantity and Sizes preview</label>
    <input type="text" name="sizes" id="sizes" value="<?php echo((isset($_POST['sizes']))?$_POST['sizes']:''); ?>" readonly>
  </div>
  <div class="form-group col-lg-6">
  <label>Product Image</label>
  <input type="file" name="photo" id="photo">
  </div>
  <div class="form-group col-lg-6">
    <label>Description</label>
    <textarea name="description" id="description" rows="6"><?php echo((isset($_POST['description']))?sanitize($_POST['description']):''); ?></textarea>
  </div>
  <input type="submit" value="Add Product" name="" class="btn btn-default btn-success" style="float:right;">
</form>
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
        <div class="form-control col-md-4">
          <label for="size<?php echo $i;?>">Size</label>
          <input type="text" name="size<?php echo $i;?>" id="size<?php echo$i;?>" value="" class="form-control">
        </div>
         <div class="form-control col-md-2">
          <label for="qty<?php echo $i;?>">Quantity</label>
          <input type="number" name="qty<?php echo $i;?>" id="qty<?php echo$i;?>" value="" min="0" class="form-control">
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
<?php endif; ?>
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
    var parentID = document.getElementById("parent").val();
    jQuery.ajax({
     url: '/project/admin/childhelper/child_categories.php',
     type: 'POST',
     data: {parentID : parentID},
     dataType: 'json',
     success: function(data){
      jQuery('#child').html(data);
     },
     error: function(){alert('Something went wrong with child options')},
    });
  }
 jQuery('select["parent"]').change(get_child_options);
</script>
      <!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
 </body>
  </html>
    
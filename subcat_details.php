<?php
require_once 'includes/init.php';

if(isset($_GET['cat'])){
  $cat_id = ($_GET['cat']);
}else{
  $cat_id = '';
}
function get_category($child_id){
 global $db;
 $id = $child_id;
 $sql = "SELECT p.Categoryid AS 'pCategoryid', p.Name AS 'Parent', c.Categoryid AS 'cCategoryid', c.Name AS 'Child' 
         FROM Category c
         INNER JOIN Category p
         ON c.Parent = p.Categoryid
         WHERE c.Categoryid = '$id'";
  $query = $db->query($sql);
  $category = mysqli_fetch_assoc($query);
  return $category;       
}
$catsql = "SELECT * FROM Products WHERE Category = '$cat_id'";
$productcat = $db->query($catsql);
$category = get_category($cat_id);
$sql1 = "SELECT * FROM Category WHERE Parent = 0";
$pquery = $db->query($sql1);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fresh Farm Online Shopping</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container5{padding: 50px;background-image:url("fruit1.jpg");min-width: 100%;height:900px; .topnav a:hover:before{visibility: visible;-webkit-transform:scaleX(1);transform: scaleX(1);}}
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
	<!--.toplayer{
  height:45px;
}-->
.offers{
  height:45px;
  <!--width:25%;-->
  background-color:red;
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
cols{
	float:left;
	max-width:290px;
	margin:0px;
	padding:4em;
}
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
<br><br>
	<div class="cols">
		<h4 style="font-size:21px;color:white;">Category</h4>
		<?php while($parent = mysqli_fetch_assoc($pquery)):?>
		<?php
		$parentid = $parent['Categoryid'];
		 $sql2 = "SELECT * FROM Category WHERE Parent = '$parentid'";
		 $cquery = $db->query($sql2);
		?>
	    <!--Menu items-->
		
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;font-size:15px;"><?php echo$parent['Name'];?><span class="caret"></span></a>
		  <ul class="dropdown-menu" role="menu">
			<?php while($child = mysqli_fetch_assoc($cquery)):?>
			  <li><a href="subcat_details.php?cat=<?php echo$child['Categoryid'];?>" style="color:red;font-size:15px;"><?php echo$child['Name'];?></a></li>
			<?php endwhile;?>
		  </ul>
		</li>
	    <?php endwhile;?>
	</div>
	<!--Show top ten products-->
		<div class="title text-center">
			<h1 style="font-size:3.8em;color:white;" align="left"> Welcome to Fresh Farm</h1>
		</div>

		<h1 style="font-size:1.8em;color:white;"><?php echo$category['Parent']. ' ~ ' .$category['Child'];?></h1>
	<div class="container text-muted">
<div class="row rows">
  <?php while($product = mysqli_fetch_assoc($productcat)) : ?>
  <div class="col-md-6 col-lg-3">
  <div class="card">
  <div class="card-block">
  <h3 class="card-title text-center" style="font-size:25px;color:black;"><?php echo $product["Name"]; ?></h3>
  <hr>
  <p class="text-center" style="font-size:15px;color:black;">Ksh.<?php echo 'Ksh'.$product["UnitPrice"]; ?>/KG</p>
  </div>
  <img src="<?php echo $product['Image']; ?>" class="card-img-bottom img-fluid" alt="<?php echo $product['Name']; ?>" style="height:177px;"/>
   <div class="action">
  <div class="row rowz">
  <!--<span>&#124;</span>
  <div class="col-md-6 col-lg-4">
  <a href="#"><img src="bagg.svg" title="Add to Cart" alt="Shopping bag" style="height:30px;padding-left:100px;"/></a>
  </div><span>&#124;</span>-->
    <a href="cartAction.php?action=addToCart&id=<?php echo $product['Productid']?>" class="btn btn-success" style="height:30px;font-size:13px;">Add To Cart</a>    
  </div>
  </div>
     </div>
    </div>
  <?php endwhile; ?>	
  </div>	
  </div>
</div>
<script>
    function detailsmodal(Productid){
      var data = {'Productid':Productid};
     $.ajax({
       url: '/project/includes/modalbody.php',
       data: data,
       method: 'POST',
       dataType: 'json',
       success: function(data){
        $('body').html(data);
        $('#details-modal').modal('toggle');
       },
       error: function(){
         alert('An error occured when loading product');
       } 
     });
    }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</body>
</html>
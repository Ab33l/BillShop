<?php
require_once 'includes/init.php';
$sql = "SELECT * FROM Products WHERE Featured = 1";
$featured = $db->query($sql);
$sql1 = "SELECT * FROM Category WHERE Parent = 0";
$pquery = $db->query($sql1);
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<title></title>
<style>
.start{
  background-image:url("fresh.jpg");
    min-width: 100%;
    height:540px; 
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
.rows{
	margin:-1329px 11px;
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
.block{
	 background-image:url("scott.jpg");
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    min-width: 100%;
	  height:1300px;
}
.btn{
	margin-top:100px;
	margin-left:285px;
	width:121px;
	text-align:center;
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
.rowz{
  padding:19px 28px;
  margin-right:-56px;
  margin-left:-20px;
}
span{
  padding:4px 15px;
  margin:-3px -22px;
}
.vert{
  padding:4px 21px;
  margin:-3px -22px;
}
</style>
</head>
<body>
<div class="start">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
<ul class="nav navbar-nav">
  <?php while($parent = mysqli_fetch_assoc($pquery)):?>
    <?php
    $parentid = $parent['Categoryid'];
     $sql2 = "SELECT * FROM Category WHERE Parent = '$parentid'";
     $cquery = $db->query($sql2);
    ?>
    <!--Menu items-->
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo$parent['Name'];?><span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <?php while($child = mysqli_fetch_assoc($cquery)):?>
          <li><a href="category.php?cat=<?php echo$child['Categoryid'];?>"><?php echo$child['Name'];?></a></li>
        <?php endwhile;?>
      </ul>
    </li>
  <?php endwhile;?>
  <li><a href="cart.php">My Cart</a></li>
</ul>
</div>
</nav>
<div class="title">
<h1 style="font-size:3.8em;">FreshFarm</h1>
</div>
</div>
<div class="block">
</div>
<div class="container text-muted">
<div class="row rows">
  <?php while($product = mysqli_fetch_assoc($featured)) : ?>
<div class="col-md-6 col-lg-3">
<div class="card">
<div class="card-block">
<h3 class="card-title text-center"><?php echo $product['Name']; ?></h3>
<hr>
<p class="text-center">Ksh.<?php echo $product['UnitPrice']; ?></p>
</div>
<img src="<?php echo $product['Image']; ?>" class="card-img-bottom img-fluid" alt="<?php echo $product['Name']; ?>" style="height:177px;"/>
<div class="action">
<div class="row rowz">
<div class="col-md-6 col-lg-4">
<a href="#"><img src="heart.svg" title="Wishlist" alt="Favourite" style="height:30px;"/></a>
</div><span>&#124;</span>
<div class="col-md-6 col-lg-4">
<a href="#"><img src="bagg.svg" title="Add to Cart" alt="Shopping bag" style="height:30px;padding-left:15px;"/></a>
</div><span class="vert">&#124;</span>
<div class="col-md-6 col-lg-4">
<button title="Quick View" onclick="detailsmodal(<?php echo$product['Productid'];?>);"><img src="mag.svg" alt="Search" style="height:30px;"/></button>
</div>  
</div>
</div>
   </div>
    </div>
    <?php endwhile; ?>

<a href="shop.html"><button type="button" class="btn btn-primary btn-round-lg btn-lg">Back</button></a>
<a href="more2.html"><button type="button" class="btn btn-primary btn-round-lg btn-lg" style="">More</button></a>
</div>
</div>
<script>
function detailsmodal(Productid_value){
    var str = {"Productid": Productid_value};
     jQuery.ajax({
       type: "POST",
       url: "/project/includes/modalbody.php",
       data: str,
       dataType: "json",
       /*cache: false,*/
       success: function(response)
       {
        var respons = response;
        //var type = respons.status
        jQuery(".modal-content").append(respons.Productid);
        jQuery('#details-modal').modal("toggle");
       }
     }).fail(function(xhr, status, error){
        alert("error:" + status + ":" + error + ":" + xhr.responseText)
    }).always(function(){
        location.reload();
     });
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
    </script>
</body>
</html>
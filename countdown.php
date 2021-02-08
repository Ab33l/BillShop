<?php
//require_once 'includes/init.php';
include 'Cart.php';
require_once 'includes/init.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>BillShop - SBLV Promo</title>
    <link rel="shortcut icon" type="image/png" href="billsblack.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href ="style.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">	
<style>
  .container5{background-color: rgb(234,237,237);} 
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
	.col-lg-3 {width: 27%;}
	.card{
    margin:10px;
    margin-bottom: 35px;
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
  margin: 58px;
  padding: 20px;
}
h1{
	color: #fff;
	text-align:center;
	font-size:54px;
	letter-spacing:10px;
}
#del-countdown{
	width:72%;
	padding-top:38px;
	margin-left:228px;
}
#clock span{
	float:left;
	text-align:center;
	font-size:84px;
	margin:0 2.5%;
	color:white;
	padding:20px;
	width:20%;
	border-radius:15px;
	border:1px solid;
}
#clock span:nth-child(1){
	background:#fa5559;
}
#clock span:nth-child(2){
	background:#26c2b9;
}
#clock span:nth-child(3){
	background:#f6bc58;
}
#clock span:nth-child(4){
	background:#2dcb74;
}
#clock:after{
	content:"";
	display:block;
	clear:both;
}
#units span{
	float:left;
	width:25%;
	text-align:center;
	margin-top:30px;
	color:#ddd;
	text-transform:uppercase;
	font-size:13px;
	letter-spacing:2px;
	text-shadow:1px 1px 1px rgba(10,10,10,0.7);
}

span.turn{
	animation:turn 0.7s ease forwards; 
}
.clocksize{
	height:490px;
}

footer{
  position: fixed;
  bottom: 0;
}

@media (max-height:800px){
  footer { position: static; }
  header { padding-top:40px; }
}


.footer-distributed{
  background-color: #2c292f;
  box-sizing: border-box;
  width: 100%;
  text-align: left;
  font: bold 16px sans-serif;
  padding: 50px 50px 60px 50px;
  margin-top: 80px;
}

.footer-distributed .footer-left,
.footer-distributed .footer-center,
.footer-distributed .footer-right{
  display: inline-block;
  vertical-align: top;
}

/* Footer left */

.footer-distributed .footer-left{
  width: 30%;
}

.footer-distributed h3{
  color:  #ffffff;
  font: normal 36px 'Cookie', cursive;
  margin: 0;
}

/* The company logo */

.footer-distributed .footer-left img{
  width: 30%;
}

.footer-distributed h3 span{
  color:  #e0ac1c;
}

/* Footer links */

.footer-distributed .footer-links{
  color:  #ffffff;
  margin: 20px 0 12px;
}

.footer-distributed .footer-links a{
  display:inline-block;
  line-height: 1.8;
  text-decoration: none;
  color:  inherit;
}

.footer-distributed .footer-company-name{
  color:  #8f9296;
  font-size: 14px;
  font-weight: normal;
  margin: 0;
}

/* Footer Center */

.footer-distributed .footer-center{
  width: 35%;
}


.footer-distributed .footer-center i{
  background-color:  #33383b;
  color: #ffffff;
  font-size: 25px;
  width: 38px;
  height: 38px;
  border-radius: 50%;
  text-align: center;
  line-height: 42px;
  margin: 10px 15px;
  vertical-align: middle;
}

.footer-distributed .footer-center i.fa-envelope{
  font-size: 17px;
  line-height: 38px;
}

.footer-distributed .footer-center p{
  display: inline-block;
  color: #ffffff;
  vertical-align: middle;
  margin:0;
}

.footer-distributed .footer-center p span{
  display:block;
  font-weight: normal;
  font-size:14px;
  line-height:2;
}

.footer-distributed .footer-center p a{
  color:  #e0ac1c;
  text-decoration: none;;
}


/* Footer Right */

.footer-distributed .footer-right{
  width: 30%;
}

.footer-distributed .footer-company-about{
  line-height: 20px;
  color:  #92999f;
  font-size: 13px;
  font-weight: normal;
  margin: 0;
}

.footer-distributed .footer-company-about span{
  display: block;
  color:  #ffffff;
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 20px;
}

.footer-distributed .footer-icons{
  margin-top: 25px;
}

.footer-distributed .footer-icons a{
  display: inline-block;
  width: 35px;
  height: 35px;
  cursor: pointer;
  background-color:  #33383b;
  border-radius: 2px;

  font-size: 20px;
  color: #ffffff;
  text-align: center;
  line-height: 35px;

  margin-right: 3px;
  margin-bottom: 5px;
}

/* Here is the code for Responsive Footer */
/* You can remove below code if you don't want Footer to be responsive */


@media (max-width: 880px) {

  .footer-distributed .footer-left,
  .footer-distributed .footer-center,
  .footer-distributed .footer-right{
    display: block;
    width: 100%;
    margin-bottom: 40px;
    text-align: center;
  }

  .footer-distributed .footer-center i{
    margin-left: 0;
  }

}
</style>
</head>
<body>
    <nav style="background-color: #0B2035;height:100px;">
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="index.php" style="font-size: 50px;text-decoration:none;">BillShop</a></li>
      </ul>
      <a href="index.php" class="brand-logo center"><img src="billsblack.png" alt="Bills" width='56%' height='56%'/></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php" title="Home" style="text-decoration: none;font-size: 20px;">Home</a></li>
        <li><a href="viewCart.php" title="Shopping Cart" style="text-decoration: none;font-size: 20px;">Shopping Cart</a></li>
        <?php
        if(!empty($_SESSION['UserID'])){
          ?>
          <li class="dropdown" style="list-style-type: none;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-decoration:none;font-size: 20px;">Hello @ <?php echo $_SESSION['UserID']; ?> !
          </a>
          <ul class="dropdown-menu" role="menu" style="list-style-type: none;">
            <li><a href="admin/logout.php" style="color:black;list-style-type: none;font-size: 20px;">Log Out</a></li>
          </ul>
        </li>
        <?php
          }else{
            ?>
            <li><a href="./admin/login.php" title="Login" style="text-decoration: none;font-size: 20px;">Sign In</a></li>
            <?php
          }
          ?>
      </ul>
    </div>
  </nav>
      <nav style="background-color: white;height:60px;padding-left: 200px;">
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="hide-on-med-and-down">
        <li><a href="newin.php" style="color:black;font-size:20px;">NEW IN</a></li>
        <li><a href="collection.php" style="color:black;font-size:20px;padding-left: 65px;">COLLECTION</a></li>
        <li><a href="active.php" style="color:black;font-size:20px;padding-left: 65px;">ACTIVE WEAR</a></li>
        <li><a href="lounge.php" style="color:black;font-size:20px;padding-left: 65px;">LOUNGEWEAR</a></li>
        <li><a href="tracks.php" style="color:black;font-size:20px;padding-left: 65px;">TRACKSUIT</a></li>
        <li><a href="sales.php" style="color:red;font-size:20px;padding-left: 65px;">SALE</a></li>
      </ul>
    </div>
  </nav>
<div class="clocksize" style="background-color:black;">
<div id="del-countdown">
<h1>Super Bowl LV Offers!</h1>
<h2 style="text-align:center;color:white;">ENDING FEB. 13TH</h2>
<div id="clock"></div>
<div id="units">
<span>Days</span>
<span>Hours</span>
<span>Minutes</span>
<span>Seconds</span>
</div>
</div>
</div>
<div class="container5">
<!-- Top links -->
<!--End top links-->

<!-- 	<div class="title text-center">
		<h1 style="font-size:3.8em;color:white;"> Welcome to Fresh Farm</h1>
	</div> -->
    <h1 style="color:grey;text-align:center;font-size:30px;padding-top: 20px;">Best Deals!</h1>
    
    <!--<div id="products" class="row list-group">
        <?php
        //get rows query
        //$query = $db->query("SELECT * FROM Products WHERE Featured = 1");
        //if($query->num_rows > 0){ 
          //  while($row = $query->fetch_assoc()){
        ?>
        <div class="item col-lg-3">
            <div class="thumbnail">
                <div class="caption">
				<img src="<?php echo $row['Image']; ?>" class="card-img-bottom img-fluid" alt="<?php echo $row['Name']; ?>" style="height:177px;"/>
                    <h4 class="list-group-item-heading"><?php echo $row["Name"]; ?></h4>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead"><?php echo 'Ksh'.$row["UnitPrice"]; ?></p>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["Productid"]; ?>">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php// } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php// } ?>
    </div>-->
	
<div class="row rows">
   <?php
        //get rows query
        $query = $db->query("SELECT * FROM Products WHERE Featured = 1");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
  <div class="col-md-6 col-lg-3">
  <div class="card">
  <div class="card-block">
  <h3 class="card-title text-center" style="font-size:25px;color:black;"><?php echo $row['Name']; ?></h3>
  <hr>
  <p class="text-center" style="font-size:15px;color:black;">Ksh.<?php echo $row['UnitPrice']; ?></p>
  </div>
  <img src="<?php echo $row['Image']; ?>" class="card-img-bottom img-fluid" alt="<?php echo $row['Name']; ?>" style="margin:12px;"/>
   <div class="action">
  <div class="row rowz">
  <!--<span>&#124;</span>
  <div class="col-md-6 col-lg-4">
  <a href="#"><img src="bagg.svg" title="Add to Cart" alt="Shopping bag" style="height:30px;padding-left:100px;"/></a>
  </div><span>&#124;</span>-->
    <a href="cartAction.php?action=addToCart&id=<?php echo $row['Productid']?>" class="btn btn-success" style="height:30px;font-size:13px;">Add To Cart</a>    
  </div>
  </div>
     </div>
    </div>
      <?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
  </div>
	
</div>
    <footer class="footer-distributed" style="background-color:#0B2035;">

      <div class="footer-left">
          <img src="billsblack.png">
        <h3>About<span>BillShop</span></h3>

        <p class="footer-links">
          <a href="index.php">Home</a>
          |
          <a href="newin.php">Latest Products</a>
          |
          <a href="countdown.php">Super Bowl LV Offers</a>
        </p>

        <p class="footer-company-name">© 2020 BillShop. Ltd.</p>
      </div>

      <div class="footer-center">
<!--         <div>
          <i class="fa fa-map-marker"></i>
            <p><span>309 - Rupa Solitaire,
             Bldg. No. A - 1, Sector - 1</span>
            Mahape, Navi Mumbai - 400710</p>
        </div> -->

        <div>
          <i class="fa fa-phone"></i>
          <p>+254 123456789</p>
        </div>
        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:support@eduonix.com">support@billshop.com</a></p>
        </div>
      </div>
      <div class="footer-right">
        <p class="footer-company-about">
          <span>About the Supermarket Franchise</span>
          We offer all your products under one roof.</p>
        <div class="footer-icons">
          <a href="#"><i class="fa fa-windows"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-linkedin"></i></a>
          <a href="#"><i class="fa fa-youtube"></i></a>
        </div>
      </div>
    </footer>
<script src="countdown.js"></script>
</body>
</html>
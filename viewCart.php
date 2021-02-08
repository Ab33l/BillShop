<?php
// initializE shopping cart class 
include 'Cart.php';
$cart = new Cart;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>BillShop - View Cart</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="billsblack.png"/>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 50px;background-image:url("fruit1.jpg");min-width: 100%;height:600px; .topnav a:hover:before{visibility: visible;-webkit-transform:scaleX(1);transform: scaleX(1);}}
    input[type="number"]{width: 20%;}
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
    <script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>
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
<div class="container">
<!-- Top links -->
<!--End top links-->
<br>
<br>
    <h1 style="color:white;">Shopping Cart</h1>
    <table class="table" style="color:white;">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo 'Ksh'.$item["price"]; ?></td>
            <td><input style="color:white;" type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            <td><?php echo 'Ksh'.$item["subtotal"]; ?></td>
            <td>
                <!--<a href="cartAction.php?action=updateCartItem&id=" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i></a>-->
                <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>Your cart is empty.....</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td><a href="sales.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
            <td colspan="2"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo 'Ksh'.$cart->total(); ?></strong></td>
            <td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
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
</body>
</html>
<?php
require_once '../includes/init.php';
// initializ shopping cart class 
include '../cart.php';
$cart = new Cart;

if($_REQUEST['action'] == 'vieworderItem' && !empty($_REQUEST['id'])){
        $OrderID = $_REQUEST['id'];

}
else{
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fresh firm - View selected order</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 50px;background-image:url("../fruit1.jpg");min-width: 100%;height:600px; .topnav a:hover:before{visibility: visible;-webkit-transform:scaleX(1);transform: scaleX(1);}}
    input[type="number"]{width: 20%;}
    </style>

</head>

<body>
<div class="container">
<!-- Top links -->
<?php include("adminlinks.php") ?>
<!--End top links-->
<br>
<br>
    <h1>View selected order</h1>
    <table class="table" style="color:white;">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $query = $db->query("SELECT * FROM order_items,products WHERE order_items.product_id=products.productid and order_items.order_id = '$OrderID'");
        if($query->num_rows > 0){ 
		 while($item = $query->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $item["Name"]; ?></td>
            <td><?php echo 'Ksh'.$item["UnitPrice"]; ?></td>
            <td><?php echo $item["quantity"]; ?></td>
        </tr>
	<?php } }else{ ?>
        <tr><td colspan="5"><p>No records.....</p></td>
    <?php } ?>
    </tbody>
    <tfoot>

    </tfoot>
    </table>
</div>
</body>
</html>
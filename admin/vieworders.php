<?php
require_once '../includes/init.php';
// initialize shopping cart class 
include '../cart.php';
$cart = new Cart;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fresh firm - View Orders</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 50px;background-image:url("../fruit1.jpg");min-width: 100%;height:100%; .topnav a:hover:before{visibility: visible;-webkit-transform:scaleX(1);transform: scaleX(1);}}
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
    <h1>View orders</h1>

    <table class="table" style="color:red;">

    <thead>
        <tr>
            <th>Order ID</th>
			<th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
			<th>Date</th>
            <th>Amount</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    <?php
        //get rows query
        $query = $db->query("SELECT * FROM customers,orders WHERE customers.id=orders.customer_id");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
    ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["firstname"]; ?></td>
   			<td><?php echo $row["lastname"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["phone"]; ?></td>
			<td><?php echo $row["address"]; ?></td>
            <td><?php echo $row["created"]; ?></td>
            <td><?php echo 'Ksh'.$row["total_price"]; ?></td>
            <td>
    <a href="viewspecificorder.php?action=vieworderItem&id=<?php echo $row["id"]; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-list"></i></a>
            </td>
            </td>
        </tr>
	<?php } }else{ ?>
        <tr><td colspan="5"><p>No records.....</p></td>
    <?php } ?>
    </tbody>
	
    </table>
</div>
</body>
</html>
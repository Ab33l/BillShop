<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/project/includes/init.php';
$product_id = sanitize($_POST['product_id']);
$size = sanitize($_POST['size']);
$available = sanitize($_POST['available']);
$quantity = sanitize($_POST['quantity']);
$item = array();
$item[] = array( 
       'id' => $product_id; 
       'size' => $size;
       'quantity' => $quantity;
       );
$domain = ($_SERVER['HTTP_HOST'] != 'localhost')?'.'.$_SERVER['HTTP_HOST']:false;
$query = $db->query("SELECT * FROM Products WHERE Productid = '{$product_id}'");
$product = mysqli_fetch_assoc($query);
$_SESSION['success_pop'] = $product['Name']. ' was added to your cart';

//check if cart cookie exists
if($cart_id != ''){
  $cart_query = $db->query("SELECT * FROM Orders WHERE Orderid = '{$cart_id}'");
  $cart = mysqli_fetch_assoc($cart_query);
  $previous_items = json_decode($cart['Items'],true);
  $item_match = 0;
  $new_items = array();
  foreach($previous_items as $pitem){
    if($item[0]['id'] == $pitem['id'] && $item[0]['size'] == $pitem['size']){
      $pitem['quantity'] = $pitem['quantity'] + $item[0]['quantity'];
      if($pitem['quantity'] > $available){
        $pitem['quantity'] = $available;
      }
      $item_match = 1;
    }
    $new_items = $pitem;
  }
  if($item_match != 1){
    $new_items = array_merge($item,$previous_items);
  }
$items_json = json_encode($new_items);
$cart_expire = date("Y-m-d H:i:s",strtotime("+30 days"));
$db->query("UPDATE Orders SET Items = '{$items_json}', Expire_date = '{$cart_expire}' WHERE Orderid = '{$cart_id}'");
setcookie(CART_COOKIE,'',1,'/',$domain,false);//expires cookie
setcookie(CART_COOKIE,$cart_id,CART_COOKIE_EXPIRE,'/',$domain,false);

}else{
	//add cart to db and set cookie
	$items_json = json_encode($item);
	$cart_expire = date("Y-m-d H:i:s",strtotime("+30 days"));
	$db->query("INSERT INTO Orders (Expire_date,Items) VALUES ('{$cart_expire}','{$items_json}')");
	$cart_id = $db->insert_id;
	setcookie(CART_COOKIE,$cart_id,CART_COOKIE_EXPIRE,'/',$domain,false);
}
?>
<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/project/includes/init.php';
$mode = sanitize($_POST['mode']);
$edit_size = sanitize($_POST['edit_size']);
$edit_id = sanitize($_POST['edit_id']);
$cartquery = $db->query("SELECT * FROM Orders WHERE Orderid = '{$cart_id}'");
$result = mysqli_fetch_assoc($cartquery);
$items = json_decode($result['Items'],true);
$updated_items = array();
$domain = (($_SERVER['HTTP_HOST'] != 'localhost')?'.'.$_SERVER['HTTP_HOST']:false);


if($mode == 'removeone'){
  foreach($items as $item){
    if($item['Orderid'] == $edit_id && $item['size'] == $edit_size){
      $item['quantity'] = $item['quantity'] - 1;
    }
    if($item['quantity'] > 0){
      $updated_items[] = $item;
    }
  }
}


if($mode == 'addone'){
  foreach($items as $item){
    if($item['Orderid'] == $edit_id && $item['size'] == $edit_size){
      $item['quantity'] = $item['quantity'] + 1;
    }
      $updated_items[] = $item;
  }
}

if(!empty($updated_items)){
  $json_updated = json_encode($updated_items);
  $db->query("UPDATE Orders SET Items = '{$json_updated}' WHERE Orderid = '{$cart_id}'");
  $_SESSION['success_pop'] = "Your shopping cart has been updated!";
}

if(empty($updated_items)){
  $db->query("DELETE FROM Orders WHERE Orderid = '{$cart_id}'");
  setcookie(CART_COOKIE,'',1,"/",$domain,false);
}
?>
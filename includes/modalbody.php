<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/project/includes/init.php';
$id = $_GET['Productid'];
$id = (int)$id;
$sql = "SELECT * FROM Products WHERE Productid = '$id'";
$result = $db->query($sql);
$product = mysqli_fetch_assoc($result);
$brand_id = $product['Brand'];
$sql = "SELECT Brand FROM Brand WHERE Brandid = '$brand_id'";
$brand_query = $db->query($sql);
$brand = mysqli_fetch_assoc($brand_query);
$sizestring = $product['Size'];
//$sizestring = explode($sizestring,',');
$size_array = explode(',' , $sizestring);
?>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
<?php ob_start();?>
<div class="modal fade detail-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="detail-1" aria-hidden="true">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
<div class="modal-header">
<button type="button" class="close" aria-label="Close" onclick="closeModal()">
  <span aria-hidden="true">&times;</span>
</button>
  <h3 class="modal-title"><?php echo $product['Name']; ?></h3>
</div>
<div class="modal-body">
<div class="container-fluid">  
<div class="row">
  <span id="modal_errors" class="bg-danger"></span>
<div class="col-sm-6">
  <div class="center-block">
    <img src="<?php echo $product['Image'];?>" alt="<?php echo $product['Name'];?>" class="img-fluid"/>
  </div>
</div>
<div class="col-sm-6">
  <h3>Details</h3>
  <p><?php echo nl2br($product['Description']); ?></p>
  <p>Price: Ksh.<?php echo $product['UnitPrice']; ?></p>
  <p>Brand: <?php echo $brand['Brand']; ?></p>
  <form action="add_cart.php" method="POST" id="add_product_form">
    <input type="hidden" name="product_id" value="<?php echo$id;?>">
    <input type="hidden" name="available" id="available" value="">
    <div class="form-group">
  <label for="quantity">Quantity:</label>
  <input type="number" class="form-group" id="quantity" name="quantity" min="0"><br/>
</div>
<div class="form-group">
    <label for="size">Size:</label>
  <select name="size" id="size" name="size" class="form-control">
  <option value=""></option>
  <?php foreach($size_array as $string){
    $string_array = explode(':', $string);
    $size = $string_array[0];
    $available = $string_array[1];
    echo '<option value="'.$size.'" data-available="'.$available.'">'.$size.' (Available: '.$available.')</option>';
  }?>
 </select>
    </div>
  </form>
</div>
</div>
</div>
</div>
<div class="modal-footer" style="height:90px;">
  <button type="button" class="btn btn-secondary" onclick="closeModal()" style="margin-top:0px;">Close</button>
  <button type="button" class="btn btn-warning" onclick="add_to_cart();return false;" style="margin-top:0px;">
    <span class="glyphicon glyphicon-shopping-cart">Add To Cart</span>
  </button>
</div>
</div>
</div>
</div>
<script>
  //event listener
  jQuery('#size').change(function(){
   var available = jQuery('#size option:selected').data("available");
   jQuery('#available').val(available);
  });

  function closeModal(){
   jQuery('#details-modal').modal('hide');
   setTimeout(function(){
    jQuery('#details-modal').remove();
    jQuery('.modal-backdrop').remove();
   },500);
  }
   jQuery('#details-modal').on('hidden.bs.modal', function(){ 
        jQuery('#details-modal').remove();
  }) ;

    function add_to_cart(){
      jQuery('#modal_errors').html("");
      var size = jQuery('#size').val();
      var quantity = jQuery('#quantity').val();
      var available = jQuery('#available').val();
      var error = '';
      var data = jQuery('#add_product_form').serialize();
      if(size == '' || quantity == '' || quantity == 0){
        error += '<p style="text-align:center;color:red;">You must choose a size and quantity.</p>';
        jQuery('#modal_errors').html(error);
        return;
      }else if(quantity > available){
        error += '<p style="text-align:center;color:red;">You have selected more than </p>'+available;
        jQuery('#modal_errors').html(error);
        return;//breaks out of loop
      }else{
        jQuery.ajax({
          url: "/project/admin/childhelper/add_cart.php",
          type: "POST",
          data: data,
          success: function(){
           location.reload();
          },
          error: function(){
            alert("Something went wrong");
          }
        });
      }
    }
     function update_cart(mode,edit_id,edit_size){
     var data = {"mode" : mode, "edit_id" : edit_id, "edit_size" : edit_size};
     jQuery.ajax({
      url:"/project/admin/childhelper/update_cart.php",
      method:"POST",
      data:data,
      success: function(){location.reload();},
      error:function(){alert("Something went wrong.");},
     });
    }
</script>
<?php echo ob_get_clean(); ?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</body>
</html>
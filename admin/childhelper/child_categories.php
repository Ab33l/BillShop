<?php
require_once '../includes/init.php';
$parentID = (int)$_POST['parentID'];
$selected = sanitize($_POST['selected']);
$childquery = $db->query("SELECT * FROM Category WHERE Parent = '$parentID' ORDER BY Name");
//object buffer used
ob_start(); ?>
<option value=""></option>
 <?php while($child = mysqli_fetch_assoc($childquery)): ?>
  <option value="<?php echo $child['Categoryid']; ?>" <?php echo(($selected == $child['Categoryid'])?' selected':''); ?>>
  	<?php echo $child['Name']; ?></option>
 <?php endwhile; ?>
<?php echo ob_get_clean(); ?>
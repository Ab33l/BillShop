<?php
//stores functions/methods frequently used
function display_errors($errors){
	$display = '<ul style="background-color:#ffcdd2;">';
	foreach($errors as $error){
      $display .= '<li class="text-danger">'.$error.'</li>'; 
	}
	$display .= '</ul>';
	return $display;
}
function sanitize($dirty){
 return htmlentities($dirty,ENT_QUOTES,"UTF-8");
}
function money($number){
 return 'Ksh.'.number_format($number,2);
}
function login($user_id){
 $_SESSION['User'] = $user_id;
 global $db;
 $date = date("Y-m-d H:i:s");
 $db->query("UPDATE Users SET Timestamp = '$date' WHERE Sessionid = '$user_id'");
 $_SESSION['success_pop'] = "You have successfully logged in";
 header('Location: admin.php');
}

function is_logged_in(){
  if(isset($_SESSION['User']) && $_SESSION['User'] > 0){
    return true;
  }else{
  	return false;
  }
}

function login_error_redirect($url = 'login.php'){
  $_SESSION['error_pop'] = 'You must be logged in to continue';
  header('Location: '.$url);
}

function permission_error_redirect($url = 'login.php'){
  $_SESSION['error_pop'] = 'You lack permission to access this page';
  header('Location: '.$url);
}

function has_permission($permission = 'admin'){
 global $user_data;
  $permissions = explode(',', $user_data['UserType']);
  if(in_array($permission,$permissions,true)){
    return true;
  }else{
  	return false;
  }
}

function update_date($date){
 return date("M d, Y h:i A",strtotime($date));
}

function get_category($child_id){
 global $db;
 $id = sanitize($child_id);
 $sql = "SELECT p.Categoryid AS 'pCategoryid', p.Name AS 'Parent', c.Categoryid AS 'cCategoryid', c.Name AS 'Child' 
         FROM Category c
         INNER JOIN Category p
         ON c.Parent = p.Categoryid
         WHERE c.Categoryid = '$id'";
  $query = $db->query($sql);
  $category = mysqli_fetch_assoc($query);
  return $category;       
}
?>
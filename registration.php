<?php
require_once 'includes/init.php';
$fname = ((isset($_POST['fname']))?sanitize($_POST['fname']):'');
$lname = ((isset($_POST['lname']))?sanitize($_POST['lname']):'');
$email = ((isset($_POST['email']))?sanitize($_POST['email']):'');
$pnumber = ((isset($_POST['pnumber']))?sanitize($_POST['pnumber']):'');
$password = ((isset($_POST['password']))?sanitize($_POST['password']):'');
$confirm = ((isset($_POST['confirm']))?sanitize($_POST['confirm']):'');
 if($_POST){
    //existence of email
    $emailquery = $db->query("SELECT * FROM Users WHERE Email = '$email'");
    $emailcount = mysqli_num_rows($emailquery);
 if($emailcount != 0){
    $error = 'The email already exists.Use another one';
}
    $required = array('fname', 'lname', 'email', 'pnumber', 'password', 'confirm');
    foreach($required as $f){
     if(empty($_POST[$f])){
       $error = 'You must fill out all fields';
       break;
     }
    }
    //check password length
    if(strlen($password) <= 7){
      $error = 'Your password needs to be atleast 8 characters';
    }
    //check password and confirm match
    if($password != $confirm){
      $error = 'Your passwords do not match';
    }
    //email validation
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $error = 'You must enter a valid email';
    }

    if(!empty($errors)){
      echo display_errors($errors);
    }else{
      //add user to db plus set session
      $hashed = password_hash($password,PASSWORD_DEFAULT);
      $db->query("INSERT INTO Users (FirstName,LastName,Email,PhoneNumber,Password) VALUES ('$fname','$lname','$email','$pnumber','$hashed')");
      $_SESSION['success_pop'] = 'You have been added successfully';
      header('Location: login.php');
    }
  }
?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>Registration</title>
  	<style>
     #login-form{
  /*width:50%;
  height:60%;
  border:2px solid#000;
  border-radius:15px;
  box-shadow:7px 7px 15px rgba(0,0,0,0.6);
  margin:7% auto;
  padding:15px;
  background-color: transparent;*/
  width: 100%;
  margin: auto;
  padding: 10px;
  max-width: 400px;
  border-radius: 2px;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
  background-color: rgba(0, 0, 0, 0.2);
}
body{
    /*background-attachment:fixed;*/
  color: white;
  display: flex;
  padding: 230px;
  min-height: 100vh;
  position: relative;
  flex-direction: column;
  justify-content: center;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  background-color: #a06060;
  background: linear-gradient(130deg, #a06060 20%, #aaa 100%) no-repeat center center fixed;
}
.form-group {
    font-size: 22px;
  padding: 5px 10px;
  padding-top: 30px;
  position: relative;
  border-radius: 2px;
  margin-bottom: 10px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  background-color: rgba(0, 0, 0, 0.1);
}
.form-group input{
   width: 100%;
  border: none;
  outline: none;
  display: block;
  font-weight: 300;
  letter-spacing: 1px;
  background-color: transparent;
}
.form-group label{
  left: 10px;
  opacity: 0.7;
  font-weight: 100;
  letter-spacing: 2px;
  pointer-events: none;
  transition: all 0.2s ease-in;
}
.form-group input:focus + label, .form-group input.active + label{
  top: 5px;
  left: 5px;
  font-size: 16px;
} 
    </style>
  </head>
  <body>
    <div class="login-form">
   <h2 style="text-align:center;">Registration</h2><hr>
   <form action="registration.php" method="POST">
     <div class="form-group">
       <input type="text" id="fname" name="fname" onblur="checkInput(this)" value="<?php echo$fname;?>" required>
       <label for="fname">First Name:</label>
     </div>
      <div class="form-group">
       <input type="text" id="lname" name="lname" onblur="checkInput(this)" value="<?php echo$lname;?>" required>
       <label for="lname">Last Name:</label>
     </div>
      <div class="form-group">
       <input type="email" id="email" name="email" onblur="checkInput(this)" value="<?php echo$email;?>" required>
       <label for="email">Email:</label>
     </div>
      <div class="form-group">
       <input type="tel" id="pnumber" name="pnumber" onblur="checkInput(this)" value="<?php echo$pnumber;?>" required>
       <label for="pnumber">Phone Number:</label>
     </div>
      <div class="form-group">
       <input type="password" id="password" name="password" onblur="checkInput(this)" value="<?php echo$password;?>" required>
       <label for="password">Password:</label>
     </div>
      <div class="form-group">
       <input type="password" id="confirm" name="confirm" onblur="checkInput(this)" value="<?php echo$confirm;?>" required>
       <label for="confirm">Confirm Password:</label>
     </div>
     <div class="form-group">
       <a href="login.php" class="btn btn-default">Cancel</a>
       <input type="submit" value="Register" class="btn btn-primary">
     </div>
   </form>
 </div>
  <script>
  function checkInput(input) {
  if (input.value.length > 0) {
    input.className = 'active';
  } else {
    input.className = '';
  }
}
</script>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>	
  </body>
  </html>
<?php
//Step1
 $link = mysqli_connect("localhost", "root", "", "log");

if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$user = mysqli_real_escape_string($db, $_REQUEST['user']);
$fname = mysqli_real_escape_string($db, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($db, $_REQUEST['lname']);
$pass = mysqli_real_escape_string($db, $_REQUEST['pass']);

$sql = "INSERT INTO login ( user, fname, lname, pass) VALUES ('$user', '$fname', '$lname', '$pass')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);

?>
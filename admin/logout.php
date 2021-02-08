<?php
require_once '../includes/init.php';
unset($_SESSION['UserID']);
header('Location: login.php');
?>
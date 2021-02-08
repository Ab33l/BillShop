<?php
require_once 'includes/init.php';
unset($_SESSION['User']);
header('Location: /project/admin/login.php');
?>
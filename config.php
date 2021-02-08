
<?php 
//base path of server thus reduce effort of having to include files
define('BASEURL', $_SERVER['DOCUMENT_ROOT'].'/project/');
//define constants which can later come in handy
define('CART_COOKIE','FjHJEksd12pq');
define('CART_COOKIE_EXPIRE',time() + (86400*30));
define('TAXRATE',0.16);
?>
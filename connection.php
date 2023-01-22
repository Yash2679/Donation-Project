<?php 
$con = mysqli_connect('localhost', 'root', '', 'userform');
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/Yash/Project/');
define('SITE_PATH','http://127.0.0.1/Yash/Project/');
define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
?>
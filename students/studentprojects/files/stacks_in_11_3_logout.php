<?php
	$cookie = str_replace(" ","",'pagesafe');
	$reload = $cookie.'-reload';
	header('HTTP/1.1 200 Ok');
	setcookie($cookie,'',1,'/');
	setcookie($reload,'',1,'/');
	exit;
?>

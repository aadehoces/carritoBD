<?php

	if (isset($_SESSION['CARRITO'])) {
		setcookie('CARRITO',serialize($_SESSION['CARRITO']),time()+30000,"/");
	}
	//destruimos sesion
	session_destroy();
	//destruimos el array de session
	$_SESSION = array();
	//borramos la cookie de session
	if(isset($_COOKIE[session_name()])) { 
		setcookie(session_name(),'', time() - 42000, '/');
	}

	

?>
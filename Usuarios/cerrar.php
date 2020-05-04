<?php
	//comprobamos si el carrito está declarado
	if (isset($_SESSION['CARRITO'])) {
		//si está declarado guardamos el contenido en una cookie
		setcookie('CARRITO',serialize($_SESSION['CARRITO']),time()+30000,"/");
	}
	//destruimos sesion
	session_destroy();
	//destruimos el array de session
	$_SESSION = array();
	//borramos la cookie de session
	if(isset($_COOKIE[session_name()])) { 
		setcookie('id','', time() - 42000, '/');
	}

	

?>
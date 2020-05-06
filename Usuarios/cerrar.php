<?php
	//comprobamos si el carrito está declarado
	if (isset($_SESSION['CARRITO'])) {
		//si está declarado guardamos el contenido en una cookie
		foreach($_SESSION['CARRITO'] as $indice => $producto){
			$data[count($data)]=$producto;
		}
		setcookie('CARRITO',serialize($data),time()+30000,"/");
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
<?php
require_once('validacion.php');
require_once('datos.php');
require_once('gestion.php');
$validacion=new validar();
$datos= new datos();
$gestion= new gestion();

//se guardan datos
$datos->setEmail($_POST["email"]);
$datos->setContraseña($_POST["contraseña"]);
//se comprueba que el email está registrado
$code=$gestion->emailRegistrados($datos);

if ($code==1) {
	//si devuelve codigo 1 se comprueba la contraseña
	$code=$gestion->verificarContra($datos);
	if ($code == 1) {
		//se inicia la session
		session_start();
		//si todo va bien se comprueba si está la sookie carrito

		if (isset($_COOKIE['CARRITO'])) {
			//si está se guarda el contenido en el carrito de la session 
			$data=unserialize($_COOKIE['CARRITO'],["allowed_classes" => true]);
			$_SESSION['CARRITO']=$data;
			//se borra la cookie
			
			setcookie('CARRITO',"",time()-30000,"/");
			
		}
		//comprobamos el tipo de usuario
		$gestion->definirTipo($datos);
		//guardamos el dni
		$gestion->definirDNI($datos);
		$_SESSION['dni']=$datos->getDni();
		//se guarda el email en la variable de session email
		$_SESSION['email']=$datos->getEmail();
		//se guarda la contraseña en la variable de session contraseña
		$_SESSION['contraseña']=$datos->getContraseña();
		//se guarda el tipo en la variable de session tipo
		$_SESSION['tipo']=$datos->getTipo();
		$id=session_id();
		setcookie('id',$id,time()+30000,"/");
	}else{
		//si la contraseña es incorrecta
		$mensaje= "Contraseña incorrecta";
		setcookie('mensaje',$mensaje,"","/");
		header("Location:".$_SERVER['HTTP_REFERER']);
		exit();
	}
}else{
	//si el email es incorrecto
	$mensaje= "Email no registrado";
	setcookie('mensaje',$mensaje,"","/");
	header("Location:".$_SERVER['HTTP_REFERER']);
	exit();
}
?>
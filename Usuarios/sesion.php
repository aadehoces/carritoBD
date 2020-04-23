<?php
require_once('validacion.php');
require_once('datos.php');
require_once('gestion.php');
$validacion=new validar();
$datos= new datos();
$gestion= new gestion();
$datos->setEmail($_POST["email"]);
$datos->setContraseña($_POST["contraseña"]);
$code=$gestion->emailRegistrados($datos);
if ($code==1) {
	$code=$gestion->verificarContra($datos);
if ($code == 1) {
	
		$_SESSION['tipo']=$datos->getEmail();
	}else{
		echo "Contraseña incorrecta";
		echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
		exit();
	}
}
?>
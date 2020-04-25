<?php
session_start();
include '../global/config.php';
include '../global/conexion.php';
	//si recibimos un $_Post
	if($_POST){
		//si recibimos un $_Post con opcion
		if (isset($_POST['opcion'])) {
			//si la opcion es registrar añadimos fichero de registro
			if ($_POST['opcion']=="Registrar") {
				include("Usuarios/registro.php");


			//si la opcion es iniciar añadimos fichero de inicio de sesion
			}elseif ($_POST['opcion']=="Iniciar") {
				include("Usuarios/Sesion.php");
				header("Location:".$_SERVER['HTTP_REFERER']);
			//si la opcioon es cerrar sesion añadimos fichero de cerrar sesion
			}elseif ($_POST['opcion']=="Cerrar Sesion") {
				include("../Usuarios/cerrar.php");
				header("Location:".$_SERVER['HTTP_REFERER']);
			}
		}
		
	}

if (isset($_POST['btnaccion'])) {
	if ($_POST['btnaccion'] == 'Agregar') {
		include("Carrito.php");
		$CATEGORIA=openssl_decrypt($_POST['categoria'],COD,KEY);
		if($CATEGORIA == "Sobremesa"){
			header('location: ../sobremesa.php');
		}elseif ($CATEGORIA == "Portatil") {
			header('location: ../Portatiles.php');
		}elseif ($CATEGORIA == "Movil") {
			header('location: ../moviles.php');
		}
		
	}elseif ($_POST['btnaccion'] == 'Eliminar') {
		include("Eliminar.php");
		header("Location:".$_SERVER['HTTP_REFERER']);
	}
}
	
?>
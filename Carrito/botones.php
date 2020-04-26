<?php
ob_start();
session_start();
include '../Global/config.php';
include '../Global/conexion.php';
	//si recibimos un $_Post
	if($_POST){
		//si recibimos un $_Post con opcion
		if (isset($_POST['opcion'])) {
			//si la opcion es registrar añadimos fichero de registro
			if ($_POST['opcion']=="Registrar") {
				include("Usuarios/registro.php");


			//si la opcion es iniciar añadimos fichero de inicio de sesion
			}elseif ($_POST['opcion']=="Iniciar") {
				include("../Usuarios/Sesion.php");
				header("Location:".$_SERVER['HTTP_REFERER']);
			//si la opcioon es cerrar sesion añadimos fichero de cerrar sesion
			}elseif ($_POST['opcion']=="Cerrar Sesion") {
				include("../Usuarios/cerrar.php");
				header("Location:".$_SERVER['HTTP_REFERER']);
			}
		}
		
	
		//si recibimos un $_Post con opcion
		if (isset($_POST['btnaccion'])) {
			//comprobamos si la opcion es agregar
			if ($_POST['btnaccion'] == 'Agregar') {
				//llamamos a Carrito.php que es donde estan las funciones para agregar
				include("Carrito.php");
				//volvemos a la pagina
				header("Location:".$_SERVER['HTTP_REFERER']);
			//comprobamos si la opcion es agregar
			}elseif ($_POST['btnaccion'] == 'Eliminar') {
				//llamamos a eliminar.php que es donde estan las funciones para eliminar
				include("Eliminar.php");
				//volvemos a la pagina
				header("Location:".$_SERVER['HTTP_REFERER']);
			}
		}
	}
ob_end_flush();
?>
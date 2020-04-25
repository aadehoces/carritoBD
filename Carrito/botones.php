<?php
session_start();
include '../global/config.php';
include '../global/conexion.php';
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
		
	}
?>
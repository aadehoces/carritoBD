<?php
//añadimos la cabecera 
 include("Templates/Cabecera.php")
?>
<!-- pagina de comprobacion del pago-->
<?php
	if (isset($_SESSION['realizado'])) {
		//si el pago se ha realizado correctamente se guarda el pedido en la base de datos
		require_once("pago/datosPago.php");
		require_once("pago/gestionPago.php");
		$pago=new pago;
		$gestion=new gestionPago;
		$pago->setPedido($_GET['paymentToken']);
		$pago->setTotal($_SESSION['total']);
		$pago->setFecha(date("Y-m-d"));
		$pago->setDni($_SESSION['dni']);
		$pago->setForma($_SESSION['pago']);
		$gestion->pedido($pago);
		$gestion->realiza($pago);
		$gestion->linea_pedido($pago,$_SESSION['CARRITO']);
		setcookie('pedido',$_GET['paymentToken'],time()+60*60,"/");
?>
		<h2>¡Compra realizada con éxito!</h2>
		<p>Recibirá su pedido en breve.</p>
		<!--Enlace al pdf-->
		<p>Descarge su recibo <a target="_blank" href="recibo.php">aquí</a>.</p>
<?php	
	}else{
		header('Location: index.php');
	}
?>

<?php
unset($_SESSION['realizado']);
unset($_SESSION['total']);
unset($_SESSION['CARRITO']);

//añadimos el pie de página
 include("Templates/Pie.php")
?>
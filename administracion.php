<?php
//añadimos la cabecera 
 include("Templates/Cabecera.php")
?>
<?php
	if (isset($_SESSION['tipo'])) {
		if ($_SESSION['tipo']=="Administrador") {?>
			<h1>En construccion</h1>	
<?php 
		}else{
		echo "Acceso no permitido, debes de ser administrador";
		}
	}else{
		echo "Acceso no permitido, debes de ser administrador";
	}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
// Cierra el almacenamiento en búfer de la salida
ob_end_flush();
?>
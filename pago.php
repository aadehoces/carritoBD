<?php
//añadimos la cabecera 
 include("Templates/Cabecera.php")
?>
<?php
	if (isset($_POST['Pago'])) {
		require_once('Usuarios/datos.php');
		require_once("Usuarios/gestion.php");
		$gestion= new gestion();
		$datos= new datos();
		
		if ($_POST['Pago']=="Cambios") {
			$datos->setDireccion($_POST['Direccion']);
			$datos->setLocalidad($_POST['Localidad']);
			$datos->setProvincia($_POST['Provincia']);
			$datos->setPostal($_POST['Postal']);
			$code=$gestion->actualizarDireccion($datos,$_SESSION['email']);
			if ($code == 1) {?>
				<div class="alert alert-success" role="alert">
		  			Dirección cambiada con éxito		
				</div>
			<?php }else{ ?>
				<div class="alert alert-danger" role="alert">
		  			Ocurrió algún problema al cambiar la dirección, intentelo de nuevo		
				</div>
				
			<?php }
			
		}
		$gestion->consulta($datos,$_SESSION['email']);

?>
			<div class="container">
				<div class="row border mt-2 p-2 bg-light mb-2">
					<div class="col-12">
						<h3>Dirección de envío</h3>
					</div>
					
					<div class="col-12">
						
						<?php
						if ($_POST['Pago']=="Editar") {?>
						<form action="pago.php" method="POST">
							<div class="form-row">
								<div class="form-group col-5">
									<label>Dirección: </label>
									<input type="text" class="form-control" name="Direccion" value="<?php echo $datos->getDireccion()?>">
								</div>
								<div class="form-group col-5">
									<label>Localidad: </label>
							 		<input type="text" class="form-control" name="Localidad" value="<?php echo $datos->getLocalidad()?>">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-5">
									<label>Provincia: </label>
									<input type="text" class="form-control" name="Provincia" value="<?php echo $datos->getProvincia()?>">
								</div>
								<div class="form-group col-5">
									<label>Código Postal: </label>
									<input type="number" class="form-control" name="Postal" value="<?php echo $datos->getPostal()?>">
								</div>	
							</div>

							<button class="btn btn-primary mb-2" type="submit" name="Pago" value="Cambios">
								Guardar Cambios
							</button>
						</form>	
						 		
						
						 	
						<?php } else{
						 	echo $datos->getDireccion().", ".$datos->getLocalidad().", ".$datos->getProvincia().", ".$datos->getPostal();
						 	?>
						
					</div>
					<div class="col-12 m-2">
						<form action="pago.php" method="post">
						<button class="btn btn-warning" type="submit" name="Pago" value="Editar">Editar
						</button>
					</form>
					<?php }?>
					</div>
				</div>
			</div>
		<?php }else{
			header("Location: index.php");
		}
?>
<?php
//añadimos el pie de página
 include("Templates/Pie.php")
?>
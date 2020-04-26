<?php
//añadimos la cabecera 
 include("Templates/Cabecera.php")
?>
</div>
<div class="container-fluid">
<?php
	//se comprueba si está logueado y el tipo de usuario 
	if (isset($_SESSION['tipo'])) {
		if ($_SESSION['tipo']=="Administrador") {
			$db=Db::conectar();
			$sentencia=$db->prepare("SELECT * FROM " .BD.".productos ");
			$sentencia->execute();
			$productos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
			//si es administrador se muestra la pagina?>
			<h4>Usuarios</h4>
			<table class="table table-striped text-center">
				<thead>
					<tr>
						<th scope="col">Nombre</th>
						<th scope="col">Descripcion</th>
						<th scope="col">Categoria</th>
						<th scope="col">Imagen</th>
						<th scope="col">Precio</th>
						<th scope="col">Editar</th>
						<th scope="col">Eliminar</th>
					</tr>
				</thead>
				<tbody>	
					<?php
						foreach ($productos as $key => $producto) {?>
							<tr>
								<th><?php echo $producto['Nombre']?></th>
								<th><?php echo $producto['Descripcion']?></th>
								<th><?php echo $producto['Categoria']?></th>
								<th><?php echo $producto['Imagen']?></th>
								<th><?php echo $producto['Precio']?></th>
								
							
							<form action="Carrito/botones.php" method="POST">
								<td>
									<button class="btn btn-warning " name="Productos" value="Editar" type="submit">Editar</button>
								</td>
								<td>
									<button class="btn btn-danger " name="Productos" value="Eliminar" type="submit">Eliminar</button>
								</td>
							</form>
							</tr>
					<?php } ?>
					
				</tbody>
			</table>
<?php 
		}else{
		echo "Acceso no permitido, debes de ser administrador";
		}
	}else{
		echo "Acceso no permitido, debes de ser administrador";
	}
?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
// Cierra el almacenamiento en búfer de la salida
ob_end_flush();
?>
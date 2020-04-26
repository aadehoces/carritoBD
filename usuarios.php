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
			$sentencia=$db->prepare("SELECT * FROM " .BD.".usuarios join " .BD.".Rol using (id_Rol) ");
			$sentencia->execute();
			$usuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);
			//si es administrador se muestra la pagina?>
			<h4>Usuarios</h4>
			<table class="table table-striped text-center">
				<thead>
					<tr>
						<th scope="col">Nombre</th>
						<th scope="col">Apellidos</th>
						<th scope="col">DNI</th>
						<th scope="col">Fecha Nacimiento</th>
						<th scope="col">Teléfono</th>
						<th scope="col">Dirección</th>
						<th scope="col">Provincia</th>
						<th scope="col">Localidad</th>
						<th scope="col">Código Postal</th>
						<th scope="col">Email</th>
						<th scope="col">Contraseña</th>
						<th scope="col">Tipo</th>
						<th scope="col">Editar</th>
						<th scope="col">Eliminar</th>
					</tr>
				</thead>
				<tbody>	
					<?php
						foreach ($usuarios as $key => $usuario) {?>
							<tr>
								<th><?php echo $usuario['Nombre']?></th>
								<td><?php echo $usuario['Apellidos']?></td>
								<td><?php echo $usuario['DNI']?></td>
								<td><?php echo $usuario['Fecha_nac']?></td>
								<td><?php echo $usuario['Telefono']?></td>
								<td><?php echo $usuario['Direccion']?></td>
								<td><?php echo $usuario['Provincia']?></td>
								<td><?php echo $usuario['Localidad']?></td>
								<td><?php echo $usuario['Cod_postal']?></td>
								<td><?php echo $usuario['Email']?></td>
								<td><?php echo $usuario['Contraseña']?></td>
								<td><?php echo $usuario['Descripcion']?></td>
							
							<form action="Carrito/botones.php" method="POST">
								<td>
									<button class="btn btn-warning " name="Usuarios" value="Editar" type="submit">Editar</button>
								</td>
								<td>
									<button class="btn btn-danger " name="Usuarios" value="Eliminar" type="submit">Eliminar</button>
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
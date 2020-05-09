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
						<th scope="col">Actualizar</th>
						<th scope="col">Eliminar</th>
					</tr>
				</thead>
				<tbody>	
					<?php
						foreach ($usuarios as $key => $usuario) {?>
							<tr>
								<form action="Carrito/botones.php" method="POST">
								<th><input type="text" class="form-control" name="Nombre" value="<?php echo $usuario['Nombre']?>" required></th>
								<td><input type="text" class="form-control" name="Apellidos" value="<?php echo $usuario['Apellidos']?>" required></td>
								<td><input type="hidden" class="form-control" name="DNI" required value="<?php echo $usuario['DNI']?>"><?php echo $usuario['DNI']?></td>
								<td><input type="date" class="form-control" name="Fecha_nac" value="<?php echo $usuario['Fecha_nac']?>" required></td>
								<td><input type="number" class="form-control" name="Telefono" value="<?php echo $usuario['Telefono']?>" required></td>
								<td><input type="text" class="form-control" name="Direccion" value="<?php echo $usuario['Direccion']?>" required></td>
								<td><input type="text" class="form-control" name="Provincia" value="<?php echo $usuario['Provincia']?>" required></td>
								<td><input type="text" class="form-control" name="Localidad" value="<?php echo $usuario['Localidad']?>" required></td>
								<td><input type="number" class="form-control" name="Cod_postal" value="<?php echo $usuario['Cod_postal']?>" required></td>
								<td><input type="text" name="Email" value="<?php echo $usuario['Email']?>" required class="form-control"></td>
								<td><input type="text" class="form-control" name="Contraseña" value="<?php echo $usuario['Contraseña']?>" required >
								</td>
								<td>
									<select name="Tipo">
										<option selected value="<?php echo $usuario['Descripcion']?>"><?php echo $usuario['Descripcion']?></option>
										<?php
											if ($usuario['Descripcion']!="Cliente") {?>
												<option value="Cliente">Cliente</option>
											<?php }

											if ($usuario['Descripcion']!="Administrador") {?>
												<option value="Administrador">Administrador</option>
											<?php }
										?>
										
										
	 								</select></td>
							
							
								<td>
									<button class="btn btn-warning " name="Usuarios" value="Actualizar" type="submit">Actualizar</button>
								</td>
								<td>
									<button class="btn btn-danger " name="Usuarios" value="Eliminar" type="submit">Eliminar</button>
								</td>
							</form>
							</tr>
					<?php } ?>
					<tr>
								<form action="Carrito/botones.php" method="POST">
								<th><input type="text" class="form-control" name="Nombre" required></th>
								<td><input type="text" class="form-control" name="Apellidos"  required></td>
								<td><input type="text" class="form-control" name="DNI" required></td>
								<td><input type="date" class="form-control" name="Fecha_nac" required></td>
								<td><input type="number" class="form-control" name="Telefono" required></td>
								<td><input type="text" class="form-control" name="Direccion" required></td>
								<td><input type="text" class="form-control" name="Provincia" required></td>
								<td><input type="text" class="form-control" name="Localidad" required></td>
								<td><input type="number" class="form-control" name="Cod_postal" required></td>
								<td><input type="text" name="Email" required class="form-control"></td>
								<td><input type="text" class="form-control" name="Contraseña" required="" >
								</td>
								<td>
									<select name="Tipo">
										<option selected ></option>
										<option value="Cliente">Cliente</option>
										<option value="Administrador">Administrador</option>
	 								</select>
	 							</td>
							
							
								<td></td>
								<td>
									<button class="btn btn-success " name="Usuarios" value="Nuevo" type="submit">Añadir</button>
								</td>
							</form>
							</tr>
					
				</tbody>
			</table>

<?php 
		if (isset($_SESSION['mensaje']) && !empty($_SESSION['mensaje']) ) {?>
			<div class="alert alert-primary" role="alert">
  				<?php echo $_SESSION['mensaje']; 
  				$_SESSION['mensaje']="";
  				?>
			</div>
			
		<?php }
		}else{
			//si no eres administrador
		header("Location: index.php");
		}
	}else{
		//si no estas logueado
		?>
		<div class="container ">
			<div class="row justify-content-center mt-5">
			<div class="col-5 border rounded border-dark">
				<div class="row">
					<div class="col-12 bg-primary p-3 text-white">
						<h4>Debes de iniciar sesión para continuar en esta página</h4>
					</div>
					
				</div>
				<div class="row">
					<div class="col-12 p-3">
						<form class="validar" validate method="POST" action="Carrito/botones.php">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Introduce tu email" required pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
							</div>
							<div class="form-group">
								<label for="contraseña">Contraseña:</label>
								<input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Introduce tu contraseña" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
							</div>
							<input class="btn btn-primary " value="Iniciar" type="submit" name="opcion">
						</form>
					</div>
				</div>
			</div>
		</div>
		</div>
		<?php
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
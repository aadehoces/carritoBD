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
			$sentencia=$db->prepare("SELECT * FROM " .BD.".Productos ");
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
						<th scope="col">Actualizar</th>
						<th scope="col">Eliminar</th>
					</tr>
				</thead>
				<tbody>	
					<?php
						foreach ($productos as $key => $producto) {?>
							<tr>
								<form action="Carrito/botones.php" method="POST" enctype="multipart/form-data">
								<th><input type="text" class="form-control" name="Nombre" value="<?php echo $producto['Nombre']?>"></th>
								<th><input type="text"class="form-control"  name="Descripcion" value="<?php echo $producto['Descripcion']?>"></th>
								<th>
									<select class="form-control" name="Categoria">
										<option selected  value="<?php echo $producto['Categoria']?>"><?php echo $producto['Categoria']?></option>
										<option value="Sobremesa">Sobremesa</option>
										<option value="Portatil">Portatil</option>
										<option value="Movil">Movil</option>
	 								</select>
								</th>
								<th><input type="hidden" name="MAX_FILE_SIZE" value="512000" />
								<input name="Imagen" type="file" /></th>
								<th><input type="text" class="form-control" name="Precio" value="<?php echo $producto['Precio']?>"></th>
								<input type="hidden" class="form-control" name="Id" value="<?php echo $producto['id_Productos']?>">
							
							
								<td>
									<button class="btn btn-warning " name="Productos" value="Actualizar" type="submit">Actualizar</button>
								</td>
								<td>
									<button class="btn btn-danger " name="Productos" value="Eliminar" type="submit">Eliminar</button>
								</td>
							</form>
							</tr>
					<?php } ?>
					<tr>
								<form enctype="multipart/form-data" action="Carrito/botones.php" method="POST">
								<th><input type="text" class="form-control" name="Nombre" required=""></th>
								<th><input type="text" class="form-control" name="Descripcion" required></th>
								<th>
									<select name="Categoria" class="form-control" required="">
										<option selected ></option>
										<option value="Sobremesa">Sobremesa</option>
										<option value="Portatil">Portatil</option>
										<option value="Movil">Movil</option>
	 								</select>
								</th>
								<th><input type="hidden" name="MAX_FILE_SIZE" value="512000" />
								<input name="Imagen" type="file"  required /></th>
								<th><input type="text" class="form-control" name="Precio" required></th>
													
							
								<td>
									
								</td>
								<td>
									<button class="btn btn-success " name="Productos" value="Nuevo" type="submit">Añadir</button>
								</td>
							</form>
							</tr>
					
				</tbody>
			</table>
<?php 
		//comprobamos si tenemos la variable de session mensaje creado y si está, la mostramos
		if (isset($_SESSION['mensaje']) && !empty($_SESSION['mensaje']) ) {?>
			<div class="alert alert-primary" role="alert">
  				<?php echo $_SESSION['mensaje']; 
  				$_SESSION['mensaje']="";
  				?>
			</div>
			
		<?php }
		}else{
		//si no eres adminstrador
		header("Location: index.php");
		}

	}else{
		//si no estás logueado
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
<?php
//añadimos la cabecera 
 include("Templates/cabecera.php")
?>
<?php
	$db=Db::conectar();
	$sentencia=$db->prepare("SELECT * FROM productos where categoria = 'Portatil'");
	$sentencia->execute();
	$listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<?php foreach($listaProductos as $producto){ ?>
	<div class="col-md-4 col-sm-6 p-2">
		<img src="<?php echo $producto['Imagen'] ?>" class="img-fluid">
		<div class="bg-light p-2 rounded">
			<h4><?php echo $producto['Nombre'] ?></h4>
			<h5><?php echo $producto['Descripcion'] ?></h5>
			<p>Precio: <?php echo $producto['Precio'] ?>€</p>
			<form method="post" action="Carrito/botones.php">
				<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id_Productos'],COD,KEY); ?>">
				<input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'],COD,KEY); ?>">
				<input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'],COD,KEY); ?>">
				<input type="hidden" name="categoria" id="Categoria" value="<?php echo openssl_encrypt($producto['Categoria'],COD,KEY); ?>">
				<label>Cantidad: </label>
				<input type="number" name="cantidad" min="1" max="10" size="1" required value="1">
				<br>
				<button class="btn btn-primary mt-2" name="btnaccion" value="Agregar" type="submit">Añadir a la cesta </button>
			</form>
				
		</div> 
	</div>
<?php } ?>
<?php
//añadimos el pie de página
 include("Templates/Pie.php")
?>
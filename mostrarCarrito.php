<?php
//añadimos la cabecera 
 include("Templates/cabecera.php")
?>
<h3>Productos</h3>
<?php
	if (isset($_SESSION['tipo'])) {
		if(!empty($_SESSION['CARRITO'])){?>
			<?php $total=0;?>
			<table class="table text-center table-striped">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">Nombre</th>
				  <th scope="col">Cantidad</th>
				  <th scope="col">Precio</th>
				  <th scope="col">Total</th>
				  <th scope="col">---</th>
				</tr>
			  </thead>
			  <tbody>
			<?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
				<tr>
					<th scope="row"><?php echo $producto['NOMBRE']; ?></th>
					<td><?php echo $producto['CANTIDAD']; ?></td>
					<td><?php echo $producto['PRECIO']; ?>€</td>
					<td><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2) ; ?></td>
					<td>
						<form action="Carrito/botones.php" method="post">
				
							<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
							<button class="btn btn-primary" type="submit" name="btnaccion" value="Eliminar">Eliminar</button>
				
						</form>
					</td>
				</tr>
			
			<?php } ?>
			  </tbody>
			</table>
<?php        
		}else{
			echo "No hay prductos en el carrito";
		}
	}else{
		$data=unserialize($_COOKIE['CARRITO'],["allowed_classes" => true]);
		if (!empty($data)) {?>
			<?php $total=0;?>
			<table class="table text-center table-striped">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">Nombre</th>
				  <th scope="col">Cantidad</th>
				  <th scope="col">Precio</th>
				  <th scope="col">Total</th>
				  <th scope="col">---</th>
				</tr>
			  </thead>
				  <?php
				  
				  foreach ($data as $key => $producto) {?>
					 <tr>
					<th scope="row"><?php echo $producto['NOMBRE']; ?></th>
					<td><?php echo $producto['CANTIDAD']; ?></td>
					<td><?php echo $producto['PRECIO']; ?>€</td>
					<td><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2) ; ?></td>
					<td>
						<form action="Carrito/botones.php" method="post">
				
							<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
							<button class="btn btn-primary" type="submit" name="btnaccion" value="Eliminar">Eliminar</button>
				
						</form>
					</td>
				</tr>
	
			  <?php }?>
			  <tbody>
				 </tbody>
			</table>
			<div class="alert alert-primary" role="alert">
				Inicia Sesión para pagar...
			</div>
<?php    	}else{
			echo "No hay prductos en el carrito";
		}
	}
?>
<?php
//añadimos el pie de página
 include("Templates/Pie.php")
?>
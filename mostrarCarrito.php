<?php
//añadimos la cabecera 
 include("Templates/Cabecera.php")
?>
<h3>Productos</h3>
<?php
//se comprueba si está logueado para mostrarle el carrito de su sesion
	if (isset($_SESSION['tipo'])) {
		//se comprueba si está vacio
		if(!empty($_SESSION['CARRITO'])){?>
			<?php $total=0;
			//si no está vacio se muestra los productos?>
			<table class="table text-center table-striped">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">Nombre</th>
				  <th scope="col">Cantidad</th>
				  <th scope="col">Precio</th>
				  <th scope="col">Total</th>
				  <th scope="col"></th>
				</tr>
			  </thead>
			  <tbody>

			<?php
				//se muestran los productos 
				foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
				<tr>
					<th scope="row"><?php echo $producto['NOMBRE']; ?></th>
					<td><?php echo $producto['CANTIDAD']; ?></td>
					<td><?php echo $producto['PRECIO']; ?>€</td>
					<td><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2) ; ?></td>
					<td>
						<form action="Carrito/botones.php" method="post">
				
							<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
							<button class="btn btn-danger" type="submit" name="btnaccion" value="Eliminar">Eliminar</button>
				
						</form>
						<?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);?>
					</td>
				</tr>
				
			<?php } ?>
				<tr>
					<td></td>
					<td></td>
					<td><h4>Total</h4></td>
					<td><h4><?php 
					$_SESSION['total']=$total;
					echo number_format($total,2);?>€</h4></td>
					<form action="pago.php" method="post">
						<td>
						<button class="btn btn-primary" data-toggle="popover" data-trigger="hover" data-content="Inicia sesión para continuar" type="submit" name="Pago" value="Tramitar">Tramitar Pedido
						</button>
						</td>
					</form>

				</tr>
			  </tbody> 
			</table>

<?php        
		}else{
			//si está vacio se muestra lo siguiente
			echo "No hay prductos en el carrito";
		}
	}else{
		//si no ha iniciado session se realiza lo siguiente
		//se comprueba si está creada la cookie carrito
		if (isset($_COOKIE['CARRITO'])) {
			//si está creada se guarda los datos en al variable data
			$data=unserialize($_COOKIE['CARRITO'],["allowed_classes" => true]);
			//si hay contenido se muestran los productos
			if (!empty($data)) {?>

				<?php $total=0;?>
				<table class="table text-center table-striped">
				  <thead class="thead-dark">
					<tr>
					  <th scope="col">Nombre</th>
					  <th scope="col">Cantidad</th>
					  <th scope="col">Precio</th>
					  <th scope="col">Total</th>
					  <th scope="col"></th>
					</tr>
				  </thead>
				   <tbody>
					  <?php
					  
					  foreach ($data as $key => $producto) {?>
						 <tr>
						<th scope="row"><?php echo $producto['NOMBRE']; ?></th>
						<td><?php echo $producto['CANTIDAD']; ?></td>
						<td><?php echo $producto['PRECIO']; ?>€</td>
						<td><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2) ; ?>€</td>
						<td>
							<form action="Carrito/botones.php" method="post">
					
								<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
								<button class="btn btn-danger" type="submit" name="btnaccion" value="Eliminar">Eliminar</button>
					
							</form>
							 <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);?>
						</td>
					</tr>
		
				  <?php }?>
					<tr>
						<td></td>
						<td></td>
						<td><h4>Total</h4></td>
						<td><h4><?php echo number_format($total,2);?>€</h4></td>
						<td>
							Inicia sesión para pagar							
						</td>
					</tr>
				 
					 </tbody>
				</table>
	<?php    	}else{
				//si no hay productos en la cookie carrito se muestra lo siguiente:
					echo "No hay prductos en el carrito";
				}
		}else{
			//si la cookie carrito no está creada se muestra lo siguiente:
			echo "No hay prductos en el carrito";
		}
	}
?>

<?php
//añadimos el pie de página
 include("Templates/Pie.php")
?>
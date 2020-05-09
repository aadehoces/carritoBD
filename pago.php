<?php
//añadimos la cabecera 
 include("Templates/Cabecera.php")
?>
<?php
//Comprobamos si tenemos la variable $_POST['Pago'], si está se muestra el contenido de la página si no te redirecciona al index
	if (isset($_POST['Pago'])) {
		require_once('Usuarios/datos.php');
		require_once("Usuarios/gestion.php");
		$gestion= new gestion();
		$datos= new datos();
		
		if ($_POST['Pago']=="Cambios") {
			//atualizamos la direccion de envio
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
		//consulta para mostrar la direccion de envío
		$gestion->consulta($datos,$_SESSION['email']);

?>
			<div class="container">
				<div class="row border mt-2 p-2 bg-light mb-2">
					<div class="col-12">
						<h3>Dirección de envío</h3>
					</div>
					
					<div class="col-12">
						
						<?php
						//Contenido a mostrar si le hemos dado a editar direccion de envío
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
								
						
						
						<?php
						//contenido a mostrar si no le damos a editar direccion
						} else{
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
				<div class="row ">
					<div class="col-12 ">
						<h3>Método de pago</h3>
					</div>
					<div class="col-3 mb-2">

						<?php 
						if ($_POST['Pago']!="Editar") {
							//boton de paypal
							?>						
							<div id="paypal-button-container"></div>
						<?php } ?>
						

					</div>
				</div>
			</div>
		<?php }else{
			header("Location: index.php");
		}
?>
<!-- Funciones de paypal--->
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<script>
    paypal.Button.render({
        env: 'sandbox', // sandbox | production
        style: {
            label: 'checkout',  // checkout | credit | pay | buynow | generic
            size:  'responsive', // small | medium | large | responsive
            shape: 'pill',   // pill | rect
            color: 'gold'   // gold | blue | silver | black
        },
 
        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create
 
        client: {
            sandbox:    'Aa6DUuFGqE7R6g6t3x9loWbCCla-WO79cZKZxMGHlh9LzfxUsgCRWD59DxwNc3qyPOI9mqqV4EFrAT52',
            production: 'AcEc36TDKPXS_m7ZDWvGeW7WuWscsYnU35w-IAQ9D0q16-XrN5wf1Pk4DSTCTNGtQcP5tWXXTl_XIJzZ'
        },
 
        // Wait for the PayPal button to be clicked
 
        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '<?php echo $_SESSION['total']?>', currency: 'EUR' },
                            description:"Compra de productos a Zykrex:<?php echo number_format($_SESSION['total'],2)?>€",
                            custom:"Codigo"
                        }
                    ]
                }
            });
        },
 
        // Wait for the payment to be authorized by the customer
 
        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                console.log(data);
                <?php
                	$_SESSION['pago']="paypal";
                	$_SESSION['realizado']="true"
                ?>
                window.location="verificador.php?paymentToken="+data.paymentToken+"&paymentID="+data.paymentID;
            });
        }
   
    }, '#paypal-button-container');
 
</script>
<?php
//añadimos el pie de página
 include("Templates/Pie.php")
?>
<?php
if (isset($_SESSION['tipo'])) {
	if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
		$ID=openssl_decrypt($_POST['id'],COD,KEY);
				
		foreach($_SESSION['CARRITO'] as $indice => $producto){
			if($producto['ID']==$ID){
				unset($_SESSION['CARRITO'][$indice]);
				echo "<script>alert('Elemento borrado....')</script>";

			}
		}
	}
}else{
	if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
		$ID=openssl_decrypt($_POST['id'],COD,KEY);
		$data=unserialize($_COOKIE['CARRITO'],["allowed_classes" => true]);
		setcookie('CARRITO',serialize($data),time()-30000,"/");
		foreach($data as $indice => $producto){
			if($producto['ID']==$ID){
				unset($data[$indice]);
			}
		}
		}
		setcookie('CARRITO',serialize($data),time()+30000,"/");
	}
?>
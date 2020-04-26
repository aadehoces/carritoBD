<?php
//desencriptamos la id del producto a eliminar
if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
	$ID=openssl_decrypt($_POST['id'],COD,KEY);
}
//se comprueba si ha iniciado sesion
if (isset($_SESSION['tipo'])) {
	//si ha iniciado se busca el producto con el id en la variable de sesion carrito  y se borra
	foreach($_SESSION['CARRITO'] as $indice => $producto){
		if($producto['ID']==$ID){
			unset($_SESSION['CARRITO'][$indice]);
		}
	}
}else{
	//si no se ha iniciado sesion se guarda el contenido de la cookie carrito en una variable y se borra la cookie
	$data=unserialize($_COOKIE['CARRITO'],["allowed_classes" => true]);
	setcookie('CARRITO',serialize($data),time()-30000,"/");
	//se busca el prodcuto en la variable y se borra
	foreach($data as $indice => $producto){
		if($producto['ID']==$ID){
			unset($data[$indice]);
		}
	}
	//si la variable no queda vacia se vuelve a crear la cookie carrito
	if (!empty($data)) {
		setcookie('CARRITO',serialize($data),time()+30000,"/");
	}	
}
?>
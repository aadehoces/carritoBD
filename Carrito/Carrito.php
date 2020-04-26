<?php

//desencriptamos los valores de los productos
if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
	$ID=openssl_decrypt($_POST['id'],COD,KEY);
}
if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
	$NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
}
if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
	$PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);

}if (isset($_POST['cantidad'])) {
	$CANTIDAD=$_POST['cantidad'];
}
//comprobamos si hemos iniciado sesion
if(isset($_SESSION['tipo'])){
	//comprobamos si se ha creado el carrito de sesion
	if(!isset($_SESSION['CARRITO'])){
		//si no se ha creado creamos el carrito añadiendo el producto
		$producto=array(
			'ID'=>$ID,
			'NOMBRE'=>$NOMBRE,
			'CANTIDAD'=>$CANTIDAD,
			'PRECIO'=>$PRECIO,
		);
		$_SESSION['CARRITO'][0]=$producto;
		$mensaje="Producto agregado al carrito";
	}else{
		//si ya estaba creado el carrito comprobamos si el producto ya estaba en el carro
		$idProductos=array_column($_SESSION['CARRITO'],"ID");
		if(in_array($ID,$idProductos)){
			//si el producto ya estaba en el carrito aumentamos la cantidad de ese producto
			foreach($_SESSION['CARRITO'] as $indice=>$producto){
				if ($producto['ID'] == $ID) {
					$CANTIDAD=$producto['CANTIDAD'] + $CANTIDAD;
					$producto=array(
						'ID'=>$ID,
						'NOMBRE'=>$NOMBRE,
						'CANTIDAD'=>$CANTIDAD,
						'PRECIO'=>$PRECIO,
					);
					$_SESSION['CARRITO'][$indice]=$producto;	
				}
			}
		}else{
			//si no estaba en el carrito añadimos el producto en su lugar
			$numeroProductos=count($_SESSION['CARRITO']);
			$producto=array(
				'ID'=>$ID,
				'NOMBRE'=>$NOMBRE,
				'CANTIDAD'=>$CANTIDAD,
				'PRECIO'=>$PRECIO,
			);
			$_SESSION['CARRITO'][$numeroProductos]=$producto;
			$mensaje="Producto agregado al carrito";
		};
	}
}else{
	//si no habia iniciado sesion comprobamos si está vacio el carrito de la cookies
	if (empty($_COOKIE['CARRITO'])) {
		//si está vacio añadimos el producto en un array y creamos la cookie con ese array
		$data=array();
		$data[0]=array(
			'ID'=>$ID,
			'NOMBRE'=>$NOMBRE,
			'CANTIDAD'=>$CANTIDAD,
			'PRECIO'=>$PRECIO,
		);
		
		setcookie('CARRITO',serialize($data),time()+30000,"/");

	}else{
		//si no estaba vacio comprobamos si el producto ya estaba en el carrito
		//para ello guardamos el contenido de la cookie en la variable y data y borramos la cookie
		$data=unserialize($_COOKIE['CARRITO'],["allowed_classes" => true]);
		setcookie('CARRITO',serialize($data),time()-30000,"/");
		$idProductos=array_column($data,"ID");
		if(in_array($ID,$idProductos)){
			//si el prodcuto ya estaba sumamos la cantidad de ese producto y volvemos a crear la cookie con el  contenido de data
			foreach($data as $indice=>$producto){
				if ($producto['ID'] == $ID) {
					$CANTIDAD=$producto['CANTIDAD'] + $CANTIDAD;
					$producto=array(
						'ID'=>$ID,
						'NOMBRE'=>$NOMBRE,
						'CANTIDAD'=>$CANTIDAD,
						'PRECIO'=>$PRECIO,
					);
					$data[$indice]=$producto;
					setcookie('CARRITO',serialize($data),time()+30000,"/");	
				}
			}
		}else{
			//si el producto no estaba en el carrito añadimos el producto en el array y volvemos a crear la cookie
			$numeroProductos=count($data);
			$data[$numeroProductos]=array(
				'ID'=>$ID,
				'NOMBRE'=>$NOMBRE,
				'CANTIDAD'=>$CANTIDAD,
				'PRECIO'=>$PRECIO,
			);;
			
			setcookie('CARRITO',serialize($data),time()+30000,"/");	
		};
		
	}
}

?>
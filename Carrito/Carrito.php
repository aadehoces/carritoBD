<?php
$mensaje="";
if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
	$ID=openssl_decrypt($_POST['id'],COD,KEY);
	$mensaje.="OK id correcto ".$ID."<br/>";
}else{
	$mensaje.="Upss... id incorrecto ".$ID."<br/>";
	exit();
}
if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
	$NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
	$mensaje.="OK nombre correcto ".$NOMBRE."<br/>";

}else{
	$mensaje.="Upss... nombre incorrecto ".$ID."<br/>";
	exit();
}
if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
	$PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
	$mensaje.="OK precio correcto ".$PRECIO."<br/>";
}else{
	$mensaje.="Upss... precio incorrecto ".$ID."<br/>";
	exit();
}if (isset($_POST['cantidad'])) {
	$CANTIDAD=$_POST['cantidad'];
}
if(isset($_SESSION['tipo'])){
	if(!isset($_SESSION['CARRITO'])){
		$producto=array(
			'ID'=>$ID,
			'NOMBRE'=>$NOMBRE,
			'CANTIDAD'=>$CANTIDAD,
			'PRECIO'=>$PRECIO,
		);
		$_SESSION['CARRITO'][0]=$producto;
		$mensaje="Producto agregado al carrito";
	}else{
		$idProductos=array_column($_SESSION['CARRITO'],"ID");
		if(in_array($ID,$idProductos)){
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
	if (!isset($_COOKIE['CARRITO'])) {
		
		$producto=array(
			'ID'=>$ID,
			'NOMBRE'=>$NOMBRE,
			'CANTIDAD'=>$CANTIDAD,
			'PRECIO'=>$PRECIO,
		);
		$_COOKIE['CARRITO'][0]=$producto;
		setcookie('CARRITO',serialize($producto),time()+30000);
	}else{
		$data=unserialize($_COOKIE['CARRITO'])
		$idProductos=array_column($data,"ID");
		if(in_array($ID,$idProductos)){
			foreach($_COOKIE['CARRITO'] as $indice=>$producto){
				if ($producto['ID'] == $ID) {
					$CANTIDAD=$producto['CANTIDAD'] + $CANTIDAD;
					$producto=array(
						'ID'=>$ID,
						'NOMBRE'=>$NOMBRE,
						'CANTIDAD'=>$CANTIDAD,
						'PRECIO'=>$PRECIO,
					);
					$data[$indice]=$producto;
					setcookie('CARRITO',serialize($data),time()+30000);	
				}
			}
		}else{
			$numeroProductos=count($_COOKIE['CARRITO']);
			$producto=array(
				'ID'=>$ID,
				'NOMBRE'=>$NOMBRE,
				'CANTIDAD'=>$CANTIDAD,
				'PRECIO'=>$PRECIO,
			);
			$_COOKIE['CARRITO'][$numeroProductos]=$producto;
			$mensaje="Producto agregado al carrito";

		};
		
	}
	foreach($_COOKIE['CARRITO'] as $indice=>$producto){
				echo $producto['ID'];
			}

}

?>
<?php
	require_once('validacion.php');
	require_once('datos.php');
	require_once('gestion.php');
	$validacion=new validar();
	$datos= new datos();
	$gestion= new gestion();

			/*se valida el nombre si devuelve codigo 0: se guarda el nombre
				si el codigo es 1: le pide que introduzca el nombre
				si el codigo es 2: El nombre no cumple los requisitos*/
			$code=$validacion->validarNombre($_POST["nombre"]);
			if ($code==0) {
				$datos->setNombre($_POST["nombre"]);
				
			}elseif ($code==1) {
				$mensaje= "Introduzca nombre";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}elseif ($code==2) {
				$mensaje= "Su nombre no está bien escrito";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}
			/*se valida los apellidos si devuelve codigo 0: se guarda los apellidos
				si el codigo es 1: le pide que introduzca los apellidos
				si el codigo es 2: los apellidos no cumplen los requisitos*/
			$code=$validacion->validarApellidos($_POST['apellidos']);
			if ($code==0) {
				$datos->setApellidos($_POST["apellidos"]);
			}elseif ($code==1) {
				$mensaje= "Introduzca apellidos";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}elseif ($code==2) {
				$mensaje= "Su apellidos no están bien escritos";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}
			//Si la fecha de nacimieto está vacia, se la pide, si no se guarda.
			if (empty($_POST['nacimiento'])) {
				$mensaje= "Introduzca fecha de nacimiento";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}else{
				$datos->setNacimiento($_POST["nacimiento"]);
			}
			/*se valida el DNI si devuelve codigo 0: se guarda el DNI
				si el codigo es 1: le pide que introduzca el DNI
				si el codigo es 2: El DNI no cumple los requisitos*/
			$code=$validacion->validarDni($_POST['dni']);
			if ($code==0) {
				$code2=$gestion->comprobarDni($_POST['dni']);
					if ($code2==1) {
						$mensaje= "Su dni ya ha sido registrado anteriormente";
						setcookie('mensaje',$mensaje,"","/");
						header("Location:".$_SERVER['HTTP_REFERER']);
						exit();
					}else{
						
						$datos->setDni($_POST["dni"]);
				
					}
			}elseif ($code==1) {
				$mensaje= "Introduzca dni";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}elseif ($code==2) {
				$mensaje= "Su dni no está bien escrito";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}

			/*se valida el telefono si devuelve codigo 0: se guarda el telefono
				si el codigo es 1: le pide que introduzca el telefono
				si el codigo es 2: El telefono no cumple los requisitos*/
			$code=$validacion->validarTelefono($_POST['telefono']);
			if ($code==0) {
				$datos->setTelefono($_POST["telefono"]);
			}elseif ($code==1) {
				$mensaje= "Introduzca telefono";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}elseif ($code==2) {
				$mensaje= "Su telefono no está bien escrito";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}

			/*se valida la dirección si devuelve codigo 0: se guarda la dirección
				si el codigo es 1: le pide que introduzca la dirección
				si el codigo es 2: la dirección no cumple los requisitos*/
			$code=$validacion->validarDireccion($_POST['direccion']);
			if ($code==0) {
				$datos->setDireccion($_POST["direccion"]);
			}elseif ($code==1) {
				$mensaje= "Introduzca direccion";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}elseif ($code==2) {
				$mensaje= "Su dirección no está bien escrito";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}

			/*se valida la provincia si devuelve codigo 0: se guarda la provincia
				si el codigo es 1: le pide que introduzca la provincia
				si el codigo es 2: la provincia no cumple los requisitos*/
			$code=$validacion->validarProvincia($_POST['provincia']);
			if ($code==0) {
				$datos->setProvincia($_POST["provincia"]);
			}elseif ($code==1) {
				$mensaje= "Introduzca provincia";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}elseif ($code==2) {
				$mensaje= "Su provincia no está bien escrita";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}

			/*se valida la localidad si devuelve codigo 0: se guarda la localidad
				si el codigo es 1: le pide que introduzca la localidad
				si el codigo es 2: la localidad no cumple los requisitos*/
			$code=$validacion->validarLocalidad($_POST['localidad']);
			if ($code==0) {
				$datos->setLocalidad($_POST["localidad"]);
			}elseif ($code==1) {
				$mensaje= "Introduzca localidad";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}elseif ($code==2) {
				$mensaje= "Su localidad no está bien escrita";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}
			/*se valida el codigo postal si devuelve codigo 0: se guarda el codigo postal
				si el codigo es 1: le pide que introduzca el codigo postal
				si el codigo es 2: El codigo postal no cumple los requisitos*/
			$code=$validacion->validarPostal($_POST['postal']);
			if ($code==0) {
				$datos->setPostal($_POST["postal"]);
			}elseif ($code==1) {
				$mensaje= "Introduzca codigo postal";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}elseif ($code==2) {
				echo "Su codigo postal no está bien escrito";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}
			/*se valida el email si devuelve codigo 0: se comprueba si el email ya está registrado
				si el codigo es 1: le pide que introduzca el email
				si el codigo es 2: El email no cumple los requisitos*/
			$code=$validacion->validarEmail($_POST['email']);
			if ($code==0) {
				$code2=$gestion->comprobarEmail($_POST['email']);
					if ($code2==1) {
						$mensaje= "Su email ya ha sido registrado anteriormente";
						setcookie('mensaje',$mensaje,"","/");
						header("Location:".$_SERVER['HTTP_REFERER']);
						exit();
					}else{
						
						$datos->setEmail($_POST["email"]);
				
					}
				
			}elseif ($code==1) {
				$mensaje= "Introduzca email";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}elseif ($code==2) {
				$mensaje= "Su email no está bien escrito";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}
			/*se valida la contraseña si devuelve codigo 0: se guarda la contraseña
				si el codigo es 1: le pide que introduzca la contraseña
				si el codigo es 2: la contraseña no cumple los requisitos*/
			$code=$validacion->validarContraseña($_POST['contraseña']);
			if ($code==0) {
				$datos->setContraseña($_POST["contraseña"]);
			}elseif ($code==1) {
				$mensaje= "Introduzca contraseña";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}elseif ($code==2) {
				$mensaje= "Su contraseña no está bien escrita. Longitud mínima 8 carácteres con uso de mayúsculas, minúscular. números y carácteres especiales";
				setcookie('mensaje',$mensaje,"","/");
				header("Location:".$_SERVER['HTTP_REFERER']);
				exit();
			}
			//Si todo lo anterior ha ido bien se registra el usuario
			$code=$gestion->registrar($datos);
			if ($code == 1) {
				$mensaje= "Usuario registrado correctamente";
				setcookie('success',$mensaje,"","/");
				
			}else{
				$mensaje= $code;
				setcookie('mensaje',$mensaje,"","/");			
			}
			
?>
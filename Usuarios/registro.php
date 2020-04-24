<?php
	require_once('validacion.php');
	require_once('datos.php');
	require_once('gestion.php');
	$validacion=new validar();
	$datos= new datos();
	$gestion= new gestion();
	$code=$validacion->validarNombre($_POST["nombre"]);
			if ($code==0) {
				$datos->setNombre($_POST["nombre"]);
			}elseif ($code==1) {
				echo "Introduzca nombre";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}elseif ($code==2) {
				echo "Su nombre no está bien escrito";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}

			$code=$validacion->validarApellidos($_POST['apellidos']);
			if ($code==0) {
				$datos->setApellidos($_POST["apellidos"]);
			}elseif ($code==1) {
				echo "Introduzca apellidos";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}elseif ($code==2) {
				echo "Su apellidos no están bien escritos";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}

			if (empty($_POST['nacimiento'])) {
				echo "Introduzca fecha de nacimiento";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}else{
				$datos->setNacimiento($_POST["nacimiento"]);
			}

			$code=$validacion->validarDni($_POST['dni']);
			if ($code==0) {
				$datos->setDni($_POST["dni"]);
			}elseif ($code==1) {
				echo "Introduzca dni";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}elseif ($code==2) {
				echo "Su dni no está bien escrito";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}

			$code=$validacion->validarTelefono($_POST['telefono']);
			if ($code==0) {
				$datos->setTelefono($_POST["telefono"]);
			}elseif ($code==1) {
				echo "Introduzca telefono";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}elseif ($code==2) {
				echo "Su telefono no está bien escrito";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}

			$code=$validacion->validarDireccion($_POST['direccion']);
			if ($code==0) {
				$datos->setDireccion($_POST["direccion"]);
			}elseif ($code==1) {
				echo "Introduzca direccion";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}elseif ($code==2) {
				echo "Su dirección no está bien escrito";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}

			$code=$validacion->validarProvincia($_POST['provincia']);
			if ($code==0) {
				$datos->setProvincia($_POST["provincia"]);
			}elseif ($code==1) {
				echo "Introduzca provincia";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}elseif ($code==2) {
				echo "Su provincia no está bien escrita";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}

			$code=$validacion->validarLocalidad($_POST['localidad']);
			if ($code==0) {
				$datos->setLocalidad($_POST["localidad"]);
			}elseif ($code==1) {
				echo "Introduzca localidad";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}elseif ($code==2) {
				echo "Su localidad no está bien escrita";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}

			$code=$validacion->validarPostal($_POST['postal']);
			if ($code==0) {
				$datos->setPostal($_POST["postal"]);
			}elseif ($code==1) {
				echo "Introduzca codigo postal";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}elseif ($code==2) {
				echo "Su codigo postal no está bien escrito";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}

			$code=$validacion->validarEmail($_POST['email']);
			if ($code==0) {
				$code2=$gestion->comprobarEmail($_POST['email']);
					if ($code2==1) {
						$datos->setEmail($_POST["email"]);
					}else{
						echo "Su email ya ha sido registrado anteriormente";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
					}
				
			}elseif ($code==1) {
				echo "Introduzca email";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}elseif ($code==2) {
				echo "Su email no está bien escrito";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}

			$code=$validacion->validarContraseña($_POST['contraseña']);
			if ($code==0) {
				$datos->setContraseña($_POST["contraseña"]);
			}elseif ($code==1) {
				echo "Introduzca contraseña";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}elseif ($code==2) {
				echo "Su contraseña no está bien escrito";
				echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
				exit();
			}
			$code=$gestion->registrar($datos);
			if ($code == 1) {
				echo '<script language="javascript">';
				echo 'alert("Usuario registrado")';
				echo '</script>';
			}else{
				$dni=$datos->getDni();
				if ($code == "SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '".$dni."' for key 'PRIMARY'") {
					echo "Dni ya registrado";
					echo "<br><a href=\"index.php\" class=\"btn btn-danger\">Volver</a>";
					exit();
				}else{
					echo $code;
				}
				
			}
			
?>
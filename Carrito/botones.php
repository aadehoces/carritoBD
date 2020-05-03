<?php
ob_start();
session_start();
include '../Global/config.php';
include '../Global/conexion.php';
	//si recibimos un $_Post
	if($_POST){
		//si recibimos un $_Post con opcion
		if (isset($_POST['opcion'])) {
			//si la opcion es registrar añadimos fichero de registro
			if ($_POST['opcion']=="Registrar") {
				include("../Usuarios/registro.php");
				
				header("Location:".$_SERVER['HTTP_REFERER']);

			//si la opcion es iniciar añadimos fichero de inicio de sesion
			}elseif ($_POST['opcion']=="Iniciar") {
				include("../Usuarios/sesion.php");
				header("Location:".$_SERVER['HTTP_REFERER']);
			//si la opcioon es cerrar sesion añadimos fichero de cerrar sesion
			}elseif ($_POST['opcion']=="Cerrar Sesion") {
				include("../Usuarios/cerrar.php");
				header("Location:".$_SERVER['HTTP_REFERER']);
			}
		}
		
	
		//si recibimos un $_Post con btnaccion
		if (isset($_POST['btnaccion'])) {
			//comprobamos si la opcion es agregar
			if ($_POST['btnaccion'] == 'Agregar') {
				//llamamos a Carrito.php que es donde estan las funciones para agregar
				include("Carrito.php");
				//volvemos a la pagina
				header("Location:".$_SERVER['HTTP_REFERER']);
			//comprobamos si la opcion es agregar
			}elseif ($_POST['btnaccion'] == 'Eliminar') {
				//llamamos a eliminar.php que es donde estan las funciones para eliminar
				include("Eliminar.php");
				//volvemos a la pagina
				header("Location:".$_SERVER['HTTP_REFERER']);
			}
		}
		//comprobamos si recibimos un post con productos
		if (isset($_POST['Productos'])) {
			require_once("../Administracion/admin_productos.php");
			require_once("../Administracion/crud_productos.php");
			$administra= new Admin_productos();
			$crud_productos= new crud_productos();
			//comprobamos si le hemos dado al boton de eliminar productos de administracion
			if ($_POST['Productos']=="Eliminar") {
				//guardamos la id y llamamos a la funcion de eliminar
				$code=$administra->eliminar($_POST['id']);
				$_SESSION['mensaje']= "$code";
				header("Location:".$_SERVER['HTTP_REFERER']);
			//comprobamos si le hemos dado al boton de actualizar productos de administracion
			}elseif ($_POST['Productos']=="Actualizar") {
				//guardamos la id del producto
				$crud_productos->setId($_POST["Id"]);
				//comprobamos si se a subido una imagen para actualizar
				if (isset($_FILES['Imagen']) && !empty($_FILES['Imagen']['name'])) {
					//guardamos la imagen en el servidor
					$directorio = '../img/';
					$subir_archivo = $directorio.basename($_FILES['Imagen']['name']);
					if (move_uploaded_file($_FILES['Imagen']['tmp_name'], $subir_archivo)) {
						//si se ha guardado la imagen subimos la ruta de donde se encuentra la imagen a la base de datos
						$crud_productos->setImagen("img/".$_FILES['Imagen']['name']);
						$administra->actualizarImagen($crud_productos);
					}else{
						$_SESSION['mensaje']= "Ocurrió algún error al cargar la imagen";
						header("Location:".$_SERVER['HTTP_REFERER']);
						exit();
					}
					
				}
				//guardamos distintas cosas de los productos
				$crud_productos->setNombre($_POST["Nombre"]);
				$crud_productos->setDescripcion($_POST["Descripcion"]);
				$crud_productos->setCategoria($_POST["Categoria"]);
				$crud_productos->setPrecio($_POST["Precio"]);
				//actualizamos
				$code=$administra->actualizar($crud_productos);
				//Comprobacion de la actualizacion
				if ($code=1) {
					$_SESSION['mensaje']= "Producto actulizado correctamente";
				}else{
					$_SESSION['mensaje']= "Ocurrió algún error al actualizar el producto";
				}
				header("Location:".$_SERVER['HTTP_REFERER']);
			//comprobamos si le hemos dado al boton de añadir producto de administracion
			}elseif ($_POST['Productos']=="Nuevo") {
				//subimos la imagen al servidor
				$directorio = '../img/';
				$subir_archivo = $directorio.basename($_FILES['Imagen']['name']);
				
				if (move_uploaded_file($_FILES['Imagen']['tmp_name'], $subir_archivo)) {
					//si se a guardado correctamente añadimos el producto a la base de datos
					$crud_productos->setNombre($_POST["Nombre"]);
					$crud_productos->setDescripcion($_POST["Descripcion"]);
					$crud_productos->setCategoria($_POST["Categoria"]);
					$crud_productos->setImagen("img/".$_FILES['Imagen']['name']);
					$crud_productos->setPrecio($_POST["Precio"]);
					$code=$administra->nuevo($crud_productos);
					//comprobamos si se ha añadido correctamente
					if ($code == 1) {
						$_SESSION['mensaje']= "Producto añadido correctamente";
					}else{
						$_SESSION['mensaje']= $code;
					}
				}else{
					//si no se sube correctamente la imagen
					$_SESSION['mensaje']= "Ocurrió algún error al cargar la imagen";
				}
				header("Location:".$_SERVER['HTTP_REFERER']);
				
			}
		}
		//comprobamos si recibimos un post con usuarios
		if (isset($_POST['Usuarios'])) {
			require_once("../Administracion/admin_usuarios.php");
			require_once('../Usuarios/datos.php');
			require_once("../Usuarios/gestion.php");
			$gestion= new gestion();
			$datos= new datos();
			$administra= new Admin_users();
			//comprobamos si le hemos dado al boton de eliminar usuario de administracion 
			if ($_POST['Usuarios']=="Eliminar") {
				//guardamos el dni y eliminamos el usuario
				$datos->setDni($_POST["DNI"]);
				$administra->eliminar($datos);
				header("Location:".$_SERVER['HTTP_REFERER']);

			}elseif ($_POST['Usuarios']=="Actualizar") {
				//guardamos los datos del usuario
				$datos->setNombre($_POST["Nombre"]);
				$datos->setApellidos($_POST["Apellidos"]);
				$datos->setDni($_POST["DNI"]);
				$datos->setNacimiento($_POST["Fecha_nac"]);
				$datos->setTelefono($_POST["Telefono"]);
				$datos->setDireccion($_POST["Direccion"]);
				$datos->setProvincia($_POST["Provincia"]);
				$datos->setLocalidad($_POST["Localidad"]);
				$datos->setPostal($_POST["Cod_postal"]);
				//comprobamos que el email no esté ya registrado
				$code=$gestion->comprobarEmailActu($_POST['Email'],$_POST["DNI"]);
					if ($code==1) {
						$_SESSION['mensaje']= "El email ya está registrado";
						header("Location:".$_SERVER['HTTP_REFERER']);
						exit();
					}else{
						
						$datos->setEmail($_POST["Email"]);
				
					}
				$datos->setContraseña($_POST["Contraseña"]);
				$datos->setTipo($_POST["Tipo"]);
				//actualizamos el usuario
				$code=$administra->actualizar($datos);
				//comprobamos si se a actualizado correctamente
				if ($code==1) {
					$_SESSION['mensaje']="Usuario actulizado";
				}else{
					$_SESSION['mensaje']=$code;
				}
				header("Location:".$_SERVER['HTTP_REFERER']);
			//comprobamos si le hemos dado al boton de añadir usuario de administracion 
			}elseif ($_POST['Usuarios']=="Nuevo") {
				//guardamos los datos del usuario
				$datos->setNombre($_POST["Nombre"]);
				$datos->setApellidos($_POST["Apellidos"]);
				//comprobamos que el dni no esté registrado
				$code=$gestion->comprobarDni($_POST['DNI']);
					if ($code==1) {
						$_SESSION['mensaje']= "El DNI ya está registrado";
						header("Location:".$_SERVER['HTTP_REFERER']);
						exit();
					}else{
						
						$datos->setDni($_POST["DNI"]);
					}
				$datos->setNacimiento($_POST["Fecha_nac"]);
				$datos->setTelefono($_POST["Telefono"]);
				$datos->setDireccion($_POST["Direccion"]);
				$datos->setProvincia($_POST["Provincia"]);
				$datos->setLocalidad($_POST["Localidad"]);
				$datos->setPostal($_POST["Cod_postal"]);
				//comprobamos que el email no esté registrado ya
				$code=$gestion->comprobarEmail($_POST['Email']);
					if ($code==1) {
						$_SESSION['mensaje']= "El email ya está registrado";
						header("Location:".$_SERVER['HTTP_REFERER']);
						exit();
					}else{
						
						$datos->setEmail($_POST["Email"]);
				
					}
				$datos->setContraseña($_POST["Contraseña"]);
				$datos->setTipo($_POST["Tipo"]);
				//añadimos el usuario
				$code=$administra->nuevo($datos);
				//comprobamos si se a añadido correctamente
				if ($code == 1) {
					
					$_SESSION['mensaje']="Usuario registrado";
					
				}else{
					$_SESSION['mensaje']= $code;
				}
				
				
				header("Location:".$_SERVER['HTTP_REFERER']);
			}
		}
	}
ob_end_flush();
?>
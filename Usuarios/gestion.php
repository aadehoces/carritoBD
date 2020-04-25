<?php
	

	class gestion 
	{
		
		function __construct(){
			
		}

		public function registrar($datos){

			$db=Db::conectar();
			try{
				$nombre=$datos->getNombre();
				$apellidos=$datos->getApellidos();
				$nacimiento=$datos->getNacimiento();
				$dni=$datos->getDni();
				$telefono=$datos->getTelefono();
				$direccion=$datos->getDireccion();
				$provincia=$datos->getProvincia();
				$localidad=$datos->getLocalidad();
				$postal=$datos->getPostal();
				$email=$datos->getEmail();
				$contraseña=$datos->getContraseña();
				$sql = "INSERT INTO Zykrex.usuarios (Nombre,Apellidos,Fecha_nac,DNI,Telefono,Direccion,Provincia,Localidad,Cod_postal,Email,Contraseña,Tipo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
				$stmt= $db->prepare($sql);
				$stmt->execute([$nombre,$apellidos,$nacimiento,$dni,$telefono,$direccion,$provincia,$localidad,$postal,$email,$contraseña,"cliente"]);
			
			} catch(Exception $e){
				return $e->getMessage();
			}
			return 1;
		}

		public function emailRegistrados($datos){
			$email=$datos->getEmail();
			$db=Db::conectar();
			$listaLibros=[];
			$select=$db->query('SELECT email FROM Zykrex.usuarios');
	 			foreach($select->fetchAll() as $emailegistrado){
					if($email == $emailegistrado['email']){
					return 1;
				}
			}
		}

		public function verificarContra($datos){
			$db=Db::conectar();
			$email=$datos->getEmail();
			$contraseña=$datos->getContraseña();
			$select=$db->query("SELECT contraseña FROM Zykrex.usuarios where email = '$email'");
	 			foreach($select->fetchAll() as $contraseñaregistrada){
					if($contraseña == $contraseñaregistrada['contraseña']){
						return 1;
					}
				}
		}

		public function definirTipo($datos){
			$db=Db::conectar();
			$email=$datos->getEmail();
			$contraseña=$datos->getContraseña();
			$select=$db->query("SELECT Descripcion FROM Zykrex.usuarios join zykrex.rol using (id_Rol) where email = '$email' and contraseña = '$contraseña'");
			foreach($select->fetchAll() as $key => $value){
					$datos->setTipo($value[0]);
				}
		}

		public function comprobarEmail($email){
			$db=Db::conectar();
			$select=$db->query("SELECT Email FROM Zykrex.usuarios ");
			foreach($select->fetchAll() as $key ){
					if ($email == $key ) {
						return 1;
					}
				}
		}
	}
?>
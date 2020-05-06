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
				$sql = "INSERT INTO " .BD.".usuarios (DNI,Nombre,Apellidos,Fecha_nac,Telefono,Direccion,Provincia,Localidad,Cod_postal,Email,Contraseña,id_Rol) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
				$stmt= $db->prepare($sql);
				$stmt->execute([$dni, $nombre,$apellidos,$nacimiento,$telefono,$direccion,$provincia,$localidad,$postal,$email,$contraseña,1]);
			
			} catch(Exception $e){
				return $e->getMessage();
			}
			return 1;
		}

		public function emailRegistrados($datos){
			$email=$datos->getEmail();
			$db=Db::conectar();
			$select=$db->query("SELECT Email FROM " .BD.".usuarios");
	 			foreach($select->fetchAll() as $emailegistrado){
					if($email == $emailegistrado['Email']){
					return 1;
				}
			}
		}

		public function verificarContra($datos){
			$db=Db::conectar();
			$email=$datos->getEmail();
			$contraseña=$datos->getContraseña();
			$select=$db->query("SELECT Contraseña FROM " .BD.".usuarios where email = '$email'");
	 			foreach($select->fetchAll() as $contraseñaregistrada){
					if($contraseña == $contraseñaregistrada['Contraseña']){
						return 1;
					}
				}
		}

		public function definirTipo($datos){
			$db=Db::conectar();
			$email=$datos->getEmail();
			$contraseña=$datos->getContraseña();
			$select=$db->query("SELECT Descripcion FROM " .BD.".usuarios join " .BD.".rol using (id_Rol) where email = '$email' and contraseña = '$contraseña'");
			foreach($select->fetchAll() as $key => $value){
					$datos->setTipo($value[0]);
				}
		}

		public function comprobarEmail($email){
			$db=Db::conectar();
			$select=$db->query("SELECT Email FROM " .BD.".usuarios ");
			foreach($select->fetchAll() as $key ){
					if ($email == $key[0] ) {
						return 1;
					}
				}
		}
		public function comprobarEmailActu($email,$dni){
			$db=Db::conectar();
			$select=$db->query("SELECT Email FROM " .BD.".usuarios where not DNI ='$dni' ");
			foreach($select->fetchAll() as $key ){
					if ($email == $key[0] ) {
						return 1;
					}
				}
		}
		public function comprobarDni($dni){
			$db=Db::conectar();
			$select=$db->query("SELECT DNI FROM " .BD.".usuarios ");
			foreach($select->fetchAll() as $key ){
					if ($dni == $key[0] ) {
						return 1;
					}
				}
		}

		public function consulta($datos,$email){
			$db=Db::conectar();
			$select=$db->query("SELECT Direccion, Provincia, Localidad, Cod_postal FROM " .BD.".usuarios where Email = '$email'" );
			foreach($select->fetchAll() as $key => $value){
					$datos->setDireccion($value['Direccion']);
					$datos->setProvincia($value['Provincia']);
					$datos->setLocalidad($value['Localidad']);
					$datos->setPostal($value['Cod_postal']);
			}
		}

		public function actualizarDireccion($datos,$email){
			$db=Db::conectar();
			try {
				$actualizar=$db->prepare("UPDATE " .BD.".usuarios SET Direccion=:Direccion where Email = '$email'");
				$actualizar->bindValue('Direccion',$datos->getDireccion());
				$actualizar->execute();
				$actualizar=$db->prepare("UPDATE " .BD.".usuarios SET Provincia=:Provincia where Email = '$email'");
				$actualizar->bindValue('Provincia',$datos->getProvincia());
				$actualizar->execute();
				$actualizar=$db->prepare("UPDATE " .BD.".usuarios SET Localidad=:Localidad where Email = '$email'");
				$actualizar->bindValue('Localidad',$datos->getLocalidad());
				$actualizar->execute();
				$actualizar=$db->prepare("UPDATE " .BD.".usuarios SET Cod_postal=:Cod_postal where Email = '$email'");
				$actualizar->bindValue('Cod_postal',$datos->getPostal());
				$actualizar->execute();
				return 1;
			} catch (Exception $e) {
				return $e->getMessage();
			}
		}
	}
?>
<?php
	require_once('../Global/conexion.php');
	class Admin_users
	{
		
		function __construct(){}

		public function eliminar($datos){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM usuarios WHERE DNI=:dni');
			$eliminar->bindValue('dni',$datos->getDNI());
			$eliminar->execute();
		}

		public function actualizar($datos){
			$db=Db::conectar();
			try {
				$actualizar=$db->prepare('UPDATE ' .BD.'.usuarios SET Nombre=:nombre WHERE DNI=:dni');
				$actualizar->bindValue('dni',$datos->getDNI());
				$actualizar->bindValue('nombre',$datos->getNombre());
				$actualizar->execute();
				$actualizar=$db->prepare('UPDATE ' .BD.'.usuarios SET Apellidos=:apellidos WHERE DNI=:dni');
				$actualizar->bindValue('dni',$datos->getDNI());
				$actualizar->bindValue('apellidos',$datos->getApellidos());
				$actualizar->execute();
				$actualizar=$db->prepare('UPDATE ' .BD.'.usuarios SET Fecha_nac=:fecha WHERE DNI=:dni');
				$actualizar->bindValue('dni',$datos->getDNI());
				$actualizar->bindValue('fecha',$datos->getNacimiento());
				$actualizar->execute();
				$actualizar=$db->prepare('UPDATE ' .BD.'.usuarios SET Telefono=:Telefono WHERE DNI=:dni');
				$actualizar->bindValue('dni',$datos->getDNI());
				$actualizar->bindValue('Telefono',$datos->getTelefono());
				$actualizar->execute();
				$actualizar=$db->prepare('UPDATE ' .BD.'.usuarios SET Direccion=:Direccion WHERE DNI=:dni');
				$actualizar->bindValue('dni',$datos->getDNI());
				$actualizar->bindValue('Direccion',$datos->getDireccion());
				$actualizar->execute();
				$actualizar=$db->prepare('UPDATE ' .BD.'.usuarios SET Provincia=:Provincia WHERE DNI=:dni');
				$actualizar->bindValue('dni',$datos->getDNI());
				$actualizar->bindValue('Provincia',$datos->getProvincia());
				$actualizar->execute();
				$actualizar=$db->prepare('UPDATE ' .BD.'.usuarios SET Localidad=:Localidad WHERE DNI=:dni');
				$actualizar->bindValue('dni',$datos->getDNI());
				$actualizar->bindValue('Localidad',$datos->getLocalidad());
				$actualizar->execute();
				$actualizar=$db->prepare('UPDATE ' .BD.'.usuarios SET Cod_postal=:Cod_postal WHERE DNI=:dni');
				$actualizar->bindValue('dni',$datos->getDNI());
				$actualizar->bindValue('Cod_postal',$datos->getPostal());
				$actualizar->execute();
				$actualizar=$db->prepare('UPDATE ' .BD.'.usuarios SET Email=:Email WHERE DNI=:dni');
				$actualizar->bindValue('dni',$datos->getDNI());
				$actualizar->bindValue('Email',$datos->getEmail());
				$actualizar->execute();
				$actualizar=$db->prepare('UPDATE ' .BD.'.usuarios SET Contraseña=:contra WHERE DNI=:dni');
				$actualizar->bindValue('dni',$datos->getDNI());
				$actualizar->bindValue('contra',$datos->getContraseña());
				$actualizar->execute();
				$actualizar=$db->prepare('UPDATE ' .BD.'.usuarios SET id_Rol=:rol WHERE DNI=:dni');
				$actualizar->bindValue('dni',$datos->getDNI());
				if ($datos->getTipo()=="Cliente") {
					$actualizar->bindValue('rol','1');
				}elseif ($datos->getTipo()=="Administrador") {
					$actualizar->bindValue('rol','2');
				}
				
				$actualizar->execute();
				return 1;
			} catch (Exception $e) {
				return $e->getMessage();
			}
			
			
			

		}

		public function nuevo($datos){
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
				if ($datos->getTipo()=="Cliente") {
					$rol='1';
				}elseif ($datos->getTipo()=="Administrador") {
					$rol='2';
				}
				$sql = "INSERT INTO " .BD.".usuarios (DNI,Nombre,Apellidos,Fecha_nac,Telefono,Direccion,Provincia,Localidad,Cod_postal,Email,Contraseña,id_Rol) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
				$stmt= $db->prepare($sql);
				$stmt->execute([$dni, $nombre,$apellidos,$nacimiento,$telefono,$direccion,$provincia,$localidad,$postal,$email,$contraseña,$rol]);
			
			} catch(Exception $e){
				return $e->getMessage();
			}
			return 1;
		}
	}
?>
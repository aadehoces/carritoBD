<?php

	class Admin_productos
	{
		
		function __construct(){}

		public function eliminar($id){
			$db=Db::conectar();
			try {
				$eliminar=$db->prepare('DELETE FROM Productos WHERE id_Productos=:id');
				$eliminar->bindValue('id',$id);
				$eliminar->execute();
			} catch (Exception $e) {
				return $e->getMessage();
			}
			
		}

		public function actualizar($crud_productos){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE ' .BD.'.Productos SET Nombre=:nombre WHERE id_Productos=:id');
			$actualizar->bindValue('id',$crud_productos->getID());
			$actualizar->bindValue('nombre',$crud_productos->getNombre());
			$actualizar->execute();
			$actualizar=$db->prepare('UPDATE ' .BD.'.Productos SET Descripcion=:descripcion WHERE id_Productos=:id');
			$actualizar->bindValue('id',$crud_productos->getID());
			$actualizar->bindValue('descripcion',$crud_productos->getDescripcion());
			$actualizar->execute();
			$actualizar=$db->prepare('UPDATE ' .BD.'.Productos SET Categoria=:categoria WHERE id_Productos=:id');
			$actualizar->bindValue('id',$crud_productos->getID());
			$actualizar->bindValue('categoria',$crud_productos->getCategoria());
			$actualizar->execute();
			$actualizar=$db->prepare('UPDATE ' .BD.'.Productos SET Precio=:precio WHERE id_Productos=:id');
			$actualizar->bindValue('id',$crud_productos->getID());
			$actualizar->bindValue('precio',$crud_productos->getPrecio());
			$actualizar->execute();
		}

		public function actualizarImagen($crud_productos){
			$db=Db::conectar();
			$actualizarImagen=$db->prepare('UPDATE ' .BD.'.Productos SET Imagen=:imagen WHERE id_Productos=:id');
			$actualizarImagen->bindValue('id',$crud_productos->getID());
			$actualizarImagen->bindValue('imagen',$crud_productos->getImagen());
			$actualizarImagen->execute();
		}

		public function nuevo($crud_productos){
			$db=Db::conectar();
			try{
				$sentencia=$db->prepare("SELECT id_Productos FROM " .BD.".Productos ");
				$sentencia->execute();
				foreach ($sentencia as $key => $value) {
					$id=$value[0];
				}
				$id=$id+1;
				$nombre=$crud_productos->getNombre();
				$descripcion=$crud_productos->getDescripcion();
				$categoria=$crud_productos->getCategoria();
				$imagen=$crud_productos->getImagen();
				$precio=$crud_productos->getPrecio();
				$sql = "INSERT INTO " .BD.".Productos (id_productos,Nombre,Descripcion,Categoria,Imagen,Precio) VALUES (?,?,?,?,?,?)";
				$stmt= $db->prepare($sql);
				$stmt->execute([$id, $nombre,$descripcion,$categoria,$imagen,$precio]);
			} catch(Exception $e){
				return $e->getMessage();
			}
			return 1;
		}
	}
?>
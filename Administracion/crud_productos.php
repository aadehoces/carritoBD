<?php
	class crud_productos
	{
		private $id;
		private $nombre;
		private $Descripcion;
		private $categoria;
		private $imagen;
		private $precio;
		function __construct(){}

		public function setId($id){
            $this->id=$id;
   		}

   		public function getId(){
			return $this->id;
		}
		public function setNombre($nombre){
            $this->nombre=$nombre;
   		}

   		public function getNombre(){
			return $this->nombre;
		}

		public function setDescripcion($descripcion){
            $this->descripcion=$descripcion;
   		}

   		public function getDescripcion(){
			return $this->descripcion;
		}

		public function setCategoria($categoria){
            $this->categoria=$categoria;
   		}

   		public function getCategoria(){
			return $this->categoria;
		}

		public function setImagen($imagen){
            $this->imagen=$imagen;
   		}

   		public function getImagen(){
			return $this->imagen;
		}

		public function setPrecio($precio){
            $this->precio=$precio;
   		}

   		public function getPrecio(){
			return $this->precio;
		}
	}
?>
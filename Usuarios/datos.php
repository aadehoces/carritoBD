<?php
	
	class datos
	{
		private $nombre;
		private $apellidos;
		private $nacimiento;
		private $dni;
		private $telefono;
		private $direccion;
		private $provincia;
		private $localidad;
		private $postal;
		private $email;
		private $contraseña;
		private $tipo;
		
		function __construct(){}

		public function setNombre($nombre){
            $this->nombre=$nombre;
   		}

   		public function getNombre(){
			return $this->nombre;
		}
		public function setApellidos($apellidos){
            $this->apellidos=$apellidos;
   		}

   		public function getApellidos(){
			return $this->apellidos;
		}
		public function setNacimiento($nacimiento){
            $this->nacimiento=$nacimiento;
   		}

   		public function getNacimiento(){
			return $this->nacimiento;
		}
		public function setDni($dni){
            $this->dni=$dni;
   		}

   		public function getDni(){
			return $this->dni;
		}
		public function setTelefono($telefono){
            $this->telefono=$telefono;
   		}

   		public function getTelefono(){
			return $this->telefono;
		}
		public function setDireccion($direccion){
            $this->direccion=$direccion;
   		}

   		public function getDireccion(){
			return $this->direccion;
		}
		public function setProvincia($provincia){
            $this->provincia=$provincia;
   		}

   		public function getProvincia(){
			return $this->provincia;
		}
		public function setLocalidad($localidad){
            $this->localidad=$localidad;
   		}

   		public function getLocalidad(){
			return $this->localidad;
		}
		public function setPostal($postal){
            $this->postal=$postal;
   		}

   		public function getPostal(){
			return $this->postal;
		}
		public function setEmail($email){
            $this->email=$email;
   		}

   		public function getEmail(){
			return $this->email;
		}
		public function setContraseña($contraseña){
            $this->contraseña=$contraseña;
   		}

   		public function getContraseña(){
			return $this->contraseña;
		}
		public function setTipo($tipo){
            $this->tipo=$tipo;
   		}

   		public function getTipo(){
			return $this->tipo;
		}

	}
?>
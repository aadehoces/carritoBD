<?php
	class pago
	{
		private $id_pedido;
		private $total;
		private $fecha;
		private $dni;
		private $forma;

		function __construct(){}

		public function setPedido($id_pedido){
            $this->id_pedido=$id_pedido;
   		}

   		public function getPedido(){
			return $this->id_pedido;
		}
		public function setTotal($total){
            $this->total=$total;
   		}

   		public function getTotal(){
			return $this->total;
		}
		public function setFecha($fecha){
            $this->fecha=$fecha;
   		}

   		public function getFecha(){
			return $this->fecha;
		}

		public function setDni($dni){
            $this->dni=$dni;
   		}

   		public function getDni(){
			return $this->dni;
		}

		public function setForma($forma){
            $this->forma=$forma;
   		}

   		public function getForma(){
			return $this->forma;
		}
	}
?>
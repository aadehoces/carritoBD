<?php
	class gestionPago
	{
		
		function __construct(){}

		public function pedido($pago){
			$db=Db::conectar();
			try {
				$id_Pedido=$pago->getPedido();
				$total=$pago->getTotal();
				$estado="enviado";
				$sql = "INSERT INTO " .BD.".Pedidos (id_Pedidos,Total,Estado) VALUES (?,?,?)";
				$stmt= $db->prepare($sql);
				$stmt->execute([$id_Pedido, $total,$estado]);
			} catch (Exception $e) {
				return $e->getMessage();
			}
		}
		public function realiza($pago){
			$db=Db::conectar();
			try {
				$id_Pedido=$pago->getPedido();
				$fecha=$pago->getFecha();
				$dni=$pago->getDni();
				$forma=$pago->getForma();
				
				$sql = "INSERT INTO " .BD.".realiza (usuarios_DNI, Pedidos_id_Pedidos,fecha,pago) VALUES (?,?,?,?)";
				$stmt= $db->prepare($sql);
				$stmt->execute([$dni, $id_Pedido, $fecha ,$forma]);
			} catch (Exception $e) {
				return $e->getMessage();
			}
		}
		public function linea_pedido($pago,$productos){
			$db=Db::conectar();
			try {
				$id_Pedido=$pago->getPedido();
				foreach ($productos as $key => $producto) {
					$id=$producto['ID'];
					$cantidad=$producto['CANTIDAD'];
					$sql = "INSERT INTO " .BD.".linea_pedido ( Pedidos_id_Pedidos2,Productos_id_Productos,cantidad) VALUES (?,?,?)";
					$stmt= $db->prepare($sql);
					$stmt->execute([$id_Pedido, $id ,$cantidad]);

				}
				
				
			} catch (Exception $e) {
				return $e->getMessage();
			}
		}
	}
?>
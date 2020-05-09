<?php
require_once("Global/conexion.php");
require_once("Global/config.php");
require_once("pdf/plantilla.php");
//se comprueba si existe la cookie pedido, si existe se muestra el pdf, si no redirecciona al index
if (isset($_COOKIE['pedido'])) {
	//creamos pdf con la plantilla ya diseñada
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
//cabecera tabla de productos
	$pdf->SetFillColor(237,237,237);
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(70,5,'Producto',1,0,'C',1);
	$pdf->Cell(30,5,'Cantidad',1,0,'C',1);
	$pdf->Cell(40,5,'Precio',1,0,'C',1);
	$pdf->Cell(40,5,'Precio Total',1,1,'C',1);
	$pdf->SetFillColor(254,254,254);
	$pdf->SetFont('Arial','',12);

	//contenido tabla productos
	$pedido=$_COOKIE['pedido'];
	$db=Db::conectar();
	$query="Select Nombre, Cantidad, Precio from linea_pedido join Productos on linea_pedido.Productos_id_Productos = Productos.id_Productos where Pedidos_id_Pedidos2 = '$pedido'";
	$resultado=$db->query($query);
	$PrecioTotal=0;
	foreach ($resultado as $key => $value) {
		$pdf->Cell(70,5,$value['Nombre'],1,0,'L',1);
		$pdf->Cell(30,5,$value['Cantidad'],1,0,'C',1);
		$pdf->Cell(40,5,$value['Precio'],1,0,'C',1);
		$pdf->Cell(40,5,number_format($value['Precio']*$value['Cantidad'],2),1,1,'C',1);
		$PrecioTotal=$PrecioTotal+($value['Precio']*$value['Cantidad']);
	}
	//precio total del pedido
	$pdf->Cell(70,5,"",1,0,'C',1);
	$pdf->Cell(30,5,'',1,0,'C',1);
	$pdf->Cell(40,5,'Precio Total',1,0,'C',1);
	$pdf->Cell(40,5,number_format($PrecioTotal,2),1,1,'C',1);
	$pdf->Ln(20);
	$pdf->cell(190,10,"Gracias por su compra",0,0,'C');

	$pdf->Output();
}else{
	header("Location:index.php");
}

?>
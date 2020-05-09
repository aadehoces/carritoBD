<?php
require('fpdf.php');

class PDF extends FPDF
{
//header del pdf
function Header()
{
	//logo
	$this->Image('img/logo.jpg',80,0,50);
	
	$this->SetFont('Arial','B',15);

	
	//titulo
	$this->Ln(30);
	$this->cell(190,10,"Recibo de compra",0,0,'C');
	$this->SetFont('Arial','B',15);
	$this->Ln(20);
}

//pie de pagina
function Footer()
{
	
	$this->SetY(-15);

	$this->SetFont('Arial','I',8);
	//numero de paginas
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


?>
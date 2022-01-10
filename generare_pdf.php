<?php
require('fpdf184/fpdf.php');
session_start();
class PDF extends FPDF
{
// Page header
function Header()
{
	// Logo
	$this->Image('img/headerpdf.png',0,0,210);
	// Arial bold 15

}
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-8);
	$this->Image('img/footerpdf.png',0,283,210);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4');
$pdf->SetFont('Arial','',35);
$pdf->SetTextColor(60,60,60);
require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';
$id_user = $_SESSION["id_user"];
$query = 'SELECT * FROM  proiectie where id_proiectie in (select id_proiectie from loc where id_loc in (select id_loc from rezervare where id_user = '.$id_user.'))order by data asc; ';
$result = $conn->query($query);
$num_results = $result->num_rows;
  $row = $result->fetch_assoc();
  $sql2 = "select * from film where id_film =".$row["id_film"];
  $result2 = $conn->query($sql2);
  while($row2= $result2 -> fetch_assoc()){
    $titlu = $row2["titlu"];}
  $sql3 = "select nume from sala where id_sala = ".$row["id_sala"].";";
  $result3 = $conn->query($sql3);
  while($row3= $result3 -> fetch_assoc()){
    $numeSala = $row3["nume"];
	}
	$query4 = 'SELECT * FROM  users where id_user ='.$id_user.';';
	$result4 = $conn->query($query4);
	$row4= $result4->fetch_assoc();



$pdf->setX(50);
$pdf->setY(70);
$pdf->Cell(40,10,'Film:',0,0,'L');
$pdf->setX(70);
$pdf->Cell(75,10,$titlu,0,0,'C');
$pdf->setX(50);
$pdf->setY(90);
$pdf->Cell(40,10,'Sala:',0,0,'L');
$pdf->setX(70);
$pdf->Cell(75,10,$numeSala,0,0,'C');
$pdf->setX(50);
$pdf->setY(110);
$pdf->Cell(40,10,'Data:',0,0,'L');
$pdf->setX(70);
$pdf->Cell(75,10,$row['data'],0,0,'C');
$pdf->setX(50);
$pdf->setY(130);
$pdf->Cell(40,10,'Ora:',0,0,'L');
$pdf->setX(70);
$pdf->Cell(75,10,$row["ora"],0,0,'C');
$pdf->setX(50);
$pdf->setY(150);
$pdf->Cell(40,10,'Nume:',0,0,'L');
$pdf->setX(70);
$pdf->Cell(75,10,$row4["nume"]." ".$row4["prenume"],0,0,'C');
$pdf->Image('img/gradient.png',0,160,210);
$pdf->Image('img/'.$titlu.'.jpg',45,180,120);

$pdf->Output();

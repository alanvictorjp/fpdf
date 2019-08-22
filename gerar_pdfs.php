<?php
require('includes/Conexao.php');
require("includes/fpdf.php");

function getInfos() {
	global $conn;
 	$sql = "SELECT * FROM teste;";
        $prepare = mysqli_prepare($conn,$sql);
        mysqli_stmt_execute($prepare);
        $resultado = mysqli_stmt_get_result($prepare);
	while($saida = mysqli_fetch_assoc($resultado)) {
		$row[] = $saida;
	}
	return $row;
}

foreach (getInfos() as $line) {
	$pdf = new FPDF('P','mm',array(286,508));
	$pdf->AddPage();
	$pdf->Image('teste.jpg', 0, 0, $fpdf->w, $fpdf->h);
	$pdf->Link(20,420,250,70, 'https://goo.gl/maps');
	$pdf->Link(20,340,250,50, 'https://teste.com/teste.php?id='.$line['id'].'&nome='.$line['nome'].'');
	$pdf->Output('F', 'pdfs/'.$line['nome'].'.pdf');
	//$pdf->Output('F', 'view/teste.pdf');
}

/*
	$pdf = new FPDF('P','mm',array(190,338));
	$pdf->AddPage();
	$pdf->Image('teste.jpg', 0, 0, $fpdf->w, $fpdf->h);
	$pdf->Link(55,280,85,50, 'https://goo.gl/maps/teste');
	$pdf->Link(55,10,85,50, 'https://teste.com');
	//$pdf->Output('F', 'line.pdf');
	$pdf->Output();
*/
?>

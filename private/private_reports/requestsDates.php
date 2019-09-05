<?php 
require_once('../../reports/PDF.php');
date_default_timezone_set('America/El_Salvador');
session_start();
class myPDF extends PDF {

    function header(){
        $this->SetFillColor(235,10,0);
        $this->Rect(0, 0, 620, 40, 'F');
        $this->Ln(1);
        $this->SetTextColor(255,255,255);
        $this->SetFont('Arial','B',14);
        $this->Cell(65, 5, 'Solicitudes por rango de fechas',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Ln(10);
    }

    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'page'.$this->PageNo().'/{nb}',0,0,'C');
    }

    function headerTable(){
        $this->SetTextColor(255,255,255);
        $this->Cell(54, 10, 'Fecha: '.$date = date('m/d/Y h:i:s a', time()),0,0,'C');
        $this->Cell(54, 10, 'Usuario: '.$_SESSION['UsernameActive'],0 , 0 ,'C');
        $this->Cell(54, 10, utf8_decode('Nombre: '.$_SESSION['NameUser']." ".$_SESSION['LastnameUser']),0,0,'C');
        $this->Ln(20);
        $this->SetFont('Times','B',12);
        $this->SetTextColor(0,0,0);
        $this->Cell(70,10,' Fecha', 0, 0,'L');
        $this->Cell(60,10,'Solicitud',0,0,'L');
        $this->Ln(3);
        $this->Line(10,57,200,57);
        $this->Ln();
    }

    function viewTable(){

        $this->SetFont('Times','',12);
        $result = $this->RequestsperDate($_GET['date1'],$_GET['date2']);

        foreach($result as $row){
            $this->Cell(70, 10, utf8_decode($row['date_request']), 0 ,'L',false);
            $this->Cell(60, 10, utf8_decode($row['name_event']), 0 ,'L',false);
            $this->Ln();
        }
    }
}
$today = date('Y-m-d');
if($_GET['date1'] < $today && $_GET['date2'] < $today && $_GET['date1'] < $_GET['date2'] ){
    $pdf = new myPDF('p','mm','Letter');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->headerTable();
    $pdf->viewTable();
    $pdf->Output();
}
else{
    print 'fechas invalidas';
}
?>
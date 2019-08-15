<?php 
require_once('../../reports/PDF.php');
date_default_timezone_set('America/El_Salvador');
session_start();
class myPDF extends PDF {

    function header(){
        $this->SetFillColor(39,95,186);
        //Footer 263
        $this->Rect(0, 0, 320, 40, 'F');
        $this->Ln(1);
        $this->SetFont('Arial','B',14);
        $this->Cell(276, 5, 'Actividades por usuario',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276, 10, 'PopMovies derechos reservados',0,0,'C');
        $this->Cell(276, 10, 'Fecha'.date('d:m:y'),0,0,'C');
        $this->Ln(30);
    }

    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'page'.$this->PageNo().'/{nb}',0,0,'C');
    }

    function headerTable(){
        $this->Cell(54, 10, 'Fecha: '.$date = date('m/d/Y h:i:s a', time()),0,0,'C');
        $this->Cell(54, 10, 'Usuario: '.$_SESSION['UsernameActive'],0,0,'C');
        $this->Cell(54, 10, 'Nombre: '.$_SESSION['NameUser']." ".$_SESSION['LastnameUser'],0,0,'C');
        $this->Ln(20);
        $this->SetFont('Times','B',12);
        $result = $this->EventsperUser($_GET['idUser']);
        if(count($result) > 0){
            $this->Cell(25,10,'Fecha',1,0,'C');
            $this->Cell(60,10,'Evento',1,0,'C');
        }
        $this->Ln();
    }

    function viewTable(){

        $this->SetFont('Times','',12);
        
        $result = $this->EventsperUser($_GET['idUser']);
        if(count($result)>0){
            foreach($result as $row){
                $this->Cell(25, 10, $row['eventCreated'], 0 ,'L',false);
                $this->Cell(60, 10, utf8_decode($row['name_event']), 0 ,'L',false);
                $this->Ln();
            }
        }
        else{
            $this->Cell(200, -20, utf8_decode('No hay información de eventos creados.'),0,0,'L');
        }
    }
}

if(isset($_GET['idUser'])){
    $pdf = new myPDF('p','mm','Letter');
    $pdf->SetMargins(15,15,15);
    $pdf->AliasNbPages();

    $pdf->AddPage();
    $pdf->headerTable();
    $pdf->viewTable();
    $pdf->Output();
}
else{

}
?>
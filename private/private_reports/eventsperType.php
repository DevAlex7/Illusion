<?php 
require_once('../../reports/PDF.php');
date_default_timezone_set('America/El_Salvador');
session_start();
class myPDF extends PDF {
    function header(){
        $this->SetFillColor(235,10,0);
        $this->Rect(0, 0, 660, 50, 'F');
        $this->Ln(1);
        $this->SetTextColor(255,255,255);
        $this->SetFont('Arial','B',14);
        $this->Cell(200,5,'Eventos por tipo.',0,1,'L');
        $this->Ln(6);
        $this->SetFont('Times','',12);
    }

    function footer(){
        if($this->PageNo() !== 1){
            $this->SetY(-15);
            $this->SetFont('Times','B',8);
            $this->Cell(0,10,'page'.$this->PageNo().'/{nb}',0,0,'C');
        }

    }

    function headerTable(){
        $this->SetTextColor(255,255,255);
        $this->Cell(54, 10, 'Fecha: '.$date = date('m/d/Y h:i:s a', time()),0,0,'L');
        $this->Cell(54, 10, 'Usuario: '.$_SESSION['UsernameActive'],0 , 0 ,'C');
        $this->Cell(54, 10, 'Nombre: '.$_SESSION['NameUser']." ".$_SESSION['LastnameUser'],0,0,'C');
        $this->Ln(20);
        $this->SetFont('Times','B',12);
        $this->SetTextColor(0,0,0);
        $this->Ln(3);
        $this->Ln();
    }

    function viewTable(){
        $this->SetFont('Times','B',12);
        $this->SetTextColor(0,0,0);
        $types = $this->eventTypes();
        foreach($types as $row){
            $this->Cell(40, 10, $row['type'],0 ,'L',false);
            $this->Ln();
            $events = $this->getEventperType($row['id']);
            foreach($events as $result){
                $this->Cell(40, 10, $result['name_event'],0 ,'L',false);
                $this->Ln();
            }
            $this->Ln();

        }
    }
}

    $pdf = new myPDF('p','mm','Letter');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->headerTable();
    $pdf->viewTable();
    $pdf->Output();
?>
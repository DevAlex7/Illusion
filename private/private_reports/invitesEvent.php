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
        $this->Cell(65, 5, 'Lista de invitados del evento',0,0,'C');
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
        $this->Cell(54, 10, 'Nombre: '.$_SESSION['NameUser']." ".$_SESSION['LastnameUser'],0,0,'C');
        $this->Ln(20);
        $this->SetFont('Times','B',12);
        $this->SetTextColor(0,0,0);
        $this->Cell(70,10,' Nombre ', 0, 0,'L');
        $this->Cell(60,10,' Apellido ',0,0,'L');
        $this->Ln(1);
        $this->Line(10,60,200,60);
        $this->Ln();
    }

    function viewTable(){

        $this->SetFont('Times','',12);
        $result = $this->InvitesperEvent($_GET['idEvent']);
        if(count($result) > 0){
            foreach($result as $row){
                $this->Cell(70, 10, utf8_decode($row['namePerson']), 0 ,'L',false);
                $this->Cell(60, 10, utf8_decode($row['lastnamePerson']), 0 ,'L',false);
                $this->Ln();
            }
        }
        else{
            $this->Cell(200,10,' No hay lista de invitados ',0,0,'L');
        }
    }
}

if(!empty($_GET['idEvent'])){
    $pdf = new myPDF('p','mm','Letter');
    $pdf->SetMargins(15,15,15);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->headerTable();
    $pdf->viewTable();
    $pdf->Output();
}
else{
    header('location:../../redirects/404.html');
}
?>
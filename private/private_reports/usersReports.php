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
        $this->Cell(65, 5, 'Servicios de eventos',0,0,'L');
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
        $this->Cell(50,10,'Nombre', 0, 0,'L');
        $this->Cell(50,10,'Apellido', 0, 0,'L');
        $this->Cell(50,10,'Email', 0, 0,'L');
        $this->Cell(50,10,'Usuario', 0, 0,'L');
        $this->Cell(50,10,'Rol', 0, 0,'L');
        $this->Ln(3);
        $this->Line(10,57,240,57);
        $this->Ln();
    }

    function viewTable(){

        $this->SetFont('Times','',12);
        $result = $this->usersEmployee();
        if(count($result) > 0){
            foreach($result as $row){
                $this->Cell(50, 10, utf8_decode($row['name']), 0 ,'L',false);
                $this->Cell(50, 10, utf8_decode($row['lastname']), 0 ,'L',false);
                $this->Cell(50, 10, utf8_decode($row['email']), 0 ,'L',false);
                $this->Cell(50, 10, utf8_decode($row['username']), 0 ,'L',false);
                $this->Cell(50, 10, utf8_decode($row['nameRole']), 0 ,'L',false);
                $this->Ln();
            }
        }else{
            $this->Cell(30, 10, utf8_decode('No hay cantidad de Usuarios'), 0 ,'L',false);
        }
    }
}

    $pdf = new myPDF('l','mm','Letter');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->headerTable();
    $pdf->viewTable();
    $pdf->Output();
?>
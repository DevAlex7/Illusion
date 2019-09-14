<?php 
require_once('../../reports/PDF.php');
date_default_timezone_set('America/El_Salvador');
session_start();
class myPDF extends PDF {

    function header(){
        if($this->PageNo() == 1 ){
            $this->SetFillColor(235,10,0);
            $this->Rect(0, 0, 620, 50, 'F');
            $this->Ln(1);
            $this->SetTextColor(255,255,255);
            $this->SetFont('Arial','B',14);
            $this->Cell(65, 5, 'Inventario de bodega',0,0,'L');
            $this->Ln();
            $this->SetFont('Times','',12);
            $this->Ln(10);
        }
        else{
            $this->SetY(5);
        }
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
        $this->Cell(60,10,'Nombre de producto', 0, 0,'L');
        $this->Cell(30,10,'Cantidad', 0, 0,'C');
        $this->Cell(30,10,'Precio',0,0,'C');
        $this->Cell(30,10,'Imagen',0,0,'C');
        $this->Ln(3);
        $this->Line(10,60,200,60);
        $this->Ln();
    }

    function viewTable(){

        $this->SetFont('Times','',12);
        $result = $this->productsList();
        if(count($result) > 0){
            foreach($result as $row){
                $this->Cell(70, 10, utf8_decode( utf8_decode( $row['nameProduct']) ), 0 ,'L',false);
                $this->Cell(30, 10, utf8_decode($row['price']), 0 ,'L',false);
                $this->Cell(30, 10, utf8_decode($row['count']), 0 ,'L',false);
                $this->MultiCell(25,25, $this->Image("../../Imports/resources/pics/products/".$row['image_product'], $this->GetX(), $this->GetY(),25,25),0);
                $this->Ln();
            }
        }else{
            $this->Cell(30, 10, utf8_decode('No hay cantidad de productos'), 0 ,'L',false);
        }
    }
}

    $pdf = new myPDF('p','mm','Letter');
    $pdf->SetMargins(15,15,15);
    
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->headerTable();
    $pdf->viewTable();
    $pdf->Output();
?>
<?php 
require_once('../../reports/PDF.php');
date_default_timezone_set('America/El_Salvador');
session_start();
class myPDF extends PDF {
        function header(){
            $event = $this->InformationEvent($_GET['idEvent']);
            if(count($event)>0){
                $this->SetFillColor(235,10,0);
                $this->Rect(0, 0, 660, 50, 'F');
                $this->Ln(1);
                $this->SetTextColor(255,255,255);
                $this->SetFont('Arial','B',14);
                $this->Cell(200, 5, $event['data_event']['name_event'] ,0,1,'L');
                $this->Ln(7);

                //Event date
                setlocale(LC_TIME,"spanish");
                $date = $event['data_event']['date'];
                $fulldate = date("Y/m/d",strtotime($date));
                $fulldate = str_replace("/","-",$fulldate);
                $newDate = date("d-m-Y", strtotime($fulldate));
                $dateEvent = strftime("%A %d %B de %Y", strtotime($newDate));

                //Event date created
                setlocale(LC_TIME,"spanish");
                $date1 = $event['data_event']['date_created'];
                $fulldate1 = date("Y/m/d",strtotime($date1));
                $fulldate1 = str_replace("/","-",$fulldate1);
                $newDate1 = date("d-m-Y", strtotime($fulldate1));
                $created_date = strftime("%A %d %B de %Y", strtotime($newDate1));
                $this->Cell(200, 5, 'Fecha de evento: '.$dateEvent ,0,1,'L');
                $this->Ln(3);
                $this->Cell(200, 5, 'Fecha solicitado: '.$created_date ,0,1,'L');
                $this->Ln(1);
                $this->SetFont('Times','',12);
            }
            else{
                $this->SetFillColor(235,10,0);
                $this->Rect(0, 0, 660, 50, 'F');
                $this->Ln(1);
                $this->SetTextColor(255,255,255);
                $this->SetFont('Arial','B',14);
                $this->Cell(200, 5, $event['data_event']['name_event'] ,0,1,'L');
                $this->Ln(7);

                //Event date
                setlocale(LC_TIME,"spanish");
                $date = $event['data_event']['date'];
                $fulldate = date("Y/m/d",strtotime($date));
                $fulldate = str_replace("/","-",$fulldate);
                $newDate = date("d-m-Y", strtotime($fulldate));
                $dateEvent = strftime("%A %d %B de %Y", strtotime($newDate));

                //Event date created
                setlocale(LC_TIME,"spanish");
                $date1 = $event['data_event']['date_created'];
                $fulldate1 = date("Y/m/d",strtotime($date1));
                $fulldate1 = str_replace("/","-",$fulldate1);
                $newDate1 = date("d-m-Y", strtotime($fulldate1));
                $created_date = strftime("%A %d %B de %Y", strtotime($newDate1));
                $this->Cell(200, 5, 'Fecha de evento: '.'Sin información' ,0,1,'L');
                $this->Ln(3);
                $this->Cell(200, 5, 'Fecha solicitado: '.'Sin información' ,0,1,'L');
                $this->Ln(1);
                $this->SetFont('Times','',12);
            }   
        }
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Times','B',8);
            $this->Cell(0,10,'page'.$this->PageNo().'/{nb}',0,0,'C');
        }

        function headerTable(){
            $this->SetTextColor(255,255,255);
            $this->Cell(54, 10, 'Fecha: '.$date = date('m/d/Y h:i:s a', time()),0,0,'L');
            $this->Cell(54, 10, 'Usuario: '.$_SESSION['UsernameActive'],0 , 0 ,'C');
            $this->Cell(54, 10, 'Nombre: '.$_SESSION['NameUser']." ".$_SESSION['LastnameUser'],0,0,'C');
            $this->Ln(20);
            $this->SetFont('Times','B',12);
            $this->SetTextColor(0,0,0);
            $this->Cell(200,5,'Detalles del evento.',0,1,'L');
            $this->Ln(3);
            $this->Ln();
            $this->Line(10,65,200,65);
        }

        function viewTable(){
            $event = $this->InformationEvent($_GET['idEvent']);

            if(count($event) > 0){
                $this->SetFont('Times','',12);
                $this->Cell(200,5,'Cliente: '.$event['data_event']['client_name'],0,1,'L');
                $this->Ln();
                $this->Cell(200,5, utf8_decode('Tipo de evento solicitado: '.$event['data_event']['type']),0,1,'L');
                $this->Ln();
                $this->Cell(200,5, utf8_decode('Encargado: '.$event['data_event']['name'].' '.$event['data_event']['lastname'] ),0,1,'L');
                $this->Ln();
                $this->Cell(200,5, utf8_decode('Estado del evento: '.$event['data_event']['status']),0,1,'L');
                $this->Ln(4);
                $this->Cell(200,5, utf8_decode('Personas estimadas: '.$event['data_event']['persons']." personas"),0,1,'L');
                $this->Ln(6);
                $this->SetFont('Times','B',12);
                $this->SetTextColor(0,0,0);
                $this->Cell(200,5,'Lista de productos solicitados.',0,1,'L');
                $this->Ln(2);
                $this->Line(10,127,200,127);
                $this->Ln(2);
    
                if(count( $event['products_event']) > 0){
                    foreach($event['products_event'] as $row){
                        $this->Cell(40, 10, $row['nameProduct'],0 ,'L',false);
                        $this->Cell(30, 10, $row['count'],0 ,'L',false);
                        $this->Cell(30, 10, $row['price'],0 ,'L',false);
                        $this->Ln();
                    }
                }
                else{
                    $this->Ln(2);
                    $this->Cell(200,5, utf8_decode('No hay información.'),0,1,'L');
                }
                
                if( $event['cost']['Cost'] != NULL ){
                    $this->Cell(150,10,'Total: '.$event['cost']['Cost'],0,1,'L');
                }
                else{
                    $this->Cell(150,10,'Total: '.'0',0,1,'L');
                }
                $this->Ln(2);
                $this->Cell(200,5,'Colaboradores.',0,1,'L');
                $this->Ln(2);
                if(count($event['collaborators_event']) > 0){
                    foreach($event['collaborators_event'] as $row){
                        $this->Cell(40, 10, $row['name']." ".$row['lastname'],0 ,'L',false);
                        $this->Ln();
                    }
                }
                else{
                    $this->Ln(1);
                    $this->Cell(200,10,utf8_decode('No hay información'),0,1,'L');    
                }
            }
            else{
                $this->Ln(2);
                $this->Cell(200,5,'No hay información',0,1,'L');
            }
        }
}

if( !empty($_GET['idEvent']) ){
    $pdf = new myPDF('p','mm','Letter');
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
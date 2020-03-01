<?php

  require('../fpdf/fpdf.php');

  class PDF extends FPDF
  {
    function OutVar($arg)
    {
      return $this->$arg;
    }

    function CreateTable()
    {
      $var = 'Test';
      $this->Cell(191,10,'IN-FLIGHT ISSUE LOG',1,0,'C');
      $this->Ln();
      $this->SetFont('Times','B',8);
      $this->Cell(95,10,'1. MISSION NO: ',1);
      $this->Cell(96,5,'3. MISSION DATE AND TIME',1,0,'C');
      $this->Ln(2);
      $this->SetXY(105,25);
      $this->Cell(48,5,'a. START ',1,0,'C');
      $this->Ln(2);
      $this->SetXY(153,25);
      $this->Cell(48,5,'b. END ',1,0,'L');
      $this->Ln();
      $this->Cell(95,20,'2. TANKER (DoDAAC, Organization/Squadron Code, and Home Station) ',1);
      $this->Ln(2);
      $this->SetXY(105,30);
      $this->Cell(25,10,'DATE',1,0,'C');
      $this->Ln(2);
      $this->SetXY(135,30);
      $this->Cell(25,10,'TIME',1,0,'L');
      $this->Ln();
      // Data
    }
  }

  $pdf = new PDF();

  $pdf->SetFont('Arial','B',12);

  $pdf->AddPage();

  $pdf->CreateTable();

  $pdf->Output();

 ?>

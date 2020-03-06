<?php

  require('../../fpdf/fpdf.php');

  class PDF extends FPDF
  {
    function OutVar($arg)
    {
      return $this->$arg;
    }

    function CreateTable()
    {
      $var = 'Test';
      $this->SetXY(8,5);
      $this->Cell(194,10,'IN-FLIGHT ISSUE LOG',1,0,'C');
      $this->Ln();
      $this->SetFont('Times','B',8);
      $this->SetXY(8,15);
      $this->Cell(95,10,'1. MISSION NO: ',1);
      $this->Cell(99,5,'3. MISSION DATE AND TIME',1,0,'C');
      $this->Ln(2);
      $this->SetXY(103,20);
      $this->Cell(49,5,'a. START ',1,0,'C');
      $this->Ln(2);
      $this->SetXY(152,20);
      $this->Cell(50,5,'b. END ',1,0,'C');
      $this->Ln();
      $this->SetXY(8,25);
      $this->Cell(95,27,'2. TANKER (DoDAAC, Organization/Squadron Code, and Home Station) ',1,0,'L');
      $this->Ln(2);
      $this->SetXY(103,25);
      $this->Cell(27,10,'DATE',1,0,'L');
      $this->Ln(2);
      $this->SetXY(130,25);
      $this->Cell(22,10,'TIME(Zulu)',1,0,'L');
      $this->Ln(2);
      $this->SetXY(152,25);
      $this->Cell(27,10,'DATE',1,0,'L');
      $this->Ln(2);
      $this->SetXY(179,25);
      $this->Cell(23,10,'TIME(Zulu)',1,0,'L');
      $this->Ln(1);
      $this->SetXY(103,35);
      $this->Cell(27,17,"4. TANKER TYPE ",1,0,'L');
      /* $this->Text(110,50,"\ntest"); */
      $this->Ln(2);
      $this->SetXY(130,35);
      $this->Cell(49,17,"5. TANKER NUMBER ",1,0,'L');
      $this->Ln(2);
      $this->SetXY(179,35);
      $this->Cell(23,17,"6. FUEL GRADE ",1,0,'L');
      $this->Ln(1);
      $this->SetXY(8,52);
      $this->Cell(194,5," 7. ISSUES ",1,0,'C');
      $this->Ln(1);
      $this->SetFont('Times','B',5.5);
      $this->SetXY(8,57);
      $this->Cell(25,10," a. AIRCRAFT COMMAND ",1,0,'C');
      $this->Ln(2);
      $this->SetXY(33,57);
      $this->Cell(25,10," b. AIRCRAFT TYPE ",1,0,'C');
      $this->Ln(2);
      $this->SetXY(58,57);
      $this->Cell(25,10," c. AIRCRAFT NUMBER ",1,0,'C');
      $this->Ln(2);
      $this->SetXY(83,57);
      $this->Cell(25,10," c. AIRCRAFT CALL SIGN ",1,0,'C');
      $this->Ln(2);
      $this->SetXY(108,57);
      $this->Cell(50,10," d. AIRCRAFT (DoDAAC) ",1,0,'C');
      $this->Ln(2);
      $this->SetXY(158,57);
      $this->Cell(44,4," f. QUANTITY ISSUED ",1,0,'C');
      $this->Ln(1);
      $this->SetXY(158,61);
      $this->Cell(22,6," (1) POUNDS ",1,0,'C');
      $this->Ln(1);
      $this->SetXY(180,61);
      $this->Cell(22,6," (2) GALLONS ",1,0,'C');
      $this->Ln(1);
      /* -- Start Fillable Rows -- */
      $y = 67;
      for($i=0;$i<=24;$i++)
      {
        $this->SetXY(8,$y);
        $this->Cell(25,5,"  ",1,0,'C');
        $this->Ln(2);
        $this->SetXY(33,$y);
        $this->Cell(25,5,"  ",1,0,'C');
        $this->Ln(2);
        $this->SetXY(58,$y);
        $this->Cell(25,5,"  ",1,0,'C');
        $this->Ln(2);
        $this->SetXY(58,$y);
        $this->Cell(25,5,"  ",1,0,'C');
        $this->Ln(2);
        $this->SetXY(83,$y);
        $this->Cell(25,5,"  ",1,0,'C');
        $this->Ln(2);
        $this->SetXY(108,$y);
        $this->Cell(50,5,"  ",1,0,'C');
        $this->Ln(2);
        $this->SetXY(158,$y);
        $this->Cell(22,5,"  ",1,0,'C');
        $this->Ln(1);
        $this->SetXY(180,$y);
        $this->Cell(22,5,"  ",1,0,'C');
        $this->Ln(1);
        $y+=5;
      }
      $this->Ln(2);
      $this->SetXY(8,$y);
      $this->Cell(130,8," 8. REFUELER'S NAME AND GRADE ",1,0,'L');
      $this->Ln(1);
      $this->SetXY(138,$y);
      $this->Cell(20,8," g. TOTAL ",1,0,'C');
      $this->Ln(1);
      $this->SetXY(158,$y);
      $this->Cell(22,8," ",1,0,'C');
      $this->Ln(1);
      $this->SetXY(180,$y);
      $this->Cell(22,8," ",1,0,'C');
      $this->Ln();
      $this->SetXY(8,$y);
      $this->Cell(194,40,"",1,0,'L');
      $this->SetFont('Arial','B',8);
      $this->Text(10,205,"NOTES: ISSUES SECTION");
      $this->SetFont('Arial','',8);
      $this->Text(10,210,"    1. Aircraft Command (e.g., ACC, AMC, ANG, USN, FMS, FRG, etc)");
      $this->Text(10,213,"    2. Aircraft Type (e.g., B52G, F14A, F15A, S-3B, etc.)");
      $this->Text(10,216,"    3. Aircraft Number: Aircraft identification number/BUNO");
      $this->Text(10,219,"    4. Aircraft Call Sign: Self Explanatory");
      $this->Text(10,222,"    5. Aircraft DoDAAC, Organization/Squadron Code, and Home Station");
      $this->Text(10,225,"    6. Quantity Issued: Amount (entered in pounds or gallons) as applicable.");
      $this->Text(10,228,"NOTE:  When fuel is jettisoned, write 'JETTISONED' in the 'AIRCRAFT DoDAAC, Organization/Squadron Code, and Home Statio' column");
      $this->Text(10,231,"       and the amount of the fuel jettisoned in the 'Quantity Issued' column");
      $this->Ln();
      $this->SetFont('Arial','B',10);
      $this->Text(10,236,"DD FORM 791");
    }
  }

  $pdf = new PDF();

  $pdf->SetFont('Arial','B',12);

  $pdf->AddPage();

  $pdf->CreateTable();

  $pdf->Output();

 ?>

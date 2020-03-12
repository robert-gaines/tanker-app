<?php session_start() ?>
<?php include('session_checker.php'); ?>
<?php

  include('../../db/dbconnect.php');

  if(isset($_POST['mission_number']))
  {
    $mission_number = $_POST['mission_number'];
    $tail_number    = $_POST['tail_number'];
    $unit           = $_POST['unit'];
    $home_station   = $_POST['home_station'];
    $command        = $_POST['command'];
    $boom_operator  = $_POST['boom_operator'];
    $mission_date   = $_POST['mission_date'];
    $fuel_type      = $_POST['fuel_type'];
  }
  else
  {
    echo "<script> alert('Error') </script>";
  }
  $fileName  = "DD791";
  $transaction_array = array();
  $report_data_query = "SELECT * FROM transactions WHERE MISSION_NUMBER='{$mission_number}';";
  $tx_report_data_query = mysqli_query($conn,$report_data_query);

  while($row = mysqli_fetch_assoc($tx_report_data_query))
  {
    array_push($transaction_array,$row);
  }

  $ac_query = "SELECT * FROM acft_data WHERE TAILNUMBER='{$tail_number}';";
  $tx_ac_query = mysqli_query($conn,$ac_query);

  while($row = mysqli_fetch_assoc($tx_ac_query))
  {
    $country = $row['ACFT_COUNTRY'];
    $type    = $row['ACFT_TYPE'];
    $dodaac  = $row['DODAAC'];
  }

  require('../../fpdf/fpdf.php');

  class PDF extends FPDF
  {
    function CreateTable($mission_number,$dodaac,$unit,$home_station,$country,$mission_date,$type,$tail_number,$fuel_type,$boom_operator,$transaction_array)
    {
      $var = 'Test';
      $this->SetXY(8,5);
      $this->Cell(194,10,'IN-FLIGHT ISSUE LOG',1,0,'C');
      $this->Ln();
      $this->SetFont('Times','B',8);
      $this->SetXY(8,15);
      $this->Cell(95,10,'1. MISSION NO: ',1);
      $this->Text(32,20.95,"$mission_number");
      $this->Cell(99,5,'3. MISSION DATE AND TIME',1,0,'C');
      $this->Ln(2);
      $this->SetXY(103,20);
      $this->Cell(49,5,'a. START ',1,0,'C');
      $this->Ln(2);
      $this->SetXY(152,20);
      $this->Cell(50,5,'b. END ',1,0,'C');
      $this->Ln();
      $this->SetXY(8,25);
      $this->Text(9,28,'2. TANKER (DoDAAC, Organization/Squadron Code, and Home Station) ');
      $this->Cell(95,27,'',1,0,'L');
      $this->Text(12,32,"$dodaac");
      $this->Text(12,35,"$unit");
      $this->Text(12,38,"$home_station");
      $offset = strlen($home_station)*1.5;
      $this->Text(12+$offset,38,"$country");
      $this->Ln(2);
      $this->SetXY(103,25);
      $this->Text(112,28,'DATE');
      $this->Cell(27,10,'',1,0,'L');
      $this->Text(109,32,"$mission_date");
      $this->Ln(2);
      $this->SetXY(130,25);
      $this->Text(132.5,28,'TIME (Zulu)');
      $this->Cell(22,10,'',1,0,'L');
      $this->Ln(2);
      $this->SetXY(152,25);
      $this->Text(161,28,'DATE');
      $this->Cell(27,10,'',1,0,'L');
      $this->Text(158,32,"$mission_date");
      $this->Ln(2);
      $this->SetXY(179,25);
      $this->Text(182,28,'TIME(Zulu)');
      $this->Cell(23,10,'',1,0,'L');
      $this->Ln(1);
      $this->SetXY(103,35);
      $this->Text(104,38,'4. TANKER TYPE ');
      $this->Cell(27,17,'',1,0,'L');
      $this->Text(113,45,"$type");
      $this->Ln(2);
      $this->SetXY(130,35);
      $this->Text(131,38,"5. TANKER NUMBER ");
      $this->Cell(49,17,'',1,0,'L');
      $this->Text(148,45,"$tail_number");
      $this->Ln(2);
      $this->SetXY(179,35);
      $this->Text(180,38,"6. FUEL GRADE ");
      $this->Cell(23,17,'',1,0,'L');
      $this->Text(183,45,"$fuel_type");
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
      $totalPounds  = 0;
      $totalGallons = 0;
      foreach($transaction_array as $t)
      {
        $this->SetXY(8,$y);
        $this->Cell(25,5,"  ",1,0,'C');
        $this->Text(10,$y+4,$t['COMMAND']);
        $this->Ln(2);
        $this->SetXY(33,$y);
        $this->Cell(25,5,"  ",1,0,'C');
        $this->Text(38,$y+4,$t['ACFT_TYPE']);
        $this->Ln(2);
        $this->SetXY(58,$y);
        $this->Cell(25,5,"  ",1,0,'C');
        $this->Text(61.5,$y+4,$t['TAIL_NUMBER']);
        $this->Ln(2);
        $this->SetXY(58,$y);
        $this->Cell(25,5,"  ",1,0,'C');
        $this->Text(86,$y+4,$t['CALLSIGN']);
        $this->Ln(2);
        $this->SetXY(83,$y);
        $this->Cell(25,5,"  ",1,0,'C');
        $this->Text(123.5,$y+4,$t['DODAAC']);
        $this->Ln(2);
        $this->SetXY(108,$y);
        $this->Cell(50,5,"  ",1,0,'C');
        $this->Text(166,$y+4,$t['POUNDS_DELIVERED']);
        $totalPounds += $t['POUNDS_DELIVERED'];
        $this->Ln(2);
        $this->SetXY(158,$y);
        $this->Cell(22,5,"  ",1,0,'C');
        $this->Ln(1);
        $this->SetXY(180,$y);
        $this->Cell(22,5,"  ",1,0,'C');
        $this->Text(187.5,$y+4,$t['TOTAL_GALLONS']);
        $totalGallons += $t['TOTAL_GALLONS'];
        $this->Ln(1);
        $y+=5;
      }
      /* Display Padding */
      for($i=0;$i<=(24-count($transaction_array));$i++)
      {
        $this->SetXY(8,$y);
        $this->Cell(25,5,"  ",1,0,'C');
        $this->Text(183,45,"");
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
      $this->Text(50,$y+4.5,"$boom_operator");
      $this->Ln(1);
      $this->SetXY(138,$y);
      $this->Cell(20,8," g. TOTAL ",1,0,'C');
      $this->Ln(1);
      $this->SetXY(158,$y);
      $this->Cell(22,8," ",1,0,'C');
      $this->Text(166,$y+4,$totalPounds);
      $this->Ln(1);
      $this->SetXY(180,$y);
      $this->Cell(22,8," ",1,0,'C');
      $this->Text(186,$y+4,$totalGallons);
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
      $this->Text(10,228,"NOTE:  When fuel is jettisoned, write 'JETTISONED' in the 'AIRCRAFT DoDAAC, Organization/Squadron Code, and Home Station column");
      $this->Text(10,231,"       and the amount of the fuel jettisoned in the 'Quantity Issued' column");
      $this->Ln();
      $this->SetFont('Arial','B',10);
      $this->Text(10,236,"DD FORM 791");
    }
  }

  $pdf = new PDF();

  $pdf->SetFont('Arial','B',12);

  $pdf->AddPage();

  $pdf->CreateTable($mission_number,$dodaac,$unit,$home_station,$country,$mission_date,$type,$tail_number,$fuel_type,$boom_operator,$transaction_array);

  $pdf->Output();

  $pdf->Output('D',$fileName);

 ?>

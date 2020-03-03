<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mission Entry</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../../style/bootstrap/dist/css/bootstrap.css">
  <script src="../../style/bootstrap/dist/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../../style/custom/custom.css">
  <link rel="stylesheet" href="../../style/custom/dynamic_form.css">
  <?php  include('../view/navbar.php')  ?>
  <?php include('../../db/dbconnect.php') ?>
  <style media="screen">

  body
  {
    background-color: #333;
  }

  .custom-container
  {
    margin: 0 auto;
    width: 1500px;
  }

  .container-dynamic
  {
    margin-top: 10px;
    padding-top:10px;
    padding-left: 10px;
    padding-bottom: 10px;
  }

  .form-title
  {
    background-color: lightgray;
    width: auto;
    margin-bottom: 20px;
  }

  .form-inline
  {
    margin-top: 5px;
    margin-left: 5px;
    margin-right: 5px;
  }

  h6
  {
    margin-top: 5px;
  }

  th
  {
    font-size: 12px;
  }

  table
  {
    border-collapse: collapse;
    /* width: 1800px; */
  }

  td
  {
    width: 50px;
  }

  </style>

</head>
  <!--
    Variable Names:
    --------------
    host_tail_number
    host_unit
    home_station
    host_command
    boom_operator
    transaction_date
    julian_date
    fuel_type

    Dynamic Arrays
    --------------
    Jettison
    Branch
    tail_criteria
    tail_number
    acft_type
    unit
    dodaac
    command
    callsign
    lbs
    gallons
    foreign
    -->
<?php
  $tail_number_query = "SELECT TAILNUMBER FROM acft_data";
  $tx_tn_query = mysqli_query($conn,$tail_number_query);
  $unit_query = "SELECT UNIT FROM acft_data";
  $tx_unit_query = mysqli_query($conn,$unit_query);
 ?>

<body>
  <div class="custom-container">
   <form class="form-inline" action="#" method="post">
     <div class="container-static">
       <br>
       <h6 style="margin-left: 10px;">Mission Data</h6>
       <hr>
       <div class="form-inline form-custom" style="float: left;">
         <select class="form-control-sm mb-2" name="host_tail_number">
           <option value="" disabled selected hidden> Tail # </option>
           <?php
             while($row = mysqli_fetch_assoc($tx_tn_query))
             {
               foreach($row as $entry => $value)
               {
                 echo "<option value='{$value}'>$value</option>";
               }
             }
            ?>
         </select>
       </div>
       <div class="form-inline" style="float: left;">
         <select class="form-control-sm mb-2 text-center" name="host_unit">
           <option value="" disabled selected hidden>  Unit  </option>
           <?php
             while($row = mysqli_fetch_assoc($tx_unit_query))
             {
               foreach($row as $entry => $value)
               {
                 echo "<option value='{$value}'>$value</option>";
               }
             }
            ?>
         </select>
       </div>
     <div class="form-inline" style="float: left;">
       <select class="form-control-sm mb-2" name="home_station">
         <option value="" disabled selected hidden>  Home Station  </option>
         <option value=""><?php echo "TEST"; ?></option>
         <option value=""><?php echo "TEST" ?></option>
         <option value=""><?php echo "TEST" ?></option>
       </select>
     </div>
   <div class="form-inline" style="float: left;">
     <select class="form-control-sm mb-2" name="host_command">
       <option value="" disabled selected hidden>  Command  </option>
       <option value=""><?php echo "TEST"; ?></option>
       <option value=""><?php echo "TEST" ?></option>
       <option value=""><?php echo "TEST" ?></option>
     </select>
   </div>
   <br><br><br>
   <div class="form-inline" style="float: left;">
     <input class="form-control-sm text-center" type="text" name="mission_number" value="" placeholder="Mission #">
   </div>
   <div class="form-inline" style="float: left;">
    <select class="form-control-sm mb-2" name="boom_operator">
     <option value="" disabled selected hidden>  Boom Operator  </option>
     <option value=""><?php echo "TEST"; ?></option>
     <option value=""><?php echo "TEST" ?></option>
     <option value=""><?php echo "TEST" ?></option>
    </select>
   </div>
   <div class="form-inline" style="float: left;">
    <input class="form-control-sm text-center" type="text" onfocus="(this.type='date')" name="transaction_date" value="" placeholder="Transaction Date">
   </div>
   <div class="form-inline" style="float: left;">
    <input class="form-control-sm text-center" type="text" name="julian_date" value="" placeholder="Julian Date">
   </div>
   <div class="form-inline" style="float: left;">
    <select class="form-control-sm mb-2" name="fuel_type">
     <option value="" disabled selected hidden>  Fuel Type  </option>
     <option value=""><?php echo "TEST"; ?></option>
     <option value=""><?php echo "TEST" ?></option>
     <option value=""><?php echo "TEST" ?></option>
    </select>
   </div>
  </div>
  <br><br><br>
   <div class="container-dynamic" style="float: left;">
     <div class="form-title">
       <h6>&nbsp Transaction Data</h6>
       <hr>
     </div>
    <table class="table-responsive mx-auto">
     <thead>
       <tr>
         <button class="add_form_field btn btn-primary"> + <span style="font-size:16px; font-weight:bold; "> </span> <!-- </button> <input type="text" name="mytext[]"> -->
       </tr>
       <tr>
         <th class="text-left">Jettison</th>
         <th></th>
         <th class="text-left"></th>
         <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
         <th class="text-center"></th>
         <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
         <th class="text-left"></th>
         <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
         <th class="text-left"></th>
         <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
         <th class="text-left"></th>
         <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
         <th class="text-left"></th>
         <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
         <th class="text-left"></th>
         <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
         <th class="text-left"></th>
         <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
         <th class="text-left"></th>
         <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
         <th class="text-left"></th>
         <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
         <th class="text-left"></th>
         <th></th>
       </tr>
      </thead>
      <tbody>
     </tbody>
    </table>
   </div>
   <br><br><br>
   <div class="container mx-auto text-center" style="margin-top: 150px; background-color:lightgray;">
     <button type="reset" class="btn btn-danger col-sm-3"> Reset </button>
     <br><br>
     <button type="submit" class="btn btn-primary col-sm-3" name="login">Submit</button>
   </div>
  </form>
 </div>
</body>

</html>

<?php

  /*
  Variable Names:
  --------------
  host_tail_number
  host_unit
  home_station
  host_command
  boom_operator
  transaction_date
  julian_date
  fuel_type

  Dynamic Arrays
  --------------
  Jettison
  Branch
  tail_criteria
  tail_number
  acft_type
  unit
  dodaac
  command
  callsign
  lbs
  gallons
  foreign
  */

  if(isset($_POST))
  {
    $mission          = array();
    $host_tail        = $_POST['host_tail_number'];
    $host_unit        = $_POST['host_unit'];
    $host_station     = $_POST['home_station'];
    $host_command     = $_POST['host_command'];
    $boom_operator    = $_POST['boom_operator'];
    $transaction_date = $_POST['transaction_date'];
    $julian_date      = $_POST['fuel_type'];
    //
    if($_POST['jettison'] === 'True')
    {
      $jettison = True;
    }
    else {
      $jettison = False;
    }
    $branch        = $_POST['branch'];
    $tail_criteria = $_POST['tail_criteria'];
    $tail_number   = $_POST['tail_number'];
    $acft_type     = $_POST['acft_type'];
    $unit          = $_POST['unit'];
    $dodaac        = $_POST['dodaac'];
    $command       = $_POST['command'];
    $callsign      = $_POST['callsign'];
    $pounds        = $_POST['lbs'];
    $gallons       = $_POST['gallons'];
    $foreign       = $_POST['foreign'];

    array_push($mission,$host_tail,$host_unit,$host_station,$host_command,$host_operator,$transaction_date,$julian_date);
    array_push($mission,$tail_criteria,$tail_number,$acft_type,$unit,$dodaac,$command,$callsign,$pounds,$gallons,$country);

    //print_r($mission);
  }
  else {
    echo "ERROR";
  }

 ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    var max_fields      = 24;
    var wrapper         = $(".container-dynamic");
    var add_button      = $(".add_form_field");
    var x = 1;
    $(add_button).click(function(e){
        e.preventDefault();
        if(x < max_fields){
            x++;
            var markup;
            markup  = '<div class="form-inline">'
            markup += '<tr>'
            markup += '<td><input type="checkbox" class="form-check-input-sm" style="margin-left: -110px;" value="True" id="jettison" name="jettison[]"></td>' /* Jettison */
            markup += "<td>"
            markup += '<select class="form-control-sm mb-2" name="branch" style="margin-left: -105px; margin-right: 50px;">' /* Branch */
            markup += '<option value="" disabled selected hidden>Branch</option>'
            markup += '<option value=""><?php echo "TEST"; ?></option>'
            markup += '</select>'
            markup += "</td>"
            markup += "<td>"
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -45px; margin-right: 50px;" type="text" name="tail_criteria[]" placeholder="Tail# Criteria"/>' /* tail number criteria */
            markup += "</td>"
            markup += "<td>"
            markup += '<select class="form-control-sm mb-2 col-sm-1" style="margin-left: -45px; margin-right: 45px;" name="tail_number[]">' /* tail number */
            markup += '<option value="" disabled selected hidden>Tail Number</option>'
            markup += '<option value=""><?php echo "TEST"; ?></option>'
            markup += '</select>'
            markup += '</td>'
            markup += "<td>"
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -40px; margin-right: 10px;" type="text" name="acft_type[]" placeholder="Aircraft Type"/>' /* ACFT Type */
            markup += "</td>"
            markup += "<td>"
            markup += '<select class="form-control-sm mb-2 col-sm-1" style="margin-left: -5px; margin-right: 15px;" name="unit[]">' /* Unit */
            markup += '<option value="" disabled selected hidden>Unit</option>'
            markup += '<option value=""><?php echo "TEST"; ?></option>'
            markup += '</select>'
            markup += '</td>'
            markup += "<td>"
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="dodaac[]" placeholder="DODAAC"/>' /* DODAAC */
            markup += "</td>"
            markup += "<td>"
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="command[]" placeholder="Command"/>' /* Command */
            markup += "</td>"
            markup += "<td>"
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="callsign[]" placeholder="Callsign"/>' /* Callsign */
            markup += "</td>"
            markup += "<td>"
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="lbs[]" placeholder="Lbs. Delivered"/>' /* Pounds Delivered*/
            markup += "</td>"
            markup += "<td>"
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="gallons[]" placeholder="Gallons"/>' /* Gallons */
            markup += "</td>"
            markup += "<td>"
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="foreign[]" placeholder="FMS/Country"/>' /* FMS/Country */
            markup += "</td>"
            markup += "<td>"
            markup += '<a href="#" class="delete btn btn-danger">X</a></div>'
            markup += "</td>"
            markup += "</tr>"
            $(wrapper).append(markup); //add input box
            /* '<div class="form-inline"><input type="checkbox" class="form-check-input" style="margin: -75px;" value="check"><input class="form-control col-sm-3" type="text" name="mytext[]"/><a href="#" class="delete btn btn-danger">Delete</a></div>' */
        }
        /*
        <div class="form-inline" style="float: left;">
         <select class="form-control-sm mb-2" name="unitnumber">
          <option value="" disabled selected hidden>  Boom Operator  </option>
          <option value=""><?php echo "TEST"; ?></option>
          <option value=""><?php echo "TEST" ?></option>
          <option value=""><?php echo "TEST" ?></option>
         </select>
        */
  else
  {
  alert(' WARNING: Standard DD Form 791 Has 24 Fields ')
  }
    });

    $(wrapper).on("click",".delete", function(e){
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>

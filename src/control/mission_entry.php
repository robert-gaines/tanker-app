<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mission Entry</title>
  <link rel="stylesheet" href="../style/bootstrap/dist/css/bootstrap.css">
  <script src="../style/bootstrap/dist/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../style/custom/custom.css">
  <link rel="stylesheet" href="../style/custom/dynamic_form.css">
  <?php session_start() ?>
  <?php include('session_checker.php'); ?>
  <?php error_reporting(0);                   ?>
  <?php
    if(isset($_SESSION['valid_admin']))
    {
      include('../view/admin-navbar.php');
    }
    else {
      include('../view/navbar.php');
    }
   ?>
  <?php include('../../db/dbconnect.php') ?>

  <style media="screen">

  body
  {
    background-color: gray;
  }

  .custom-container
  {
    height: 100%;
    margin-top:50px;
    margin: 0 auto;
    width: auto;
  }

  .container-static
  {
    width: auto;
    margin-bottom: 100px;
  }

  .container-dynamic
  {
    height: 100%;
    width: auto;
    padding-top: 10px;
    padding-left: 10px;
    padding-bottom: 10px;
    margin-top: 50px;
    background-color:lightgray;
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

  .hidden-form
  {
    display: none;
  }

  th
  {
    position: sticky;
    top: 0px;
    background: white;
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

    Dynamic Array
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
  $tail_number_query = "SELECT DISTINCT TAILNUMBER FROM ACFT_DATA ORDER BY TAILNUMBER ASC";
  $tx_tn_query = mysqli_query($conn,$tail_number_query);
  $unit_query = "SELECT DISTINCT UNIT FROM ACFT_DATA";
  $tx_unit_query = mysqli_query($conn,$unit_query);
  $location_query = "SELECT DISTINCT LOCATION FROM ACFT_DATA";
  $tx_location_query = mysqli_query($conn,$location_query);
  $cmd_query = "SELECT DISTINCT CMD FROM ACFT_DATA";
  $tx_cmd_query = mysqli_query($conn,$cmd_query);
 ?>

 <?php
   $user_query = "SELECT USER_FIRST,USER_LAST FROM USERS WHERE IS_BOOM='boom';";
   $tx_boom_query = mysqli_query($conn,$user_query);
  ?>

  <?php

    $tn_second_query = "SELECT TAILNUMBER,ACFT_TYPE,UNIT,DODAAC,LOCATION FROM ACFT_DATA;";
    $tx_second_query = mysqli_query($conn,$tn_second_query);

   ?>

 <?php

   function ConvertDate($date)
   {
     $segments = explode('-',$date);
     $newDate  = gregoriantojd($segments[1],$segments[2],$segments[0]);
     return $newDate;
   }

   function RetrieveUnit($var,$conn)
   {
     $query = "SELECT UNIT FROM acft_data WHERE TAILNUMBER='{$var}';";
     $tx_query = mysqli_query($conn,$query);
     if($tx_query)
     {
       while($row = mysqli_fetch_assoc($tx_query))
       {
         return $row['UNIT'];
       }
     }
   }

  ?>

  <script type="text/javascript">

    function setCookie(cname, cvalue, exdays)
    {
       var d = new Date();
       d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
       var expires = "expires="+d.toUTCString();
       document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function convertDate(val)
    {
      setCookie('date',val,1);
      var julian_date = <?php echo json_encode(ConvertDate($_COOKIE['date'])); ?>;
      document.getElementById("julian_date").value = julian_date;
    }

  </script>

<body>
  <div class="custom-container">
   <form class="form-inline" action="process_mission.php" method="post">
     <div class="container-static">
       <br>
       <h6 style="margin-left: 10px;">Mission Data</h6>
       <hr>
       <div class="form-inline form-custom" style="float: left;">
         <select class="form-control-sm mb-2" name="host_tail_number" id="host_tail_number" required>
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
         <select class="form-control-sm col-sm-3 mb-2 text-center" name="host_unit" id="host_unit" required>
           <option value="" disabled selected hidden>Unit</option>
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
         &nbsp&nbsp
         <select class="form-control-sm mb-2 col-sm-3" name="home_station" id='host_station'  required>
           <option value="" disabled selected hidden>  Location  </option>
           <?php
             while($row = mysqli_fetch_assoc($tx_location_query))
             {
               foreach($row as $entry => $value)
               {
                 echo "<option value='{$value}'>$value</option>";
               }
             }
            ?>
         </select>
         &nbsp&nbsp
         <select class="form-control-sm mb-2 col-sm-3" name="host_command" id='host_command' required>
           <option value="" disabled selected hidden>  Command  </option>
           <?php
             while($row = mysqli_fetch_assoc($tx_cmd_query))
             {
               foreach($row as $entry => $value)
               {
                 echo "<option value='{$value}'>$value</option>";
               }
             }
            ?>
         </select>
       </div>
   <br><br><br>
   <div class="form-inline" style="float: left;">
     <input class="form-control-sm text-center" type="text" name="mission_number" placeholder="Mission #" required>
   </div>
   <div class="form-inline" style="float: left;">
     <?php
     echo "<select class='form-control-sm mb-2' style='float: left;' name='boom_operator' id='boom_operator' required>";
     echo "<option value='' disabled selected hidden> Boom Operator </option>";
     while($row = mysqli_fetch_assoc($tx_boom_query))
     {
       $fullName = $row['USER_FIRST']." ".$row['USER_LAST'];
       echo "<option value='{$fullName}'>$fullName</option>";
     }
     echo "</select>";
     ?>
   </div>
   <div class="form-inline" style="float: left;">
    <input class="form-control-sm text-center" type="text" onfocus="(this.type='date')" name="transaction_date" id="transaction_date" oninput="convertDate(this.value)" value="" placeholder="Transaction Date" required>
   </div>
   <div class="form-inline" style="float: left;">
    <input class="form-control-sm text-center" type="text" name="julian_date" id='julian_date' value="" placeholder="Julian Date" required>
   </div>
   <div class="form-inline" style="float: left;">
    <select class="form-control-sm mb-2" name="fuel_type" required>
     <option value="" disabled selected hidden>  Fuel Type  </option>
     <option value="JP-8"><?php echo "JP-8"; ?></option>
     <option value="JP-5"><?php echo "JP-5"; ?></option>
     <option value="AVGAS"><?php echo "AVGAS"; ?></option>
    </select>
   </div>
   <br><br><br>
   <div style="float:left; margin-left: 10px; margin-top: 10px; margin-bottom: 15px;">
     <button type="button" name="ac_table" class="btn btn-block btn-dark" data-toggle="modal" data-target="#ac_table"> Research Tailnumbers </button>
   </div>
  </div>
  <br>
  <div class="form-title text-left" style="width: 100%; margin-top: 10px;">
    <h6>&nbsp Transaction Data</h6>
    <hr>
  </div>
  <div class="container-dynamic" style="float: left; margin-top: 0px; margin-bottom: 10px; margin-left: 50px;">
   <div>
    <button class="add_form_field btn btn-primary"> + <span style="font-size:16px; font-weight:bold; margin-bottom: 15px;"> </span>
   </div>
   <br>
 </div>
 <div class="container mx-auto text-center" style="margin-top: 10px; background-color:lightgray;">
   <button type="reset" class="btn btn-danger col-sm-3"> Reset </button>
   <button type="submit" class="btn btn-primary col-sm-3" name="entry">Submit</button>
 </div>
  </form>

  <div class="modal fade" id="ac_table" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
     <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Aircraft Data</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
       </button>
        </div>
        <table class="table table-hover table-responsive overflow-auto" style="max-height: 300px; width: 1200px;">
          <thead class="text-center">
            <th>Tail #</th>
            <th>Aircraft Type</th>
            <th>Unit</th>
            <th>DODAAC</th>
            <th>Location</th>
          </thead>
          <tbody class="text-center">
            <?php
                while($row = mysqli_fetch_assoc($tx_second_query))
                {
                  $tailnumber = $row['TAILNUMBER'];
                  $type       = $row['ACFT_TYPE'];
                  $unit       = $row['UNIT'];
                  $dodaac     = $row['DODAAC'];
                  $location   = $row['LOCATION'];
                  echo "<tr>";
                  echo "<td>$tailnumber</td>";
                  echo "<td>$type</td>";
                  echo "<td>$unit</td>";
                  echo "<td>$dodaac</td>";
                  echo "<td>$location</td>";
                  echo "</tr>";
                }
             ?>
          </tbody>
        </table>
        </form>
      </div>
    </div>
  </div>

</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
<?php

  $alt_tail_number_query = "SELECT DISTINCT TAILNUMBER FROM ACFT_DATA ORDER BY TAILNUMBER ASC";
  $tx_alt_tn_query = mysqli_query($conn,$tail_number_query);
  $alt_unit_query = "SELECT DISTINCT UNIT FROM ACFT_DATA";
  $tx_alt_unit_query = mysqli_query($conn,$alt_unit_query);

 ?>

function popOut()
{
  var jettison_type = prompt("What type of jettison occurred?");
}

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
            markup  = '<div class="form-inline col-sm-12">'
            /* markup += '<input type="checkbox" onclick="popOut()" class="form-check-input-sm" style="margin-left: -110px;" value="True" id="jettison" name="jettison[]">' /* Jettison */
            markup += '<select class="form-control-sm mb-2" name="jettison[]" style="margin-left: -15px; margin-right: 55px;" required>' /* Jettison */
            markup += '<option value="" disabled selected hidden>Jettison?</option>'
            markup += '<option value="no"> No </option>';
            markup += '<option value="controlled"> Yes - Controlled    </option>';
            markup += '<option value="uncontrolled"> Yes - Uncontrolled  </option>';
            markup += '</select>'
            markup += '<select class="form-control-sm mb-2" name="branch[]" style="margin-left: -50px; margin-right: 5px;">' /* Branch */
            markup += '<option value="" disabled selected hidden>Branch</option>'
            markup += '<option value="USAF"> USAF </option>';
            markup += '<option value="USN"> USN  </option>';
            markup += '<option value="FMS"> FMS  </option>';
            markup += '</select>'
            markup += '<select class="form-control-sm mb-2" style="margin-left: 0px; margin-right: 15px;" name="tail_number[]">' /* tail number */
            markup += '<option value="" disabled selected hidden>Tail#</option>'
            markup += "<?php while($intake=mysqli_fetch_assoc($tx_alt_tn_query)){foreach($intake as $key=>$value) { echo "<option value='{$value}'>$value</option>"; } }?>"
            markup += '</select>'
            markup += '<input class="form-control-sm mb-2 text-center col-sm-1" style="margin-left: -10px; margin-right: 10px;" type="text" name="acft_type[]" placeholder="Aircraft Type"/>' /* ACFT Type */
            markup += '<select class="form-control-sm mb-2 col-sm-1" style="margin-left: -5px; margin-right: 15px;" name="unit[]">' /* Unit */
            markup += '<option value="" disabled selected hidden>Unit</option>'
            markup += "<?php while($var=mysqli_fetch_assoc($tx_alt_unit_query)){ foreach($var as $v){ $str=substr($v,0,12); echo "<option value='{$str}'>$str</option>"; } } ?>"
            markup += '</select>'
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="dodaac[]" placeholder="DODAAC"/>' /* DODAAC */
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="command[]" placeholder="Command"/>' /* Command */
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="callsign[]" placeholder="Callsign"/>' /* Callsign */
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="lbs[]" placeholder="Lbs. Delivered" required />' /* Pounds Delivered*/
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="gallons[]" placeholder="Gallons" required />' /* Gallons */
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="country[]" placeholder="Country"/>' /* FMS/Country */
            markup += '<a href="#" class="delete btn btn-danger">X</a></div>'
            $(wrapper).append(markup);
        }
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

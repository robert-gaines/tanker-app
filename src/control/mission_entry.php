<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mission Entry</title>
  <link rel="stylesheet" href="../../style/bootstrap/dist/css/bootstrap.css">
  <script src="../../style/bootstrap/dist/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../../style/custom/custom.css">
  <link rel="stylesheet" href="../../style/custom/dynamic_form.css">
  <?php session_start() ?>
  <?php include('session_checker.php'); ?>
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
    background-color: #333;
  }

  .custom-container
  {
    height: 100%;
    margin-top:50px;
    margin: 0 auto;
    width: 75%;
  }

  .container-static
  {
    width: 100%;
    margin-bottom: 100px;
  }

  .container-dynamic
  {
    height: 100%;
    padding-top: 10px;
    padding-left: 10px;
    padding-bottom: 10px;
    margin-top: 50px;
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
  $tail_number_query = "SELECT DISTINCT TAILNUMBER FROM acft_data ORDER BY TAILNUMBER ASC";
  $tx_tn_query = mysqli_query($conn,$tail_number_query);
  $unit_query = "SELECT DISTINCT UNIT FROM acft_data";
  $tx_unit_query = mysqli_query($conn,$unit_query);
  $location_query = "SELECT DISTINCT LOCATION FROM acft_data";
  $tx_location_query = mysqli_query($conn,$location_query);
  $cmd_query = "SELECT DISTINCT CMD FROM acft_data";
  $tx_cmd_query = mysqli_query($conn,$cmd_query);
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
         <select class="form-control-sm mb-2 text-center" name="host_unit" id="host_unit" required>
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
       </div>
     <div class="form-inline" style="float: left;">
       <select class="form-control-sm mb-2" name="home_station" id='host_station'  required>
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
     </div>
   <div class="form-inline" style="float: left;">
     <select class="form-control-sm mb-2" name="host_command" id='host_command' required>
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
    <select class="form-control-sm mb-2" name="boom_operator" required>
     <option value="" disabled selected hidden>  Boom Operator  </option>
     <option value="Operator 1"><?php echo "Operator 1"; ?></option>
     <option value="Operator 2"><?php echo "Operator 2"; ?></option>
     <option value="Operator 3"><?php echo "Operator 3"; ?></option>
    </select>
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
     <option value="REGULAR"><?php echo "REGULAR"; ?></option>
     <option value="UNLEADED"><?php echo "UNLEADED"; ?></option>
     <option value="PREMIUM"><?php echo "PREMIUM"; ?></option>
    </select>
   </div>
  </div>
  <br><br><br>
  <div class="form-title text-left" style="width: 100%; margin-top: 10px;">
    <h6>&nbsp Transaction Data</h6>
    <hr>
  </div>
  <div class="container-dynamic" style="float: left; margin-top: 10px; margin-bottom: 10px;">
   <div>
    <button class="add_form_field btn btn-primary"> + <span style="font-size:16px; font-weight:bold; margin-bottom: 15px; "> </span> <!-- </button> <input type="text" name="mytext[]"> -->
   </div>
    <p class="text-left" style="margin-top: 10px;">Jettison?</p>
   <br>
 </div>
 <div class="container mx-auto text-center" style="margin-top: 10px; background-color:lightgray;">
   <button type="reset" class="btn btn-danger col-sm-3"> Reset </button>
   <button type="submit" class="btn btn-primary col-sm-3" name="login">Submit</button>
 </div>
  </form>

</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
<?php

  $alt_tail_number_query = "SELECT DISTINCT TAILNUMBER FROM acft_data ORDER BY TAILNUMBER ASC";
  $tx_alt_tn_query = mysqli_query($conn,$tail_number_query);
  $alt_unit_query = "SELECT DISTINCT UNIT FROM acft_data";
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
            markup  = '<div class="form-inline">'
            markup += '<input type="checkbox" onclick="popOut()" class="form-check-input-sm" style="margin-left: -110px;" value="True" id="jettison" name="jettison[]">' /* Jettison */
            markup += '<select class="form-control-sm mb-2" name="branch[]" style="margin-left: -105px; margin-right: 50px;">' /* Branch */
            markup += '<option value="" disabled selected hidden>Branch</option>'
            markup += '<option value="USAF"> USAF </option>';
            markup += '<option value="USN"> USN  </option>';
            markup += '<option value="FMS"> FMS  </option>';
            markup += '</select>'
            markup += '<select class="form-control-sm mb-2 col-sm-1" style="margin-left: -45px; margin-right: 45px;" name="tail_number[]">' /* tail number */
            markup += '<option value="" disabled selected hidden>Tail#</option>'
            markup += "<?php while($intake=mysqli_fetch_assoc($tx_alt_tn_query)){foreach($intake as $key=>$value) { echo "<option value='{$value}'>$value</option>"; } }?>"
            markup += '</select>'
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -40px; margin-right: 10px;" type="text" name="acft_type[]" placeholder="Aircraft Type"/>' /* ACFT Type */
            markup += '<select class="form-control-sm mb-2 col-sm-1" style="margin-left: -5px; margin-right: 15px;" name="unit[]">' /* Unit */
            markup += '<option value="" disabled selected hidden>Unit</option>'
            markup += "<?php while($var=mysqli_fetch_assoc($tx_alt_unit_query)){ foreach($var as $v){ $str=substr($v,0,12); echo "<option value='{$str}'>$str</option>"; } } ?>"
            markup += '</select>'
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="dodaac[]" placeholder="DODAAC"/>' /* DODAAC */
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="command[]" placeholder="Command"/>' /* Command */
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="callsign[]" placeholder="Callsign"/>' /* Callsign */
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="lbs[]" placeholder="Lbs. Delivered"/>' /* Pounds Delivered*/
            markup += '<input class="form-control-sm mb-2 col-sm-1 text-center" style="margin-left: -10px; margin-right: 15px;" type="text" name="gallons[]" placeholder="Gallons"/>' /* Gallons */
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

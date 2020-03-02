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
  <style media="screen">

  .container-dynamic
  {
    margin-top: 10px;
    padding-top:10px;
    padding-left: 10px;
    padding-bottom: 10px;
    height: 100%;
  }

  .container-static
  {
    width: 0 auto;
  }

  .dyn-field
  {
    padding-bottom: 5px;
  }

  #inline-field
  {
    margin: 5px 5px 5px 5px;
  }

  .form-title
  {
    background-color: lightgray;
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
    margin: 0 auto;
    width: 10px;
    font-size: 12px;
  }

  table
  {
    border-collapse: collapse;
    width: 100%;
  }

  .form-custom
  {
    width: auto;
  }

  </style>

</head>

<body>
  <div class="container">
    <div class="form-title">
      <hr>
      <h6>&nbsp Mission Data</h6>
      <hr>
    </div>
   <form class="form-inline mx-auto" action="index.html" method="post">
     <div class="container-static">
       <div class="form-inline form-custom" style="float: left;">
         <select class="form-control-sm mb-2" name="tailnumber">
           <option value="" disabled selected hidden> Tail # </option>
           <option value=""><?php echo "TEST" ?></option>
           <option value=""><?php echo "TEST" ?></option>
           <option value=""><?php echo "TEST" ?></option>
         </select>
       </div>
       <div class="form-inline" style="float: left;">
         <select class="form-control-sm mb-2 text-center" name="unit">
           <option value="" disabled selected hidden>  Unit  </option>
           <option value=""><?php echo "TEST"; ?></option>
           <option value=""><?php echo "TEST" ?></option>
           <option value=""><?php echo "TEST" ?></option>
         </select>
       </div>
     <div class="form-inline" style="float: left;">
       <select class="form-control-sm mb-2" name="unitnumber">
         <option value="" disabled selected hidden>  Home Station  </option>
         <option value=""><?php echo "TEST"; ?></option>
         <option value=""><?php echo "TEST" ?></option>
         <option value=""><?php echo "TEST" ?></option>
       </select>
     </div>
   <div class="form-inline" style="float: left;">
     <select class="form-control-sm mb-2" name="unitnumber">
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
    <select class="form-control-sm mb-2" name="unitnumber">
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
  </div>
  <div class="container">
  </div>
  <div class="form-title">
   <h6>&nbsp Transaction Data</h6>
   <br>
   <table class="table-responsive mx-auto">
     <thead class="w-25">
       <tr class="w-25">
         <th class="w-25"></th>
         <th class="w-25">Jettison</th>
         <th class="w-25"></th> &nbsp
         <th class="w-25">Branch</th>
         <th class="w-25"></th> &nbsp
         <th class="w-25">Tail Number Criteria</th>
         <th class="w-25"></th> &nbsp
         <th class="w-25">Tail Number</th>
         <th class="w-25"></th> &nbsp
         <th class="w-25">Aircraft Type</th>
         <th class="w-25"></th>
         <th class="w-25">Unit</th>
         <th class="w-25"></th>
         <th class="w-25">DODAAC</th>
         <th class="w-25"></th>
         <th class="w-25">Command</th>
         <th class="w-25"></th>
         <th class="w-25">Callsign</th>
         <th class="w-25"></th>
         <th class="w-25">Pounds Delivered</th>
         <th class="w-25"></th>
         <th class="w-25">Gallons</th>
         <th class="w-25"></th>
         <th class="w-25">FMS/FRG Country</th>
       </tr>
     </thead>
     <tbody>
     </tbody>
     </table>
       <div class="container-dynamic" style="float: left;">
         <button class="add_form_field btn btn-primary"> + <span style="font-size:16px; font-weight:bold;"> </span> <!-- </button> <input type="text" name="mytext[]"> -->
       </div>
       <br>
   </div>
  </form>
</body>

</html>

<?php

  if(isset($_POST))

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
            var markup = '<div class="form-inline"><input type="checkbox" class="form-check-input" style="margin: -75px;" value="check"><input class="form-control col-sm-3" type="text" name="mytext[]"/>'
            markup += '<input class="form-control col-sm-3" type="text" name="mytext[]"/>'
            markup += '<a href="#" class="delete btn btn-danger">Delete</a></div>'
            $(wrapper).append(markup); //add input box
            /* '<div class="form-inline"><input type="checkbox" class="form-check-input" style="margin: -75px;" value="check"><input class="form-control col-sm-3" type="text" name="mytext[]"/><a href="#" class="delete btn btn-danger">Delete</a></div>' */
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

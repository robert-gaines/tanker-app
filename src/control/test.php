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
</head>

<!-- <body>
  <form method="post" action="#">
    <input class='form-control-sm text-center' type='text' onfocus="(this.type='date')" name='julian_date' value='' placeholder='Julian Date' required>
     <button type="submit" name="button">Submit</button>
  </form>
</body> -->


<form enctype="multipart/form-data" method="POST" action="">
    <label>Your Name <input type="text" name="sender_name" /> </label>
    <label>Your Email <input type="email" name="sender_email" /> </label>
    <label>Subject <input type="text" name="subject" /> </label>
    <label>Message <textarea name="message"></textarea> </label>
    <label>Attachment <input type="file" name="attachment" /></label>
    <label><input type="submit" name="button" value="Submit" /></label>
</form>


</html>

<?php

//   use PHPMailer\PHPMailer\PHPMailer;
//   use PHPMailer\PHPMailer\Exception;
//
//   require '../../PHPMailer/src/Exception.php';
//   require '../../PHPMailer/src/PHPMailer.php';
//   require '../../PHPMailer/src/SMTP.php';
//
//   $mail = new PHPMailer;
//
//   $mail->isSMTP();
//   $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                                      // Set mailer to use SMTP
//   $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
//   $mail->Port = 587;
//   $mail->SMTPAuth = true;                               // Enable SMTP authentication
//   $mail->Username = 'tode.mailer@gmail.com';                 // SMTP username
//   $mail->Password = 'YkUB7a8Tfzj9AJ4';                           // SMTP password
//   $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
//
//   $mail->From = 'tode.mailer@gmail.com';
//   $mail->FromName = 'Mailer';
//   $mail->addAddress('robert.gaines@protonmail.com', 'Joe User');     // Add a recipient
// //  $mail->addAddress('ellen@example.com');               // Name is optional
// //  $mail->addReplyTo('info@example.com', 'Information');
// //  $mail->addCC('cc@example.com');
// //  $mail->addBCC('bcc@example.com');
//
//   $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
// //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//   $mail->isHTML(true);                                  // Set email format to HTML
//   $mail->AddAttachment('DD791.pdf');
//   $mail->Subject = 'Here is the subject';
//   $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//   $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//
//   if(!$mail->send()) {
//       echo 'Message could not be sent.';
//       echo 'Mailer Error: ' . $mail->ErrorInfo;
//   } else {
//       echo 'Message has been sent';
//   }

// date_default_timezone_set("America/Los_Angeles");
// $day = date("Y-m-d");
// $time = date("h:i:sa");
// $mission_number = "AB4511";
// $fileName        = "../../export/DD791/DD791_".$mission_number."_".$day.'_'.$time.'.pdf';
// $fileName        = str_replace(':','_',$fileName);
// echo $fileName;
// $segments        = explode('/',$fileName);
// print_r($segments);
// echo $segments[count($segments)-1];

?>

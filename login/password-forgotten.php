<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

include('utility/db.php');
$error = "";
$mailSend = "";

if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
   $email = test_input($_POST["email"]);
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   $email = filter_var($email, FILTER_VALIDATE_EMAIL);
   if (!$email) {
      $error = "Indirizzo email non valido!";
   } else {
      $sel_query = "SELECT * FROM `user` WHERE email='" . $email . "'";
      $results = mysqli_query($con, $sel_query);
      $row = mysqli_num_rows($results);
      if ($row == "") {
         $error = "Nessun utente è registrato con questa email!";
      }
   }
   //if($error!=""){
   //echo $error;
   //<br /><a href='javascript:history.go(-1)'>Go Back</a>";
   //}else{
   if ($error == "") {
      $expFormat = mktime(
         date("H"),
         date("i"),
         date("s"),
         date("m"),
         date("d") + 1,
         date("Y")
      );
      $expDate = date("Y-m-d H:i:s", $expFormat);
      $key = md5($email);
      $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
      $key = $key . $addKey;
      // Insert Temp Table
      mysqli_query(
         $con,
         "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
      VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');"
      );

      $output='<p>Caro utente,</p>';
      $output.='<p>Clicca il link seguente per resettare la tua password.</p>';
      $output.='<p>-------------------------------------------------------------</p>';
      $output .= '<p><a href="http://spesaconveniente.altervista.org//reset-password_view.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">
      http://spesaconveniente.altervista.org/reset-password_view.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
      $output.='<p>-------------------------------------------------------------</p>';
      $output.='<p>Se non fosse possibile cliccare il link, copialo nella barra degli indirizzi.
      Il link non sarà più valido dopo un giorno dalla richiesta.</p>';
      $output.='<p>Se non hai richiesto la modifica della tua password, ingora questa mail. Tuttavia, ti consigliamo di modificarla per ragioni di sicurezza, nel caso che qualcuno abbia avuto accesso al tuo account.</p>';
      $output.='<p>Grazie,</p>';
      $output.='<p>Lo Staff di SpesaConveniente</p>';
      $body = $output;

      $subject = "Modifica Password - SpesaConveniente";
      $email_to = $email;
      $fromserver = "spendipocohci@gmail.com";

      $mail = new PHPMailer();
      $mail->IsSMTP();
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
      $mail->SMTPDebug = SMTP::DEBUG_OFF;

      $mail->Host = "smtp.gmail.com"; // Enter your host here
      $mail->SMTPAuth = true;
      $mail->Port = 587;
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->SMTPAuth = true;
      $mail->Username = "spendipocohci@gmail.com"; // Enter your email here
      $mail->Password = "HumanComputerInteraction"; //Enter your password here

      $mail->IsHTML(true);
      $mail->setFrom("spendipocohci@gmail.com", "SpesaConveniente");
      $mail->AddAddress($email_to);
      $mail->Subject = $subject;
      $mail->Body = $body;

      if (!$mail->Send()) {
         $error = "Erore nell'invio della mail: " . $mail->ErrorInfo;
      } else {
         $mailSend =  "Riceverai entro pochi minuti una email con le istruzioni per generare una nuova password!";
      }
   }
}

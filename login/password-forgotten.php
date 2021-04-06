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

      $output = '
      <html>
         <head>
            <title>Modifica Password - SpesaConveniente</title>
         </head>
         <body>
            <p>Caro utente,</p>
            <p>Clicca il link seguente per resettare la tua password.</p>
            <p>-------------------------------------------------------------</p>
            <p><a href="https://spesaconveniente.altervista.org//reset-password_view.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">
            https://spesaconveniente.altervista.org/reset-password_view.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>
            <p>-------------------------------------------------------------</p>
            <p>Se non fosse possibile cliccare il link, copialo nella barra degli indirizzi.
            Il link non sar&agrave; pi&uacute; valido dopo un giorno dalla richiesta.</p>
            <p>Se non hai richiesto la modifica della tua password, ignora questa mail. Tuttavia, ti consigliamo di modificarla per ragioni di sicurezza, nel caso che qualcuno abbia avuto accesso al tuo account.</p>
            <p>Grazie,</p>
            <p>Lo Staff di SpesaConveniente</p>
         </body>
      </html>
      ';
      $body = $output;

      $subject = "Modifica Password - SpesaConveniente";
      $email_to = $email;
      $fromserver = "spendipocohci@gmail.com";

      $headers[] = 'MIME-Version: 1.0';
      $headers[] = 'Content-type: text/html; charset=iso-8859-1';
      $headers[] = "To: " . $email_to;
      $headers[] = "From: SpesaConveniente <spendipocohci@gmail.com>";

      $resultmail = mail($email_to, $subject, $body, implode("\r\n", $headers));

      if ($resultmail) {
         $mailSend =  "Riceverai entro pochi minuti una email con le istruzioni per generare una nuova password!";
      }
   }
}
?>
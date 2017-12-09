<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'backend/phpMailer/src/Exception.php';
require 'backend/phpMailer/src/PHPMailer.php';
require 'backend/phpMailer/src/SMTP.php';

include('header.php');

?>

<?php

if($session->status == "logged-in") {

  $username = $session->user->getUsername();
  $password = $session->user->getPassword();
  $email = $session->user->getEmail();

  //Confirmation key
  $key = $username . $email;
  $key = md5($key);

  $mail = new PHPMailer(true);

  //Send mail using gmail
  $mail->isSMTP(); // telling the class to use SMTP
  $mail->SMTPDebug = 4;
  $mail->SMTPAuth = true; // enable SMTP authentication
  $mail->SMTPSecure = "tls"; // sets the prefix to the servier
  $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
  $mail->Port = 587; // set the SMTP port for the GMAIL server
  $mail->Username = "gowork.mailer@gmail.com"; // GMAIL username
  $mail->Password = "gowork_Inge"; // GMAIL password
  $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
  );

  //Typical mail data
  $mail->addAddress("gscaglioni@itba.edu.ar", "giulianos");
  $mail->setFrom("gowork.mailer@gmail.com", "Go Work");
  $mail->Subject = "Tienes que activar tu cuenta GoWork";
  $mail->Body = "Tu cuenta GoWork se ha creado correctamente. Clickea en el siguiente enlace para activarla: <a href=\"http://localhost/activateAccount.php?user=".$username."&hash=".$key."\">Activar</a>";
  $mail->isHTML(true);

  try{
      $mail->send();
      echo "Tu cuenta se creo correctamente.</br>Se ha enviado un link de activacion a ".$email."!";
  } catch(Exception $e){
      //Something went bad
      echo "Error al enviar el link de activación";
  }

}

?>

<?php include('footer.php'); ?>

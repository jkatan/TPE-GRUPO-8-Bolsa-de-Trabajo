<?php
  require_once(__DIR__.'/backend/utils.php');
//  require_once(__DIR__.'lib/swift_required.php');
  $result = insertPersonFromPOST($_POST);
  include("header.php");
?>
<h1>Procesando envío de información...</h1>
    <?php
      if($result) {
        $username = $POST['username'];
        $password = $POST['pass'];
        $email = $POST['email'];

        //Confirmation key
        $key = $username . $password . $email;
        $key = md5($key);

      // Creo un transport de una cuenta de hotmail
      $transport =  Swift_SmtpTransport::newInstance()
          ->setUsername('goWork@outlook.com')->setPassword('passwordDeGowork')
          ->setHost('smtp-mail.outlook.com')
          ->setPort(587)->setEncryption('tls');

        // Create the message
        $message = Swift_Message::newInstance();
        $message->setTo(array($email => $username));
        $message->setSubject("Confirmation key - GoWork");
        $message->setBody($key);
        $message->setFrom("goWork@outlook.com", "GoWork");

        // Send the email
        $mailer = Swift_Mailer::newInstance($transport);
        $mailer->send($message);*/

      } else {
        header( "refresh:3;url=errorCreandoCuenta.php" );
      }
    ?>
<?php include("footer.php"); ?>

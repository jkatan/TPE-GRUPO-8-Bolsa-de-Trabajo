<?php
  require_once(__DIR__.'/backend/db.php');
  require_once(__DIR__.'/backend/session.php');

  $session = Session::getInstance();
  if($session->status == "logged-in") {
    $msg = "<span>Usted esta loggeado con el usuario ".$session->user->getUsername()."</span>";
  } else {
    $msg = "<span style=\"color: red;\">No esta logueado!</span>";
  }
?>

<html>
  <head>
    <title>GoWork</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
  <body>
    <h1>GoWork - Login status</h1>
    <?php echo $msg; ?>
  </body>
</html>

<?php
  require_once(__DIR__.'/backend/db.php');
  require_once(__DIR__.'/backend/session.php');


  if(($user = DB::getInstance()->checkLogin($_POST['username'], $_POST['pass'])) != "fail") {
    $session = Session::getInstance();
    $session->status = "logged-in";
    $session->user = $user;
    $msg = "<span>".$session->user->getUsername()." ha iniciado sesi&oacute;n correctamente!</span>";
  } else {
    $msg = "<span style=\"color: red;\">Error al inciar sesi&oacute;n!</span>";
  }

?>
<html>
  <head>
    <title>GoWork</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
  <body>
    <h1>GoWork - Login</h1>
    <?php echo $msg; ?>
  </body>
</html>

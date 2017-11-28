<?php
  require_once(__DIR__.'/backend/db.php');
?>
<html>
  <head>
    <title>GoWork</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
  <body>
    <h1>GoWork - Login</h1>
    <?php
      if(DB::getInstance()->checkLogin($_POST['username'], $_POST['pass']) == "ok") {
        echo 'Login OK!';
      } else {
        echo 'Error al iniciar sesi&oacute;n';
      }
    ?>
  </body>
</html>

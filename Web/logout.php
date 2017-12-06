<?php
  require_once(__DIR__.'/backend/db.php');
  require_once(__DIR__.'/backend/session.php');

  Session::getInstance()->destroy();

?>
<html>
  <head>
    <title>GoWork</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
  <body>
    <h1>GoWork - Cerrar Sesi&oacute;n</h1>
    <span>Ha cerrado sesi&oacute;n correctamente</span>
  </body>
</html>

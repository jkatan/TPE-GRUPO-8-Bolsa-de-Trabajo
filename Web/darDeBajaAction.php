<?php

$dbcon = pg_connect("host=localhost port=9999 dbname=u2017b-8 user=u2017b-8 password=passwordING1") or die('connection failed');
?>

<html>
  <head>
    <title>GoWork</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
  <body>
    <h1>GoWork - Dar de Baja</h1>
    <?php
      $result = pg_query($dbcon, "select * from _user where username='".$_POST['username']."';");
      $user = pg_fetch_array($result, null, PGSQL_ASSOC);
      if($user['pass'] != md5($_POST['pass'])) {
        echo 'Error al dar de baja';
      }
      else {
        echo 'Baja OK!';
        //eliminamos el usuario de la base de datos
        $query = "delete from _user where username = '".$_POST['username']."';";
        $result = pg_query($dbcon, $query);
      }
    ?>
  </body>
</html>

<?php

$dbcon = pg_connect("host=localhost port=9999 dbname=u2017b-8 user=u2017b-8 password=passwordING1") or die('connection failed');
?>

<html>
  <head>
    <title>GoWork</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
  <body>
    <h1>GoWork - Login</h1>
    <?php
      $result = pg_query($dbcon, "select * from _user where username='".$_POST['username']."';");
      $user = pg_fetch_array($result, null, PGSQL_ASSOC);
      if($user['pass'] != md5($_POST['pass'])) {
        echo 'Error al iniciar sesi&oacute;n';
      }
      else {
        echo 'Login OK!';
      }
    ?>
  </body>
</html>

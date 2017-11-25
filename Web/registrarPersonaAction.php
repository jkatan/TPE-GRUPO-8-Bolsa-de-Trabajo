<?php

$dbcon = pg_connect("host=localhost port=9999 dbname=u2017b-8 user=u2017b-8 password=passwordING1") or die('connection failed');
?>

<html>
  <head>
    <title>GoWork</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
  <body>
    <h1>GoWork - Registrar Persona</h1>
    <?php
      if(chequearDatos()) {
        //insertamos en address la nueva direccion
        $query = "insert into address(address,city,_state,country,cp) values (
          '".$_POST['address']."', '".$_POST['city']."', '".$_POST['state']."',
          '".$_POST['country']."', '".$_POST['cp']."') RETURNING address_id;";
        $result = pg_query($dbcon, $query);
        $arr = pg_fetch_array($result, 0, PGSQL_NUM);
        $address_id = $arr[0];
        //insertamos en user, usando el address_id retornado
        $query = "insert into _user(email,username,pass,address_id) values (
          '".$_POST['email']."', '".$_POST['username']."', '".$_POST['pass']."',
          '".$address_id."') RETURNING user_id;";
        $result = pg_query($dbcon, $query);
        $arr = pg_fetch_array($result, 0, PGSQL_NUM);
        $user_id = $arr[0];
        //insertamos en person, usando el user_id retornado
        $query = "insert into person(user_id,dni,fullname,surname,birthdate,sex) values (
          '".$user_id."', '".$_POST['dni']."', '".$_POST['fullname']."',
          '".$_POST['surname']."','".$_POST['birthdate']."','".$_POST['sex']." ) RETURNING user_id;";
        $result = pg_query($dbcon, $query);
      }
      else {
        echo 'Datos inv&aacute;lidos!';
      }
      function chequearDatos() {
        if($_POST['register']!="Registrar") { echo 'error registrar'; return false; }
        if($_POST['fullname']=="") { echo 'error fullname'; return false; }
        if($_POST['surname']=="") { echo 'error surname'; return false; }
        if($_POST['dni']=="") { echo 'error dni'; return false; }
        if($_POST['address']=="") { echo 'error address'; return false; }
        if($_POST['city']=="") { echo 'error city'; return false; }
        if($_POST['state']=="") { echo 'error state'; return false; }
        if($_POST['country']=="") { echo 'error country'; return false; }
        if($_POST['cp']=="") { echo 'error cp'; return false; }
        if($_POST['username']=="") { echo 'error username'; return false; }
        if($_POST['pass']=="") { echo 'error pass'; return false; }
        if($_POST['pass']!=$_POST['pass2']) { echo 'error pass2'; return false; }
        if($_POST['email']=="") { echo 'error email'; return false; }
        if($_POST['terms']!="accept") { echo 'error terms'; return false; }
        return true;
      }
    ?>
  </body>
</html>

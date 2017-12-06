<?php
  require_once(__DIR__.'/backend/db.php');
  require_once(__DIR__.'/backend/session.php');

  $session = Session::getInstance();
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>GoWork</title>
  </head>
  <body>
    <div class="box">
    <div class="row header">
      <a id="logolink" href="index.php"><span id="logo">GoWork</span></a>
      <?php
        if($session->status == "logged-in") {
          echo "<a class=\"link\" href=\"profile.php\">".$session->user->getUsername()."</a>";
        } else {
          echo "
          <a class=\"link\" href=\"login.php\">Login</a>
          <a class=\"link\" href=\"registrarEmpresa.php\">Registrar empresa</a>
          <a class=\"link\" href=\"registrarPersona.php\">Registrar persona</a>
          ";
        }
      ?>
    </div>
    <div class="row content">

<?php
  require_once(__DIR__.'/backend/utils.php');
  $result = insertCompanyFromPOST($_POST);
  if($result) {
    header( "refresh:3;url=index.php" );
  } else {
    header( "refresh:3;url=registrarEmpresa.php" );
  }
?>

<html>
  <head>
    <title>GoWork</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
  <body>
    <h1>GoWork - Registrar Empresa</h1>
    <?php
      if($result) {
        echo "Se cre&oacute; correctamente su cuenta Empresa!</br>";
        echo "Espere unos segundos a ser redireccionado...";
      } else {
        echo "Error al crear la cuenta!";
      }
    ?>
  </body>
</html>

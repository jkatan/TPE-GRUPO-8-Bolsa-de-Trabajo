<?php
  require_once(__DIR__.'/backend/utils.php');
  $result = insertPersonFromPOST($_POST);
  if($result) {
    header( "refresh:3;url=index.php" );
  } else {
    header( "refresh:3;url=registrarPersona.php" );
  }
  include("header.php");
?>
<h1>Registrar Persona</h1>
    <?php
      if($result) {
        echo "Se cre&oacute; correctamente su cuenta Personal!</br>";
        echo "Espere unos segundos a ser redireccionado...";
      } else {
        echo "Error al crear la cuenta!";
      }
    ?>
<?php include("footer.php"); ?>

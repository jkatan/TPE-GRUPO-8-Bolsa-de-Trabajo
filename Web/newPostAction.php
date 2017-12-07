<?php
  require_once(__DIR__.'/backend/utils.php');
  $result = insertPostFromPOST($_POST);
  if($result) {
    header( "refresh:3;url=index.php" );
  } else {
    header( "refresh:3;url=new_post.php" );
  }
  include("header.php");
?>
    <h1>Crear Post</h1>
    <?php
      if($result) {
        echo "Se cre&oacute; correctamente su Post!</br>";
        echo "Espere unos segundos a ser redireccionado...";
      } else {
        echo "Error al crear el Post!";
      }
    ?>
<?php include("footer.php"); ?>

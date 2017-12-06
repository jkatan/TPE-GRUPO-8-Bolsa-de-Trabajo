<?php
  header( "refresh:3;url=index.php" );
  include("header.php");
  $session->destroy();
?>
    <h1>Cerrar Sesi&oacute;n</h1>
    <span>Ha cerrado sesi&oacute;n correctamente.</span></br>
    <span>En segundos sera redirigido al home...</span>

<?php include("footer.php"); ?>

<?php
  include('header.php');
  $dbcon = pg_connect("host=localhost port=9999 dbname=u2017b-8 user=u2017b-8 password=passwordING1") or die('connection failed');
  header( "refresh:2;url=user_applications.php" );
?>
    <h1>Cancelar Aplicacion</h1>
    <?php
        //eliminamos el usuario de la base de datos
        $query = "DELETE FROM applicant WHERE user_id=$1 AND post_id=$2;";
        $result = pg_query_params(
          $dbcon,
          $query,
          array(
            $session->user->getID(),
            $_GET['post_id']
          )
        );
        if($result != null) {
          echo "Se cancelo correctamente la aplicaci&oacute;n!";
        } else {
          echo "Error al cancelar la aplicacion! Int&eacute;ntalo nuevamente.";
        }
    ?>
<?php include('footer.php'); ?>

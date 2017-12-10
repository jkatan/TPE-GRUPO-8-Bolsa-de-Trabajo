<?php
  include('header.php');
  $dbcon = pg_connect("host=localhost port=9999 dbname=u2017b-8 user=u2017b-8 password=passwordING1") or die('connection failed');
  header( "refresh:3;url=my_posts.php" );
?>
    <h1>Eliminar Publicaci&oacute;n</h1>
    <?php
        //eliminamos el usuario de la base de datos
        $query = "DELETE FROM post WHERE company_id=$1 AND post_id=$2;";
        $result = pg_query_params(
          $dbcon,
          $query,
          array(
            $session->user->getCUIT(),
            $_GET['post_id']
          )
        );
        if($result != null) {
          echo "Se elimin&oacute; correctamente la publicaci&oacute;n!";
        } else {
          echo "Error al eliminar la publicaci&oacute;n! Int&eacute;ntalo nuevamente.";
        }
    ?>
<?php include('footer.php'); ?>

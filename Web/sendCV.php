<?php
  require_once(__DIR__.'/backend/utils.php');
  require_once(__DIR__.'/backend/session.php');
  require_once(__DIR__.'/backend/db.php');
  $session = Session::getInstance();

  $result = DB::getInstance()->addApplicant(new Applicant ($_POST['url'], $_POST['post_id'], $session->user->getID()));
  include("header.php");
  if($result) {
    header( "refresh:3;url=user_applications.php" );
  } else {
    header( "refresh:3;url=posts.php" );
  }
?>

<h1>Aplicar a un trabajo</h1>
<?php if($result) { ?>
  Ha aplicado correctamente al trabajo!
<?php } else { ?>
  Error al aplicar al trabajo. Int&eacute;ntalo nuevamente.
<?php } ?>

<?php include("footer.php"); ?>

<?php
  require_once(__DIR__.'/backend/utils.php');
  require_once(__DIR__.'/backend/session.php');
  require_once(__DIR__.'/db.php');
  $session = Session::getInstance();

  DB::getInstance()->addApplicant(new Applicant ($_POST['url'], $_POST['post_id'], $session->user->getID()));
  include("header.php");
  echo "<h1>¡Ha aplicado a un trabajo exitosamente!</h1>";

?>

<?php include("footer.php"); ?>

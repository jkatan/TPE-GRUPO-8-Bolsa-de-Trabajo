<?php
  require_once(__DIR__.'/backend/db.php');
  require_once(__DIR__.'/backend/session.php');
  if(($user = DB::getInstance()->checkLogin($_POST['username'], $_POST['pass'])) != "fail") {
    if(!$user->isActivated()) {
      header( "refresh:3;url=login.php" );
      $msg = "<span class=\".box-msg error\">Su cuenta no esta activada, chequee su email!</span>";
    } else {
      header( "refresh:3;url=profile.php" );
      $session = Session::getInstance();
      $session->status = "logged-in";
      $session->user = $user;
      $msg = "<span class=\".box-msg\">".$session->user->getUsername()." ha iniciado sesi&oacute;n correctamente!</span>";
    }
  } else {
    header( "refresh:3;url=login.php" );
    $msg = "<span class=\".box-msg error\">Error al inciar sesi&oacute;n!</span>";
  }

  include('header.php');
?>
    <h1>Login</h1>
    <?php echo $msg; ?>
<?php include('footer.php'); ?>

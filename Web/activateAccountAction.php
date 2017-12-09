<?php
  require_once(__DIR__.'/backend/db.php');
  require_once(__DIR__.'/backend/session.php');
  if(($user = DB::getInstance()->checkLogin($_POST['username'], $_POST['pass'])) != "fail") {
    $session = Session::getInstance();
    $session->status = "logged-in";
    $session->user = $user;
    $key = $user->getUsername() . $user->getEmail();
    $key = md5($key);
    if($key == $_POST['hash']) {
      if( DB::getInstance()->activateUser($user) ){
        $msg = "<span class=\".box-msg\">Tu cuenta ha sido activada correctamente!</span>";
        header( "refresh:3;url=profile.php" );
      } else {
        $msg = "<span class=\".box-msg\">Tu cuenta no se pudo activar!</span>";
        $session->destroy();
      }
    } else {
      $msg = "<span class=\".box-msg\">Codigo de activacion incorrecto! key=".$key." , hash=".$_POST['hash']."</span>";
      $session->destroy();
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

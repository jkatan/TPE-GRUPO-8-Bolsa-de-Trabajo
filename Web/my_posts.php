<?php include('header.php'); ?>

<h1>Trabajos publicados</h1>

<?php if($session->status == "logged-in") { ?>
  <?php
      $posts = DB::getInstance()->getPosts(array("company"=>$session->user->getCUIT()));
      if(count($posts)>0) {
        ?>
        <div class="post-list">
        <?php
      }  else {
        echo "Todav&iacute;a no tienes publicaciones.";
      }
      foreach ($posts as $post) {
  ?>
    <div class="post">
      <span class="title"><?php echo $post->getTitle(); ?></span>
      <a style="float:right;" href="eliminarPost.php?post_id=<?php echo $post->getID(); ?>"><img width="20" src="img/delete-icon.png" /></a>
      <div class="divider"></div>
      <div class="description"><?php echo $post->getDescription(); ?></div>
    </div>
<?php } ?>
</div>
<?php } else { ?>
  <span class="box-msg error-msg">Error: Debes estar logueado!</span>
<?php } ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="scripts.js"></script>

<?php include('footer.php'); ?>

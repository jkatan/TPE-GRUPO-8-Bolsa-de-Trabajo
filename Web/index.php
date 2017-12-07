<?php include('header.php'); ?>
<h1>Ultimos trabajos publicados...</h1>
<span>Puedes ver estos y mas trabajos desde la seccion Buscar Trabajo de tu perfil.</span>
<?php
  //Obtenemos los ultimos 5 trabajos publicados
  $posts = DB::getInstance()->getPosts(array("latest" => 5));
  foreach ($posts as $post) {
?>
<div class="post-list">
  <div class="post">
    <span class="title"><?php echo $post->getTitle(); ?></span>
    <div class="divider"></div>
    <div class="description"><?php echo $post->getDescription(); ?></div>
  </div>
</div>
<?php } ?>

<?php include('footer.php'); ?>

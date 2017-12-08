<?php include('header.php'); ?>

<h1>Buscar trabajo...</h1>

<?php if($session->status == "logged-in") { ?>
  <form method="GET">
    <input class="text-input search" <?php if(isset($_GET['search-keywords'])) { echo 'value="'.$_GET['search-keywords'].'"'; }?> type="text" placeholder="Ej: Programador" name="search-keywords" />
    <input class="button-input" type="submit" value="Buscar" />
  </form>
  <?php
    if(isset($_GET['search-keywords'])) {
      $posts = DB::getInstance()->getPosts(array("keywords" => $_GET['search-keywords']));
      foreach ($posts as $post) {
  ?>
  <div class="post-list">
    <div class="post">
      <span class="title"><?php echo $post->getTitle(); ?></span>
      <div class="divider"></div>
      <div class="description"><?php echo $post->getDescription(); ?></div>
      <div><button type="button" id="apply-button">Aplicar!</button></div>
    </div>
  </div>
<?php } } ?>
<?php } else { ?>
  <span class="box-msg error-msg">Error: Debes estar logueado para buscar trabajo!</span>
<?php } ?>

<?php include('footer.php'); ?>

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
      if(count($posts)>0) {
        ?>
        <div class="post-list">
        <?php
      }  else {
        echo "No se encontraron resultados que coincidan con la b&uacute;squeda.";
      }
      foreach ($posts as $post) {
  ?>
    <div class="post special-post">
      <span class="title"><?php echo $post->getTitle(); ?></span>
      <div class="divider"></div>
      <div class="description"><?php echo $post->getDescription(); ?></div>
      <div class="extra-info" style="display:none;">
        <form class="styled-form" method="POST" action="sendCV.php">
          <table>
            <td><label style="color:black;">URL de tu CV</label ></td><td><input type="text" name="url" placeholder="Ej.: URL de tu Linkedin"/></td><br>
            <input style="display:none;" type="text" name="post_id" value="<?php echo $post->getID() ?>"/>
          </table>
          <input type="submit" value="Enviar" name="createapplicant" />
        </form>
      </div>
    </div>
<?php } ?>
  </div>
<?php } } else { ?>
  <span class="box-msg error-msg">Error: Debes estar logueado para buscar trabajo!</span>
<?php } ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="scripts.js"></script>

<?php include('footer.php'); ?>

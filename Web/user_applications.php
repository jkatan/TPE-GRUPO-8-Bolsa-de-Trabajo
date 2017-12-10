<?php include('header.php'); ?>

<h1>Aplicaciones hechas</h1>

<?php if($session->status == "logged-in") { ?>
  <?php
      $posts = DB::getInstance()->getUserApplications($session->user->getID());
      if(count($posts)>0) {
        ?>
        <table class="applicants-table">
        <th>Titulo</th><th>CV</th><th></th></tr>
        <?php
      }  else {
        echo "Todav&iacute;a no aplicaste a ning&uacute;n trabajo.";
      }
      foreach ($posts as $post) {
  ?>
  <td class="applicants-cell"><?php echo $post->getTitle(); ?></td>
  <td class="applicants-cell"><a href="<?php echo $post->getCV(); ?>">Link</a></td>
  <td class="applicants-cell"><a style="float:right;" href="eliminarApplication.php?post_id=<?php echo $post->getID(); ?>"><img width="20" src="img/delete-icon.png" /></a></td></tr>
<?php } ?>
</table>
<?php } else { ?>
  <span class="box-msg error-msg">Error: Debes estar logueado!</span>
<?php } ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="scripts.js"></script>

<?php include('footer.php'); ?>

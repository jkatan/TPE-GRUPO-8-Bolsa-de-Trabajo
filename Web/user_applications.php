<?php include('header.php'); ?>

<h1>Aplicaciones hechas</h1>

<?php if($session->status == "logged-in") { ?>
  <table class="applicants-table">
  <th>Titulo</th><th>CV</th></tr>
  <?php
      $posts = DB::getInstance()->getUserApplications($session->user->getID());
      foreach ($posts as $post) {
  ?>
  <td class="applicants-cell"><?php echo $post->getTitle(); ?></td>
  <td class="applicants-cell"><a href="<?php echo $post->getCV(); ?>">Link</a></td></tr>
<?php } ?>
</table>
<?php } else { ?>
  <span class="box-msg error-msg">Error: Debes estar logueado!</span>
<?php } ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="scripts.js"></script>

<?php include('footer.php'); ?>

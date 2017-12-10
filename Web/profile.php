<?php include('header.php'); ?>

<h1>Perfil - <?php
  if($session->user->userType() == "company") {
    echo "Empresa";
  } else {
    echo "Personal";
  }
 ?></h1>
<h2>Acciones</h2>
<ul class="profile-actions">
  <?php if($session->user->userType() == "company") { ?>
    <li><a href="new_post.php">Publicar trabajo</a></li>
    <li><a href="my_posts.php">Ver trabajos publicados</a></li>
    <li><a href="list_applications.php">Ver aplicaciones</a></li>
  <?php } else { ?>
    <li><a href="posts.php">Buscar trabajo</a></li>
    <li><a href="user_applications.php">Ver aplicaciones</a></li>
  <?php } ?>
  <li><a href="darDeBaja.php">Dar de baja la cuenta</a></li>
</ul>


<?php include('footer.php') ?>

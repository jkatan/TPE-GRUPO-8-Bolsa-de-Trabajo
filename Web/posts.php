<?php include('header.php'); ?>

<h1>Buscar trabajo...</h1>

<?php if($session->status == "logged-in") { ?>
  <form method="GET">
    <p>Filtros</p>
    <span> Sector </span>
    <span>
      <select name='sector'>
         <option disabled selected value> </option>
        <?php
        $sectors = DB::getInstance()->getSectors();
        foreach ($sectors as $sector) {
          echo '<option value="'.$sector->getID().'">'.$sector->getName().'</option>';
        }
        ?>
      </select>
    </span>
    <p></p>
    <label>Carga horaria</label>
    <input type="text" name="timeload_tags" />
    <p></p>
    <label>Años de experiencia</label>
    <input type="text" name="xp_tags" />
    <p></p>
    <label>Rol</label>
    <input type="text" name="rol_tags" />
    <p></p>
    <label>Ubicaci&oacute;n</label>
    <input type="text" name="location_tags" />
    </br>
    <input class="button-input" type="submit" value="Buscar" />
  </form>

  <?php
      $query = 'SELECT * FROM post';
      $flag = False;
      if(isset($_GET['sector'])){
        $flag = True;
        $query.= ' WHERE sector_id = '. $_GET['sector'];
      }
      if(isset($_GET['timeload_tags']) && $_GET['timeload_tags'] != ""){
        if($flag == True){
          $query .= ' and timeload =' . $_GET['timeload_tags'];
        }
        else{
          $query .= ' WHERE timeload =' . $_GET['timeload_tags'];
          $flag = True;
        }
      }
      if(isset($_GET['xp_tags']) && $_GET['xp_tags'] != ""){
        if($flag == True){
          $query .= ' and xp_years =' . $_GET['xp_tags'];
        }
        else{
          $query .= ' WHERE xp_years =' . $_GET['xp_years'];
          $flag = True;
        }
      }
      if(isset($_GET['rol_tags']) && $_GET['rol_tags'] != ""){
        if($flag == True){
          $query .= ' and rol_tags = '. $_GET['rol_tags'];
        }
        else{
          $query .= ' WHERE rol_tags = '.$_GET['rol_tags'];
          $query = True;
        }
      }
      if(isset($_GET['location_tags']) && $_GET['location_tags'] != ""){
        if($flag == True){
          $query .= ' and location_tags = '.$_GET['location_tags'];
        }
        else{
          $query .= ' WHERE location_tags =' . $_GET['location_tags'];
          $flag = True;
        }
      }
      $posts = array();
      $posts = DB::getInstance()->getPostByFilters($query);
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
<?php  } else { ?>
  <span class="box-msg error-msg">Error: Debes estar logueado para buscar trabajo!</span>
<?php } ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="scripts.js"></script>

<?php include('footer.php'); ?>

<?php include("header.php") ?>

<h1>Crear Post</h1>

<form class="styled-form" method="POST" action="newPostAction.php">
  <table>
    <td><label>T&iacute;tulo</label></td><td><input type="text" name="title" /></td></tr>
    <td><label>Ubicaci&oacute;n</label></td><td><input type="text" name="location_tags" /></td></tr>
    <td><label>Rol</label></td><td><input type="text" name="rol_tags" /></td></tr>
    <td><label>Años de experiencia requeridos</label></td><td><input type="text" name="xp_years" /></td></tr>
    <td><label>Sector</label></td>
    <td>
      <select name='sector'>
        <?php
        $sectors = DB::getInstance()->getSectors();
        foreach ($sectors as $sector) {
          echo '<option value="'.$sector->getID().'">'.$sector->getName().'</option>';
        }
        ?>
      </select>
    </td></tr>
    <td><label>Horas por d&iacute;a</label></td><td><input type="text" name="timeload" /></td></tr>
    <td><label>M&aacute;ximo sueldo posible</label></td><td><input type="text" name="salary_high" /></td></tr>
    <td><label>M&iacute;nimo sueldo posible</label></td><td><input type="text" name="salary_low" /></td></tr>
    <td><label>Descripci&oacute;n</label></td><td><input type="text" name="short_desc" /></td></tr>
  </table>
  <input type="submit" value="Crear Post" name="createPost" />
</form>

<?php include("footer.php") ?>

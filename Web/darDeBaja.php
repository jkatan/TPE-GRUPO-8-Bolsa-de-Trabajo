<?php include('header.php') ?>
    <h1>Dar de Baja</h1>
      <form class="styled-form" method="POST" action="darDeBajaAction.php">
      <table>
        <td><label>Nombre de usuario</label></td><td><input type="text" name="username" /></td></tr>
        <td><label>Contraseña</label></td><td><input type="password" name="pass" /></td></tr>
      </table>
      <input type="submit" value="Confirmar Baja" name="baja" />
    </form>
<?php include('footer.php') ?>

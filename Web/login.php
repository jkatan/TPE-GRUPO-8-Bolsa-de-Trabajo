<?php include('header.php'); ?>
    <form class="styled-form" method="POST" action="loginAction.php">
      <h1>Iniciar sesi&oacute;n</h1>
      <table>
        <td><label>Nombre de usuario</label></td><td><input type="text" name="username" /></td></tr>
        <td><label>Contraseña</label></td><td><input type="password" name="pass" /></td></tr>
        <td></td><td>
          <input type="submit" value="Iniciar Sesi&oacute;n" name="login" />
        </td>
      </table>
    </form>
<?php include('footer.php'); ?>

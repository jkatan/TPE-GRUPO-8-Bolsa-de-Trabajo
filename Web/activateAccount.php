<?php include('header.php'); ?>
    <form class="styled-form" method="POST" action="activateAccountAction.php">
      <h1>Activar cuenta</h1>
      <table>
        <td><label>Nombre de usuario</label></td><td><input type="text" name="username" value="<?php echo $_GET['user']; ?>" /></td></tr>
        <td><label>Codigo de activación</label></td><td><input type="text" name="hash" value="<?php echo $_GET['hash']; ?>" /></td></tr>
        <td><label>Contraseña</label></td><td><input type="password" name="pass" /></td></tr>
        <td></td><td>
          <input type="submit" value="Activar" name="login" />
        </td>
      </table>
    </form>
<?php include('footer.php'); ?>

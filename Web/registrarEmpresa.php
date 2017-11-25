<?php

$dbcon = pg_connect("host=localhost port=9999 dbname=u2017b-8 user=u2017b-8 password=passwordING1") or die('connection failed');

?>

<html>
  <head>
    <title>GoWork</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
  <body>
    <h1>GoWork - Registrar Empresa</h1>
    <form>
      <h2>Informaci&oacute;n de la empresa</h2>
      <label>Nombre de la empresa</label><input type="text" /></br>
      <label>Sector</label>
      <select>
        <?php
          $result = pg_query($dbcon, "select * from sector order by name;");
          while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
              echo '<option value="'.$row['id'].'"> '.$row['name'].' </option>';
          }
        ?>
      </select></br>
      <label>Ubicaci&oacute;n</label></br>
      <input placeholder="Direcci&oacute;n" /></br>
      <input placeholder="Localidad" /></br>
      <input placeholder="Provincia" /></br>
      <input placeholder="Pa&iacute;s" /></br>
      <input placeholder="CP" /></br>
      <label>Tel&eacute;fono</label>
      <input placeholder="+54 11 5123 456" /></br>
      <h2>Informaci&oacute;n de la cuenta</h2>
      <table>
        <td><label>Nombre de usuario</label></td><td><input type="text" name="username" /></td></tr>
        <td><label>Contraseña</label></td><td><input type="password" name="pass" /></td></tr>
        <td><label>Repita contraseña</label></td><td><input type="password" name="pass2" /></td></tr>
        <td><label>E-mail</label></td><td><input type="text" name="email" /></td>
      </table>
      <div class="acepto-terminos">
        <input type="checkbox"/><label>Acepto <a href="">T&eacute;rminos y condiciones</a></label>
      </div>
      <input type="submit" value="Registrar" />
    </form>
  </body>
</html>

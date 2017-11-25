<?php

$dbcon = pg_connect("host=localhost port=9999 dbname=u2017b-8 user=u2017b-8 password=passwordING1") or die('connection failed');
?>
<html>
  <head>
    <title>GoWork</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
  <body>
    <h1>GoWork - Registrar Persona</h1>
    <form method="POST" action="registrarPersonaAction.php">
      <h2>Informaci&oacute;n Personal</h2>
      <table>
        <td><label>Nombre Completo</label></td><td><input type="text" name="fullname" /></td></tr>
        <td><label>Apellido</label></td><td><input type="text" name="surname" /></td></tr>
        <td><label>DNI</label></td><td><input type="text" name="dni"/></td></tr>
        <td><label>Fecha de nacimiento</label></td><td><input type="date" name="birthdate"/></td></tr>
        <td><label>Sexo</label></td><td><input type="radio" name="gender" value="male"/>Masculino
          <input type="radio" name="gender" value="female"/>Femenino
          <input type="radio" name="gender" value="other"/>Otro
        </td></tr>
        <td><label>Ubicaci&oacute;n</label></td>
        <td><input placeholder="Direcci&oacute;n" name="address" /></td></tr>
        <td></td><td><input placeholder="Localidad" name="city" /></td></tr>
        <td></td><td><input placeholder="Provincia" name="state" /></td></tr>
        <td></td><td><input placeholder="Pa&iacute;s" name="country" /></td></tr>
        <td></td><td><input placeholder="CP" name="cp" /></td></tr>
      </table>
      <h2>Informaci&oacute;n de la cuenta</h2>
      <table>
        <td><label>Nombre de usuario</label></td><td><input type="text" name="username" /></td></tr>
        <td><label>Contraseña</label></td><td><input type="password" name="pass" /></td></tr>
        <td><label>Repita contraseña</label></td><td><input type="password" name="pass2" /></td></tr>
        <td><label>E-mail</label></td><td><input type="text" name="email" /></td>
      </table>
      <div class="acepto-terminos">
        <input type="checkbox" name="terms" value="accept" /><label>Acepto <a href="">T&eacute;rminos y condiciones</a></label>
      </div>
      <input type="submit" value="Registrar" name="register" />
    </form>
  </body>
</html>

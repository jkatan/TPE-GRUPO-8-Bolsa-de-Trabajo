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
        <td><label>Fecha de nacimiento</label></td><td>
        <input style="width: 3em;" type="text" placeholder="Dia" name="birthdate_day" />
        <select name="birthdate_month">
          <option value="01">Enero</option>
          <option value="02">Febrero</option>
          <option value="03">Marzo</option>
          <option value="04">Abril</option>
          <option value="05">Mayo</option>
          <option value="06">Junio</option>
          <option value="07">Julio</option>
          <option value="08">Agosto</option>
          <option value="09">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option>
        </select>
        <input style="width: 5em;" type="text" placeholder="Año" name="birthdate_year" />
        </td></tr>
        <td><label>Sexo</label></td><td><input type="radio" name="gender" value="m"/>Masculino
          <input type="radio" name="gender" value="f"/>Femenino
          <input type="radio" name="gender" value="o"/>Otro
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

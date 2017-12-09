<?php include('header.php'); ?>
    <h1>Registrar Persona</h1>
    <form class="styled-form" method="POST" action="registrarPersonaAction.php">
      <h2>Informaci&oacute;n Personal</h2>
      <table>
        <td><label>Nombre Completo</label></td><td><input type="text" name="fullname" pattern="[a-zA-Z\s]+" title="Solo letras" required/></td></tr>
        <td><label>Apellido</label></td><td><input type="text" name="surname" pattern="[A-Za-z\s]+" title="Solo letras" required/></td></tr>
        <td><label>DNI</label></td><td><input type="text" name="dni" pattern="[0-9]+" title="Solo numeros" required/></td></tr>
        <td><label>Fecha de nacimiento</label></td><td>
        <input style="width: 3em;" type="text" placeholder="Dia" name="birthdate_day" pattern="[0-9]+" title="Solo numeros" required/>
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
        <input style="width: 5em;" type="text" placeholder="Año" name="birthdate_year" pattern="[0-9]+" title="Solo numeros" required/>
        </td></tr>
        <td><label>Sexo</label></td><td><input type="radio" name="gender" value="m" required/><label>Masculino</label>
          <input type="radio" name="gender" value="f" required/><label>Femenino</label>
          <input type="radio" name="gender" value="o" required/><label>Otro</label>
        </td></tr>
        <td><label>Ubicaci&oacute;n</label></td>
        <td><input type="text" placeholder="Direcci&oacute;n" name="address" pattern="[A-Za-z0-9\s]+" title="Solo letras o numeros" required/></td></tr>
        <td></td><td><input type="text" placeholder="Localidad" name="city" pattern="[A-Za-z\s]+" title="Solo letras" required/></td></tr>
        <td></td><td><input type="text" placeholder="Provincia" name="state" pattern="[A-Za-z\s]+" title="Solo letras" required/></td></tr>
        <td></td><td><input type="text" placeholder="Pa&iacute;s" name="country" pattern="[A-Za-z\s]+" title="Solo letras" required/></td></tr>
        <td></td><td><input type="text" placeholder="CP" name="cp" pattern="[0-9]+" title="Solo numeros" required/></td></tr>
      </table>
      <br/>
      <h2>Informaci&oacute;n de la cuenta</h2>
      <table>
        <td><label>Nombre de usuario</label></td><td><input type="text" name="username" pattern="[A-Za-z\s]+" title="Solo letras" required/></td></tr>
        <td><label>Contraseña</label></td><td><input id="pass" class="password" type="password" name="pass" pattern="[0-9]{4,8}" title="Solo numeros, entre 4 y 8 digitos" required/></td></tr>
        <td><label>Repita contraseña</label></td><td><input id="confirmPass" class="password" type="password" name="pass2" pattern="[0-9]{4,8}" title="Solo numeros, entre 4 y 8 digitos" required/></td></tr>
        <td><label>E-mail</label></td><td><input type="email" name="email" required/></td>
      </table>
      <div class="acepto-terminos">
        <input type="checkbox" name="terms" value="accept" required/><label>Acepto <a href="">T&eacute;rminos y condiciones</a></label>
      </div>
      <input class="registrarse" type="submit" value="Registrar" name="register"/>
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
<?php include('footer.php'); ?>

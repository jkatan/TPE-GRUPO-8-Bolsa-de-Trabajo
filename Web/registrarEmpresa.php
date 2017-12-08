<?php include('header.php'); ?>
    <h1>Registrar Empresa</h1>
    <form class="styled-form" method="POST" action="registrarEmpresaAction.php">
      <h2>Informaci&oacute;n de la empresa</h2>
      <table>
        <td><label>Nombre de la Empresa</label></td><td><input type="text" name="companyname" pattern="[A-Za-z\s]+" title="Solo letras" required/></td></tr>
        <td><label>CUIT</label></td><td><input type="text" name="cuit" pattern="[0-9]+" title="Solo numeros" required/></td></tr>
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
        <td><label>Ubicaci&oacute;n</label></td>
        <td><input type="text" placeholder="Direcci&oacute;n" name="address" pattern="[A-Za-z\s]+" title="Solo letras" required/></td></tr>
        <td></td><td><input type="text" placeholder="Localidad" name="city" pattern="[A-Za-z\s]+" title="Solo letras" required/></td></tr>
        <td></td><td><input type="text" placeholder="Provincia" name="state" pattern="[A-Za-z\s]+" title="Solo letras" required/></td></tr>
        <td></td><td><input type="text" placeholder="Pa&iacute;s" name="country" pattern="[A-Za-z\s]+" title="Solo letras" required/></td></tr>
        <td></td><td><input type="text" placeholder="CP" name="cp" pattern="[0-9]+" title="Solo numeros" required/></td></tr>
        <td><label>Tel&eacute;fono</label></td>
        <td><input type="text" placeholder="+54 11 5123 456" name="phone" pattern="[0-9]+" title="Solo numeros" required/></td>
      </table>
      <h2>Informaci&oacute;n de la cuenta</h2>
      <table>
        <td><label>Nombre de usuario</label></td><td><input type="text" name="username" pattern="[A-Za-z\s]+" title="Solo letras" required/></td></tr>
        <td><label>Contraseña</label></td><td><input id="passEmpresa" class="passEnterprise" type="password" name="pass" pattern="[0-9]+" title="Solo numeros" required/></td></tr>
        <td><label>Repita contraseña</label></td><td><input id="passConfirmedEmpresa" class="passEnterprise" type="password" name="pass2" pattern="[0-9]+" title="Solo numeros" required/></td></tr>
        <td><label>E-mail</label></td><td><input type="email" name="email" /></td>
      </table>
      <div class="acepto-terminos">
        <input type="checkbox" name="terms" value="accept" /><label>Acepto <a href="">T&eacute;rminos y condiciones</a></label>
      </div>
      <input class="registrarse" type="submit" value="Registrar" name="register" />
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
<?php include('footer.php'); ?>

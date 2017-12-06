<?php include('header.php'); ?>
    <h1>Registrar Empresa</h1>
    <form class="styled-form" method="POST" action="registrarEmpresaAction.php">
      <h2>Informaci&oacute;n de la empresa</h2>
      <table>
        <td><label>Nombre de la Empresa</label></td><td><input type="text" name="companyname" /></td></tr>
        <td><label>CUIT</label></td><td><input type="text" name="cuit" /></td></tr>
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
        <td><input type="text" placeholder="Direcci&oacute;n" name="address" /></td></tr>
        <td></td><td><input type="text" placeholder="Localidad" name="city" /></td></tr>
        <td></td><td><input type="text" placeholder="Provincia" name="state"/></td></tr>
        <td></td><td><input type="text" placeholder="Pa&iacute;s" name="country" /></td></tr>
        <td></td><td><input type="text" placeholder="CP" name="cp" /></td></tr>
        <td><label>Tel&eacute;fono</label></td>
        <td><input type="text" placeholder="+54 11 5123 456" name="phone" /></td>
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
<?php include('footer.php'); ?>

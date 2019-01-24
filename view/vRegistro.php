<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div>
        <table class="tabla01">
            <caption>REGISTRO</caption>
            <tr>
                <td>Nombre de usuario</td>
                <td><input type="text" size="15" name="CodUsuario" value="<?php echo $_REQUEST['CodUsuario']; ?>" placeholder="15 caracteres max.">
                    <font class="error"><?php echo $aErrores[CodUsuario]; ?></font>
                </td>
            </tr>
            <tr>
                <td>Descripción del usuario</td>
                <td>
                    <textarea type="textarea"name="DescUsuario" rows="5" cols="30"><?php echo $_REQUEST['DescUsuario']; ?></textarea>
                    <font class="error"><?php echo $aErrores[DescUsuario]; ?></font>
                </td>
            </tr>
            <tr>
                <td>Contraseña</td>
                <td><input type="password" size="50" name="Password" value="<?php echo $_REQUEST['Password']; ?>" placeholder="Mínimo 3 caracteres">
                    <font class="error"><?php echo $aErrores[Password]; ?></font>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input class='btn' type="submit" name="Aceptar" value="Aceptar">
                    <input class='btn' type="submit" name="Cancelar" value="Cancelar" onclick="location = '../login.php'">
                </td>
            </tr>
        </table>
    </div>
</form>
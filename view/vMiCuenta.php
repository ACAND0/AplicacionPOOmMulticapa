<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table class="tabla01">
            <caption>EDITAR PERFIL</caption>
            <tr>
                <td>Nombre de usuario</td>
                <td><input disabled  type="text" size="15" name="CodUsuario" value="<?php echo $_SESSION['usuario']->getCodUsuario(); ?>" >
                </td>
            </tr>
            <tr>
                <td>Tipo de perfil</td>
                <td>
                    <input disabled type="text"name="Perfil" value="<?php echo $_SESSION['usuario']->getPerfil(); ?>" >
                </td>
            </tr>
            <tr>
                <td>Descripción del usuario</td>
                <td>
                    <textarea type="textarea" name="DescUsuario" rows="5" cols="30"><?php echo $_SESSION['usuario']->getDescUsuario(); ?></textarea>
                    <font class="error"><?php echo $aErrores[DescUsuario]; ?></font>
                </td>
            </tr>
            <tr>
                <td>                                    
                </td>
                <td>
                    <input class = 'btn' type = "submit" name = "CambiarPassword" value = "Cambiar Contraseña">
                </td>
            </tr>
            <tr>
                <td>                                    

                </td>
                <td>
                    <input class = 'btn' type = "submit" name = "BorrarCuenta" value = "Borrar Cuenta">
                </td>
            </tr>
            <tr>
                <td>                                    

                </td>
                <td>
                    <input class = 'btn' type = "submit" name = "Aceptar" value = "Aceptar">
                    <input class = 'btn' type = "submit" name = "Cancelar" value = "Cancelar"><br>
                </td>
            </tr>
        </table>
</form>

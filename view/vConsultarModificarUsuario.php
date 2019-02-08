<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <div>
        <table class="tabla01">
            <caption>EDITAR USUARIO</caption>
            <tr>
                <td>Código</td>
                <td>
                    <input disabled name="Codigo" disabled type="text" size="15" value="<?php echo $codigo; ?>" >
                </td>
            </tr>
            <tr>
                <td>Tipo de perfil</td>
                <td><select name="Perfil" >
                        <option value="usuario" <?php
                        if ($perfil == 'usuario') {
                            echo "selected";
                        }
                        ?>>Usuario</option>
                        <option value="administrador" <?php
                        if ($perfil == 'administrador') {
                            echo "selected";
                        }
                        ?>>Administrador</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Descripción</td>
                <td>
                    <textarea name="DescUsuario" rows="5" cols="30"><?php echo $descripcion; ?></textarea>
                    <font class="error"><?php echo $aErrores[DescUsuario] ?></font>  <!--Es el único impot que el usuario puede editar, por lo cual es el único que tiene validación y errores -->                              
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input name="Password" type="text" size="15" placeholder="opcional">
                    <font class="error"><?php echo $aErrores[Password] ?></font>  <!--Es el único impot que el usuario puede editar, por lo cual es el único que tiene validación y errores -->                                                  
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
    </div>
</form>
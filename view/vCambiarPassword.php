                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div>
                        <table class="tabla01">
                            <caption>CAMBIAR<br> CONTRASEÑA</caption>
                            <tr>
                                <td>Contraseña actual</td>
                                <td><input type="password" size="15" name="PasswordActual" value="<?php echo $aRespuestas[PasswordActual]; ?>">
                                    <font class="error"><?php echo $aErrores[PasswordActual]; ?></font>                                
                                </td>
                            </tr>
                            <tr>
                                <td>Nueva contraseña</td>
                                <td><input   type="password" size="15" name="PasswordNueva">
                                    <font class="error"><?php echo $aErrores[PasswordNueva]; ?></font>                                
                                </td>
                            </tr>
                            <tr>
                                <td>Confirmar contraseña</td>
                                <td><input   type="password" size="15" name="ConfirmarPasswordNueva">
                                    <font class="error"><?php echo $aErrores[ConfirmarPasswordNueva]; ?></font>                                
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
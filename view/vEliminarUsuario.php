                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div>
                        <table class="tabla01">
                            <caption>ELIMINAR<br>USUARIO</caption>
                            <tr>
                                <td>¿Está seguro de que desea eliminar este usuario <b><?php echo $_SESSION['CodigoUsuario']; ?></b>? No habrá vuelta atrás</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 38%;">
                                    <input class = 'btn' type = "submit" name = "Aceptar" value = "Aceptar">
                                    <input class = 'btn' type = "submit" name = "Cancelar" value = "Cancelar"><br>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
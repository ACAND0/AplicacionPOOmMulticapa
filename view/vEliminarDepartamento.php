                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div>
                        <table class="tabla01">
                            <caption>ELIMINAR<br>DEPARTAMENTO</caption>
                            <tr>
                                <td>¿Está seguro de que desea eliminar este departamento <b><?php echo $_SESSION['CodigoDepartamento']; ?></b>? No habrá vuelta atrás</td>
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
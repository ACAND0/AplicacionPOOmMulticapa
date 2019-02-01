                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<!--                    <div>
                        <table class="tabla01">
                            <caption>Datos de un municipio</caption>
                            <tr>
                                <td>Introduzca el nombre del municipio de España</td>
                            </tr>
                            <tr>
                                <td >
                                    <input type="text" name="nombreMunicipio" placeholder="Ej: Benavente">
                                    <input class="btn" type="submit" name="Aceptar" value="Aceptar">
                                    <input class="btn" type="submit" name="Atras" value="Atras"><br>
                                    <font class="error"><?php // echo $error ?></font>
                                </td>                                
                            </tr>
                        </table>
                    </div>-->
                    
                    
                    <div>
                        <table class="tabla01">
                            <caption>Datos de un municipio</caption>
                            <tr>
                                <td>Introduzca el nombre del municipio de España</td>
                            </tr>
                            <tr>
                                <td >
                                    <input type="number" name="CODPROV" placeholder="Ej: 49">
                                    <input class="btn" type="submit" name="Aceptar" value="Aceptar">
                                    <input class="btn" type="submit" name="Atras" value="Atras"><br>
                                    <font class="error"><?php echo $error ?></font>
                                </td>                                
                            </tr>
                        </table>
                    </div>
                </form>
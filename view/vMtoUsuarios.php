<h1 class="titulo">MANTENIMIENTO DE USUARIOS</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 

    <div class="cajabusqueda" >
        <input class="cajabuscar" type="text"  name="buscarPorDesc" placeholder="Introduzca búsqeda por descripción"
               value="<?php echo $_REQUEST['buscarPorDesc']; ?>" >

        <input class='btn' type="submit" name="Buscar" value="Buscar">
        <input class='btn' type='submit' name='limpiarBuscar' value='Limpiar Búsqueda' ><br>


    </div>

    <br><br>
    <div style="margin: 0 auto;text-align: center;">
        <input class='btn' type="submit" name="Importar" value="Importar" >
        <input class='btn' type="submit" name="Exportar" value="Exportar" >
        <input class='btn' type="submit" name="Añadir" value="Añadir" >
        <input class='btn' type="submit" name="Salir" value="Volver atrás">
    </div>


    <table class='tabla02'>
        <tr class='primerafila'>
            <td>Código</td>
            <td>Descripción</td>
            <td>Perfil</td>
            <td>Visitas</td>
            <td>Fecha Última Conexión</td>
            <td>Acciones</td>
        </tr>




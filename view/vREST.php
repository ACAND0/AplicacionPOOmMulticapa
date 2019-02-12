<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <a href="doc/usoAPI.pdf" target="_blank"><h1 class="titulo" style="color: black">-> Manual de APIs <-</h1></a>
    <div style="float: left;margin-right: 40px;">
        <table class="tabla01" >
            <caption>Consultas información de municipio</caption>
            <tr>
                <td>
                    <font class="error"><?php echo $error ?></font>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Provincias</b>
                </td>
            </tr>
            <tr>
                <td>Seleccione una provincia de España para obtener sus datos. 
                    <br>Estos datos son ofrecidos por un <a href="https://www.el-tiempo.net/api" target="_blank"/>servicio web externo</a><br>
                    En este link se encuentran las instrucciones de uso de este servicio rest.

                </td>
            </tr>
            <tr>
                <td>
                    <select name="CODPROV">
                        <option value="selecciona">Seleccione provincia</option>         
                        <option value="15" <?php if ($codprov == '15') { ?> selected="true" <?php }; ?>>A coruña</option>         
                        <option value="01" <?php if ($codprov == '01') { ?> selected="true" <?php }; ?>>Álava</option>         
                        <option value="02" <?php if ($codprov == '02') { ?> selected="true" <?php }; ?>>Albacete</option>         
                        <option value="03" <?php if ($codprov == '03') { ?> selected="true" <?php }; ?>>Alicante</option>         
                        <option value="04" <?php if ($codprov == '04') { ?> selected="true" <?php }; ?>>Almería</option>         
                        <option value="33" <?php if ($codprov == '33') { ?> selected="true" <?php }; ?>>Asturias</option>         
                        <option value="05" <?php if ($codprov == '05') { ?> selected="true" <?php }; ?>>Ávila</option>         
                        <option value="06" <?php if ($codprov == '06') { ?> selected="true" <?php }; ?>>Badajoz</option>         
                        <option value="07" <?php if ($codprov == '07') { ?> selected="true" <?php }; ?>>Baleares</option>         
                        <option value="08" <?php if ($codprov == '08') { ?> selected="true" <?php }; ?>>Barcelona</option>         
                        <option value="09" <?php if ($codprov == '09') { ?> selected="true" <?php }; ?>>Burgos</option>         
                        <option value="10" <?php if ($codprov == '10') { ?> selected="true" <?php }; ?>>Cáceres</option>         
                        <option value="11" <?php if ($codprov == '11') { ?> selected="true" <?php }; ?>>Cádiz</option>         
                        <option value="39" <?php if ($codprov == '39') { ?> selected="true" <?php }; ?>>Cantabria</option>         
                        <option value="12" <?php if ($codprov == '12') { ?> selected="true" <?php }; ?>>Castellón</option>         
                        <option value="51" <?php if ($codprov == '51') { ?> selected="true" <?php }; ?>>Ceuta</option>         
                        <option value="13" <?php if ($codprov == '13') { ?> selected="true" <?php }; ?>>Ciudad Real</option>         
                        <option value="14" <?php if ($codprov == '14') { ?> selected="true" <?php }; ?>>Córdoba</option>         
                        <option value="16" <?php if ($codprov == '16') { ?> selected="true" <?php }; ?>>Cuenca</option>         
                        <option value="17" <?php if ($codprov == '17') { ?> selected="true" <?php }; ?>>Girona</option>         
                        <option value="18" <?php if ($codprov == '18') { ?> selected="true" <?php }; ?>>Granada</option>         
                        <option value="19" <?php if ($codprov == '19') { ?> selected="true" <?php }; ?>>Guadalajara</option>         
                        <option value="20" <?php if ($codprov == '20') { ?> selected="true" <?php }; ?>>Guipúzcoa</option>         
                        <option value="21" <?php if ($codprov == '21') { ?> selected="true" <?php }; ?>>Huelva</option>         
                        <option value="22" <?php if ($codprov == '22') { ?> selected="true" <?php }; ?>>Huesca</option>         
                        <option value="23" <?php if ($codprov == '23') { ?> selected="true" <?php }; ?>>Jaén</option>         
                        <option value="26" <?php if ($codprov == '26') { ?> selected="true" <?php }; ?>>La rioja</option>         
                        <option value="35" <?php if ($codprov == '35') { ?> selected="true" <?php }; ?>>Las palmas</option>         
                        <option value="24" <?php if ($codprov == '24') { ?> selected="true" <?php }; ?>>León</option>         
                        <option value="25" <?php if ($codprov == '25') { ?> selected="true" <?php }; ?>>Lleida</option>         
                        <option value="27" <?php if ($codprov == '27') { ?> selected="true" <?php }; ?>>Lugo</option>         
                        <option value="28" <?php if ($codprov == '28') { ?> selected="true" <?php }; ?>>Madrid</option>         
                        <option value="29" <?php if ($codprov == '29') { ?> selected="true" <?php }; ?>>Málaga</option>         
                        <option value="52" <?php if ($codprov == '52') { ?> selected="true" <?php }; ?>>Melilla</option>         
                        <option value="30" <?php if ($codprov == '30') { ?> selected="true" <?php }; ?>>Murcia</option>         
                        <option value="31" <?php if ($codprov == '31') { ?> selected="true" <?php }; ?>>Navarra</option>         
                        <option value="32" <?php if ($codprov == '32') { ?> selected="true" <?php }; ?>>Ourense</option>         
                        <option value="34" <?php if ($codprov == '34') { ?> selected="true" <?php }; ?>>Palencia</option>         
                        <option value="36" <?php if ($codprov == '36') { ?> selected="true" <?php }; ?>>Pontevedra</option>         
                        <option value="37" <?php if ($codprov == '37') { ?> selected="true" <?php }; ?>>Salamanca</option>         
                        <option value="38" <?php if ($codprov == '38') { ?> selected="true" <?php }; ?>>Santa cruz de tenerife</option>         
                        <option value="40" <?php if ($codprov == '40') { ?> selected="true" <?php }; ?>>Segovia</option>         
                        <option value="41" <?php if ($codprov == '41') { ?> selected="true" <?php }; ?>>Sevilla</option>         
                        <option value="42" <?php if ($codprov == '42') { ?> selected="true" <?php }; ?>>Soria</option>         
                        <option value="43" <?php if ($codprov == '43') { ?> selected="true" <?php }; ?>>Tarragona</option>         
                        <option value="44" <?php if ($codprov == '44') { ?> selected="true" <?php }; ?>>Teruel</option>         
                        <option value="45" <?php if ($codprov == '45') { ?> selected="true" <?php }; ?>>Toledo</option>         
                        <option value="46" <?php if ($codprov == '46') { ?> selected="true" <?php }; ?>>Valencia</option>         
                        <option value="47" <?php if ($codprov == '47') { ?> selected="true" <?php }; ?>>Valladolid</option>         
                        <option value="48" <?php if ($codprov == '48') { ?> selected="true" <?php }; ?>>Vizcaya</option>         
                        <option value="49" <?php if ($codprov == '49') { ?> selected="true" <?php }; ?>>Zamora</option>         
                        <option value="50" <?php if ($codprov == '50') { ?> selected="true" <?php }; ?>>Zaragoza</option>         
                    </select>
                    <input class="btn" type="submit" name="Aceptar" value="Aceptar">
                </td>                                
            </tr>
        </table>
        <h2>DATOS DE PROVINCIAS </h2><?php echo $linkJSONAEMET ?>

        <b>Código de provincia: </b><?php echo $aProvincia['CODPROV'] ?><br>
        <b>Nombre de provincia: </b><?php echo $aProvincia['NOMBRE_PROVINCIA'] ?><br>
        <b>Comunidad autónoma: </b><?php echo $aProvincia['COMUNIDAD_CIUDAD_AUTONOMA'] ?><br>
        <b>Capital de provincia: </b><?php echo $aProvincia['CAPITAL_PROVINCIA'] ?><br>
        <table class="tabla01" >
            <caption>Consultas sobre ciclos formativos</caption>

            <td>Seleccione un ciclo formativo para obtener sus asignaturas<br> Este servicio es un 
                <!--<a href="http://192.168.20.19/ProyectoDWES/proyectoAplicacion1819/api/ApiCiclos.php" target="_blank"/>servicio rest propio.</a></td>-->
                <a href="http://192.168.20.19/DAW205/public_html/ProyectoDWES/proyectoAplicacion1819/api/ApiCiclos.php" target="_blank"/>servicio rest propio.</a><br>
                Este servicio devuelve un array con el nombre del ciclo formativo y<br>
                4 asignaturas pertenecientes a este ciclo, posiciones respectivas en el array.<br>


            </td>


            <tr>
                <td>
                    <select name="siglas">
                        <option value="selecciona">Seleccione un ciclo formativo</option>         
                        <option value="DAW1" <?php if ($siglas == 'DAW1') { ?> selected="true" <?php }; ?>>DAW1</option>
                        <option value="DAW2" <?php if ($siglas == 'DAW2') { ?> selected="true" <?php }; ?>>DAW2</option>
                        <option value="ASIR1" <?php if ($siglas == 'ASIR1') { ?> selected="true" <?php }; ?>>ASIR1</option>
                        <option value="ASIR2" <?php if ($siglas == 'ASIR2') { ?> selected="true" <?php }; ?>>ASIR2</option>
                    </select>
                    <input class="btn" type="submit" name="Aceptar2" value="Aceptar">
                </td>                                
            </tr>
        </table>

        <h2>DATOS DE CICLOS FORMATIVOS</h2>
        <?php echo $linkJSONCiclos ?>
        <b>Nombre del Ciclo: </b><?php echo$asignaturas['nombre'] ?><br>
        <b>ASIGNATURA 1: </b><?php echo $asignaturas['asignatura1'] ?><br>
        <b>ASIGNATURA 2: </b><?php echo $asignaturas['asignatura2'] ?> <br>
        <b>ASIGNATURA 3: </b><?php echo $asignaturas['asignatura3'] ?> <br>
        <b>ASIGNATURA 4: </b><?php echo $asignaturas['asignatura4'] ?> <br>
        <table class="tabla01" >
            <caption>Consultas sobre departamentos</caption>
            <td>Seleccione un código de departamento para obtener sus datos<br> Este servicio es un 
                <!--                 <a href="http://192.168.20.19/ProyectoDWES/proyectoAplicacion1819/api/ApiDepartamentos.php" target="_blank"/>servicio rest propio.</a>
                                que trabaja contra una base de datos.</td>                -->

                <a href="http://192.168.20.19/DAW205/public_html/ProyectoDWES/proyectoAplicacion1819/api/ApiDepartamentos.php" target="_blank"/>servicio rest propio</a>
                que trabaja contra una base de datos.</td>
            </tr>
            <tr>
                <td>
                    <select name="codigo">
                        <option value="selecciona">Seleccione un código de departamento</option>  
                        <?php
                        //Genaración de una lista dinámica
                        //Recorro el array de códigos
                        foreach ($aCodigos as $Codigo) {
                            ?>
                            <!-- Establezco el valor del Código actual-->
                            <!-- Establezco si está seleccionado dependiendo si el código actual de la lista coincide con la variable que el usuario a seleccionado-->
                            <option value="<?php echo $Codigo ?>" <?php if ($codigo == $Codigo) { ?> selected="true" <?php }; ?>><?php echo $Codigo ?></option>
                            <?php
                        }
                        ?>


                    </select>
                    <input class="btn" type="submit" name="Aceptar3" value="Aceptar">
                    <input class="btn" type="submit" name="Atras" value="Atras"><br>
                </td>                                
            </tr>
        </table>

        <h2>DATOS DE UN DEPARTAMENTO</h2>
        <?php echo $linkJSONDepartamentos ?>
        <b>Código de departamento: </b><?php echo $departamento['CodDepartamento'] ?><br>
        <b>Descripción de departamento: </b><?php echo $departamento['DescDepartamento'] ?><br>
        <b>Volumen de negocio: </b><?php echo $departamento['VolumenNegocio'] ?> <br>
        <b>Fecha de creación: </b><?php echo $departamento['FechaCreacionDepartamento'] ?> <br>
    </div>
</form>




<!--
    <div>
        <table class="tabla01">
            <caption>Datos de un municipio Zamorano</caption>
            <tr>
                <td>Seleccioneuna provincia de España</td>
            </tr>
            <tr>
                <td>
                    <select name="municipios">
                        <option name="Abezames" value="49002">Abezames</option>
                        <option name="Alcañices" value="49003">Alcañices</option>
                        <option name="Alcubilla de Nogales" value="49004">Alcubilla de Nogales</option>
                        <option name="Alfaraz de Sayago" value="49005">Alfaraz de Sayago</option>
                        <option name="Algodre" value="49006">Algodre</option>
                        <option name="Almaraz de Duero" value="49007">Almaraz de Duero</option>
                        <option name="Almenamea de Sayago" value="49008">Almenamea de Sayago</option>
                        <option name="Andavías" value="49009">Andavías</option>
                        <option name="Arcenillas" value="49010">Arcenillas</option>
                        <option name="Arcos de la Polvorosa" value="49011">Arcos de la Polvorosa</option>
                        <option name="Argañín" value="49012">Argañín</option>
                        <option name="Argujillo" value="49013">Argujillo</option>
                        <option name="Arquillinos" value="49014">Arquillinos</option>
                        <option name="Arrabalde" value="49015">Arrabalde</option>
                        <option name="Aspariegos" value="49016">Aspariegos</option>
                        <option name="Asturianos" value="49017">Asturianos</option>
                        <option name="Ayoó de Vnameriales" value="49018">Ayoó de Vnameriales</option>
                        <option name="Barcial del Barco" value="49019">Barcial del Barco</option>
                        <option name="Belver de los Montes" value="49020">Belver de los Montes</option>
                        <option name="Benavente" value="49021">Benavente</option>
                        <option name="Benegiles" value="49022">Benegiles</option>
                        <option name="Bermillo de Sayago" value="49023">Bermillo de Sayago</option>
                        <option name="La Bóveda de Toro" value="49024">La Bóveda de Toro</option>
                        <option name="Bretó" value="49025">Bretó</option>
                        <option name="Bretocino" value="49026">Bretocino</option>
                        <option name="Brime de Sog" value="49027">Brime de Sog</option>
                        <option name="Brime de Urz" value="49028">Brime de Urz</option>
                        <option name="Burganes de Valverde" value="49029">Burganes de Valverde</option>
                        <option name="Bustillo del Oro" value="49030">Bustillo del Oro</option>
                        <option name="Cabañas de Sayago" value="49031">Cabañas de Sayago</option>
                        <option name="Calzadilla de Tera" value="49032">Calzadilla de Tera</option>
                        <option name="Camarzana de Tera" value="49033">Camarzana de Tera</option>
                        <option name="Cañizal" value="49034">Cañizal</option>
                        <option name="Cañizo" value="49035">Cañizo</option>
                        <option name="Carbajales de Alba" value="49036">Carbajales de Alba</option>
                        <option name="Carbellino" value="49037">Carbellino</option>
                        <option name="Casaseca de Campeán" value="49038">Casaseca de Campeán</option>
                        <option name="Casaseca de las Chanas" value="49039">Casaseca de las Chanas</option>
                        <option name="Castrillo de la Guareña" value="49040">Castrillo de la Guareña</option>
                        <option name="Castrogonzalo" value="49041">Castrogonzalo</option>
                        <option name="Castronuevo" value="49042">Castronuevo</option>
                        <option name="Castroverde de Campos" value="49043">Castroverde de Campos</option>
                        <option name="Cazurra" value="49044">Cazurra</option>
                        <option name="Cerecinos de Campos" value="49046">Cerecinos de Campos</option>
                        <option name="Cerecinos del Carrizal" value="49047">Cerecinos del Carrizal</option>
                        <option name="Cernadilla" value="49048">Cernadilla</option>
                        <option name="Cobreros" value="49050">Cobreros</option>
                        <option name="Coomonte" value="49052">Coomonte</option>
                        <option name="Coreses" value="49053">Coreses</option>
                        <option name="Corrales del Vino" value="49054">Corrales del Vino</option>
                        <option name="Cotanes del Monte" value="49055">Cotanes del Monte</option>
                        <option name="Cubillos" value="49056">Cubillos</option>
                        <option name="Cubo de Benavente" value="49057">Cubo de Benavente</option>
                        <option name="El Cubo de Tierra del Vino" value="49058">El Cubo de Tierra del Vino</option>
                        <option name="Cuelgamures" value="49059">Cuelgamures</option>
                        <option name="Entrala" value="49061">Entrala</option>
                        <option name="Espadañedo" value="49062">Espadañedo</option>
                        <option name="Faramontanos de Tábara" value="49063">Faramontanos de Tábara</option>
                        <option name="Fariza" value="49064">Fariza</option>
                        <option name="Fermoselle" value="49065">Fermoselle</option>
                        <option name="Ferreras de Abajo" value="49066">Ferreras de Abajo</option>
                        <option name="Ferreras de Arriba" value="49067">Ferreras de Arriba</option>
                        <option name="Ferreruela" value="49068">Ferreruela</option>
                        <option name="Figueruela de Arriba" value="49069">Figueruela de Arriba</option>
                        <option name="Fonfría" value="49071">Fonfría</option>
                        <option name="Fresno de la Polvorosa" value="49075">Fresno de la Polvorosa</option>
                        <option name="Fresno de la Ribera" value="49076">Fresno de la Ribera</option>
                        <option name="Fresno de Sayago" value="49077">Fresno de Sayago</option>
                        <option name="Friera de Valverde" value="49078">Friera de Valverde</option>
                        <option name="Fuente Encalada" value="49079">Fuente Encalada</option>
                        <option name="Fuentelapeña" value="49080">Fuentelapeña</option>
                        <option name="Fuentesaúco" value="49081">Fuentesaúco</option>
                        <option name="Fuentes de Ropel" value="49082">Fuentes de Ropel</option>
                        <option name="Fuentesecas" value="49083">Fuentesecas</option>
                        <option name="Fuentespreadas" value="49084">Fuentespreadas</option>
                        <option name="Galende" value="49085">Galende</option>
                        <option name="Gallegos del Pan" value="49086">Gallegos del Pan</option>
                        <option name="Gallegos del Río" value="49087">Gallegos del Río</option>
                        <option name="Gamones" value="49088">Gamones</option>
                        <option name="Gema" value="49090">Gema</option>
                        <option name="Granja de Moreruela" value="49091">Granja de Moreruela</option>
                        <option name="Granucillo" value="49092">Granucillo</option>
                        <option name="Guarrate" value="49093">Guarrate</option>
                        <option name="Hermisende" value="49094">Hermisende</option>
                        <option name="La Hiniesta" value="49095">La Hiniesta</option>
                        <option name="Jambrina" value="49096">Jambrina</option>
                        <option name="Justel" value="49097">Justel</option>
                        <option name="Losacino" value="49098">Losacino</option>
                        <option name="Losacio" value="49099">Losacio</option>
                        <option name="Lubián" value="49100">Lubián</option>
                        <option name="Luelmo" value="49101">Luelmo</option>
                        <option name="El Maderal" value="49102">El Maderal</option>
                        <option name="Madrnameanos" value="49103">Madrnameanos</option>
                        <option name="Mahnamee" value="49104">Mahnamee</option>
                        <option name="Maire de Castroponce" value="49105">Maire de Castroponce</option>
                        <option name="Malva" value="49107">Malva</option>
                        <option name="Manganeses de la Lampreana" value="49108">Manganeses de la Lampreana</option>
                        <option name="Manganeses de la Polvorosa" value="49109">Manganeses de la Polvorosa</option>
                        <option name="Manzanal de Arriba" value="49110">Manzanal de Arriba</option>
                        <option name="Manzanal del Barco" value="49111">Manzanal del Barco</option>
                        <option name="Manzanal de los Infantes" value="49112">Manzanal de los Infantes</option>
                        <option name="Matilla de Arzón" value="49113">Matilla de Arzón</option>
                        <option name="Matilla la Seca" value="49114">Matilla la Seca</option>
                        <option name="Mayalde" value="49115">Mayalde</option>
                        <option name="Melgar de Tera" value="49116">Melgar de Tera</option>
                        <option name="Micereces de Tera" value="49117">Micereces de Tera</option>
                        <option name="Milles de la Polvorosa" value="49118">Milles de la Polvorosa</option>
                        <option name="Molacillos" value="49119">Molacillos</option>
                        <option name="Molezuelas de la Carballeda" value="49120">Molezuelas de la Carballeda</option>
                        <option name="Mombuey" value="49121">Mombuey</option>
                        <option name="Monfarracinos" value="49122">Monfarracinos</option>
                        <option name="Montamarta" value="49123">Montamarta</option>
                        <option name="Moral de Sayago" value="49124">Moral de Sayago</option>
                        <option name="Moraleja del Vino" value="49125">Moraleja del Vino</option>
                        <option name="Moraleja de Sayago" value="49126">Moraleja de Sayago</option>
                        <option name="Morales del Vino" value="49127">Morales del Vino</option>
                        <option name="Morales de Rey" value="49128">Morales de Rey</option>
                        <option name="Morales de Toro" value="49129">Morales de Toro</option>
                        <option name="Morales de Valverde" value="49130">Morales de Valverde</option>
                        <option name="Moralina" value="49131">Moralina</option>
                        <option name="Moreruela de los Infanzones" value="49132">Moreruela de los Infanzones</option>
                        <option name="Moreruela de Tábara" value="49133">Moreruela de Tábara</option>
                        <option name="Muelas de los Caballeros" value="49134">Muelas de los Caballeros</option>
                        <option name="Muelas del Pan" value="49135">Muelas del Pan</option>
                        <option name="Muga de Sayago" value="49136">Muga de Sayago</option>
                        <option name="Navianos de Valverde" value="49137">Navianos de Valverde</option>
                        <option name="Olmillos de Castro" value="49138">Olmillos de Castro</option>
                        <option name="Otero de Bodas" value="49139">Otero de Bodas</option>
                        <option name="Pajares de la Lampreana" value="49141">Pajares de la Lampreana</option>
                        <option name="Palacios del Pan" value="49142">Palacios del Pan</option>
                        <option name="Palacios de Sanabria" value="49143">Palacios de Sanabria</option>
                        <option name="Pedralba de la Pradería" value="49145">Pedralba de la Pradería</option>
                        <option name="El Pego" value="49146">El Pego</option>
                        <option name="Peleagonzalo" value="49147">Peleagonzalo</option>
                        <option name="Peleas de Abajo" value="49148">Peleas de Abajo</option>
                        <option name="Peñausende" value="49149">Peñausende</option>
                        <option name="Peque" value="49150">Peque</option>
                        <option name="El Perdigón" value="49151">El Perdigón</option>
                        <option name="Pereruela" value="49152">Pereruela</option>
                        <option name="Perilla de Castro" value="49153">Perilla de Castro</option>
                        <option name="Pías" value="49154">Pías</option>
                        <option name="Piedrahita de Castro" value="49155">Piedrahita de Castro</option>
                        <option name="Pinilla de Toro" value="49156">Pinilla de Toro</option>
                        <option name="Pino del Oro" value="49157">Pino del Oro</option>
                        <option name="El Piñero" value="49158">El Piñero</option>
                        <option name="Pobladura del Valle" value="49159">Pobladura del Valle</option>
                        <option name="Pobladura de Valderaduey" value="49160">Pobladura de Valderaduey</option>
                        <option name="Porto" value="49162">Porto</option>
                        <option name="Pozoantiguo" value="49163">Pozoantiguo</option>
                        <option name="Pozuelo de Tábara" value="49164">Pozuelo de Tábara</option>
                        <option name="Prado" value="49165">Prado</option>
                        <option name="Puebla de Sanabria" value="49166">Puebla de Sanabria</option>
                        <option name="Pueblica de Valverde" value="49167">Pueblica de Valverde</option>
                        <option name="Quintanilla del Monte" value="49168">Quintanilla del Monte</option>
                        <option name="Quintanilla del Olmo" value="49169">Quintanilla del Olmo</option>
                        <option name="Quintanilla de Urz" value="49170">Quintanilla de Urz</option>
                        <option name="Quiruelas de Vnameriales" value="49171">Quiruelas de Vnameriales</option>
                        <option name="Rabanales" value="49172">Rabanales</option>
                        <option name="Rábano de Aliste" value="49173">Rábano de Aliste</option>
                        <option name="Requejo" value="49174">Requejo</option>
                        <option name="Revellinos" value="49175">Revellinos</option>
                        <option name="Riofrío de Aliste" value="49176">Riofrío de Aliste</option>
                        <option name="Rionegro del Puente" value="49177">Rionegro del Puente</option>
                        <option name="Roales" value="49178">Roales</option>
                        <option name="Robleda-Cervantes" value="49179">Robleda-Cervantes</option>
                        <option name="Roelos de Sayago" value="49180">Roelos de Sayago</option>
                        <option name="Rosinos de la Requejada" value="49181">Rosinos de la Requejada</option>
                        <option name="Salce" value="49183">Salce</option>
                        <option name="Samir de los Caños" value="49184">Samir de los Caños</option>
                        <option name="San Agustín del Pozo" value="49185">San Agustín del Pozo</option>
                        <option name="San Cebrián de Castro" value="49186">San Cebrián de Castro</option>
                        <option name="San Cristóbal de Entreviñas" value="49187">San Cristóbal de Entreviñas</option>
                        <option name="San Esteban del Molar" value="49188">San Esteban del Molar</option>
                        <option name="San Justo" value="49189">San Justo</option>
                        <option name="San Martín de Valderaduey" value="49190">San Martín de Valderaduey</option>
                        <option name="San Miguel de la Ribera" value="49191">San Miguel de la Ribera</option>
                        <option name="San Miguel del Valle" value="49192">San Miguel del Valle</option>
                        <option name="San Pedro de Ceque" value="49193">San Pedro de Ceque</option>
                        <option name="San Pedro de la Nave-Almendra" value="49194">San Pedro de la Nave-Almendra</option>
                        <option name="Santa Clara de Avedillo" value="49197">Santa Clara de Avedillo</option>
                        <option name="Santa Colomba de las Monjas" value="49199">Santa Colomba de las Monjas</option>
                        <option name="Santa Cristina de la Polvorosa" value="49200">Santa Cristina de la Polvorosa</option>
                        <option name="Santa Croya de Tera" value="49201">Santa Croya de Tera</option>
                        <option name="Santa Eufemia del Barco" value="49202">Santa Eufemia del Barco</option>
                        <option name="Santa María de la Vega" value="49203">Santa María de la Vega</option>
                        <option name="Santa María de Valverde" value="49204">Santa María de Valverde</option>
                        <option name="Santibáñez de Tera" value="49205">Santibáñez de Tera</option>
                        <option name="Santibáñez de Vnameriales" value="49206">Santibáñez de Vnameriales</option>
                        <option name="Santovenia" value="49207">Santovenia</option>
                        <option name="San Vicente de la Cabeza" value="49208">San Vicente de la Cabeza</option>
                        <option name="San Vitero" value="49209">San Vitero</option>
                        <option name="Sanzoles" value="49210">Sanzoles</option>
                        <option name="Tábara" value="49214">Tábara</option>
                        <option name="Tapioles" value="49216">Tapioles</option>
                        <option name="Toro" value="49219">Toro</option>
                        <option name="La Torre del Valle" value="49220">La Torre del Valle</option>
                        <option name="Torregamones" value="49221">Torregamones</option>
                        <option name="Torres del Carrizal" value="49222">Torres del Carrizal</option>
                        <option name="Trabazos" value="49223">Trabazos</option>
                        <option name="Trefacio" value="49224">Trefacio</option>
                        <option name="Uña de Quintana" value="49225">Uña de Quintana</option>
                        <option name="Vadillo de la Guareña" value="49226">Vadillo de la Guareña</option>
                        <option name="Valcabado" value="49227">Valcabado</option>
                        <option name="Valdefinjas" value="49228">Valdefinjas</option>
                        <option name="Valdescorriel" value="49229">Valdescorriel</option>
                        <option name="Vallesa de la Guareña" value="49230">Vallesa de la Guareña</option>
                        <option name="Vega de Tera" value="49231">Vega de Tera</option>
                        <option name="Vega de Villalobos" value="49232">Vega de Villalobos</option>
                        <option name="Vegalatrave" value="49233">Vegalatrave</option>
                        <option name="Venialbo" value="49234">Venialbo</option>
                        <option name="Vezdemarbán" value="49235">Vezdemarbán</option>
                        <option name="Vnameayanes" value="49236">Vnameayanes</option>
                        <option name="Vnameemala" value="49237">Vnameemala</option>
                        <option name="Villabrázaro" value="49238">Villabrázaro</option>
                        <option name="Villabuena del Puente" value="49239">Villabuena del Puente</option>
                        <option name="Villadepera" value="49240">Villadepera</option>
                        <option name="Villaescusa" value="49241">Villaescusa</option>
                        <option name="Villafáfila" value="49242">Villafáfila</option>
                        <option name="Villaferrueña" value="49243">Villaferrueña</option>
                        <option name="Villageriz" value="49244">Villageriz</option>
                        <option name="Villalazán" value="49245">Villalazán</option>
                        <option name="Villalba de la Lampreana" value="49246">Villalba de la Lampreana</option>
                        <option name="Villalcampo" value="49247">Villalcampo</option>
                        <option name="Villalobos" value="49248">Villalobos</option>
                        <option name="Villalonso" value="49249">Villalonso</option>
                        <option name="Villalpando" value="49250">Villalpando</option>
                        <option name="Villalube" value="49251">Villalube</option>
                        <option name="Villamayor de Campos" value="49252">Villamayor de Campos</option>
                        <option name="Villamor de los Escuderos" value="49255">Villamor de los Escuderos</option>
                        <option name="Villanázar" value="49256">Villanázar</option>
                        <option name="Villanueva de Azoague" value="49257">Villanueva de Azoague</option>
                        <option name="Villanueva de Campeán" value="49258">Villanueva de Campeán</option>
                        <option name="Villanueva de las Peras" value="49259">Villanueva de las Peras</option>
                        <option name="Villanueva del Campo" value="49260">Villanueva del Campo</option>
                        <option name="Villaralbo" value="49261">Villaralbo</option>
                        <option name="Villardeciervos" value="49262">Villardeciervos</option>
                        <option name="Villar de Fallaves" value="49263">Villar de Fallaves</option>
                        <option name="Villar del Buey" value="49264">Villar del Buey</option>
                        <option name="Villardiegua de la Ribera" value="49265">Villardiegua de la Ribera</option>
                        <option name="Villárdiga" value="49266">Villárdiga</option>
                        <option name="Villardondiego" value="49267">Villardondiego</option>
                        <option name="Villarrín de Campos" value="49268">Villarrín de Campos</option>
                        <option name="Villaseco del Pan" value="49269">Villaseco del Pan</option>
                        <option name="Villavendimio" value="49270">Villavendimio</option>
                        <option name="Villaveza del Agua" value="49271">Villaveza del Agua</option>
                        <option name="Villaveza de Valverde" value="49272">Villaveza de Valverde</option>
                        <option name="Viñas" value="49273">Viñas</option>
                        <option name="Zamora" value="49275">Zamora</option>
                    </select>
                    <input class="btn" type="submit" name="Aceptar2" value="Aceptar">
                    <input class="btn" type="submit" name="Atras" value="Atras"><br>
                </td>                                
            </tr>
        </table>
    </div>-->

























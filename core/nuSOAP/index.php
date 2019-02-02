
<?php
highlight_file('index.php');
header('Content-Type: text/html; charset=utf-8');
require_once('lib/nusoap.php');
    //Parámetros a pasar, exdplicados en esa URL
    //https://si.ua.es/es/servicios-web/serviciosweb/publicos/wsasidepto.html 
    $slengua = "C";
    $scurso = "2011-12";
    $scoddep = "B142";
    $scodest = "";
    
    //url del webservice
    $wsdl="https://cvnet.cpd.ua.es/servicioweb/publicos/pub_gestdocente.asmx?wsdl";
    
    //instanciando un nuevo objeto cliente para consumir el webservice
    $client=new nusoap_client($wsdl,'wsdl');
    //pasando los parámetros a un array
    $param=['plengua'=>$slengua, 'pcurso' => $scurso, 'pcoddep' => $scoddep, 'pcodest' => $scodest];
    //llamando al método y pasándole el array con los parámetros
    $resultado = $client->call('wsasidepto', $param);
    
    
    
    
    
	$result= $resultado['wsasideptoResult']['ClaseAsiDepto'];
	$total = 0;
        
        for($i=0;$i<count($result);$i++){//Recorro los elementos recogidos
		echo "<b>Código de asignatura: </b>" . $result[$i]['codasi']."<br>";
		echo "<b>Nombre de la asignatura: </b><i>" . $result[$i]['nomasi']."</i><br>";
		echo "<b>Enlace a la ficha de la asignatura: </b>" .$result[$i]['enlaceasi']."<br>";
		echo "<b>Código de estudio: </b>" .$result[$i]['codest']."<br>";
		echo "<b>Nombre del estudio o del plan de estudios: </b>".$result[$i]['nomest']."<br>";
		echo "<br>"."<br>";	
                $total++;
	}	 
        
        echo $total;
        
    echo "</div>";
 
 
?>

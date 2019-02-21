var actual = new Date();

function mostrarCalendario(year, month) { //Función para mostrar un calendario (se le pasa el año y mes)
    var now = new Date(year, month - 1, 1); //
    var calcularUltimoDiaMes = new Date(year, month, 0); //Devuelve el último día del mes teniendo en cuenta el número de días de un mes
    var primerDiaSemana;
    var ultimoDiaMes = calcularUltimoDiaMes.getDate(); //Ultimo dia del mes de la fecha actual
    var dia = 0;
    var resultado = "<tr>"; //Acumula todas las celdas y filas que s evan mostrando dependiendo del mes
    var diaActual = 0;

    //Si el día es 0... 
    if (now.getDay() == 0) {
        primerDiaSemana = 7 //...la semana empezará por 7
    } else {
        primerDiaSemana = now.getDay();//.. si el primer día d ela semana no es 0, es
    }
    //La última celda es la suma del primer día de la semana + el último día del mes 9 + 30
    var ultimaCelda = primerDiaSemana + ultimoDiaMes;

    // Hacemos un bucle hasta 42, que es el máximo de valores que puede haber 6 columnas de 7 dias
    for (var i = 1; i <= 42; i++) {
        if (i == primerDiaSemana) { //Si la i es igual al primer día de la semana
            // Determinamos en que dia empieza en 1
            dia = 1;
        }
        if (i < primerDiaSemana || i >= ultimaCelda) {
            resultado += "<td></td>"; //Estas son las celdas vacías
        } else {
            // mostramos el dia
            if (dia == actual.getDate() && month == actual.getMonth() + 1 && year == actual.getFullYear()) {
                resultado += "<td class='hoy'>" + dia + "</td>";
            } else {
                resultado += "<td>" + dia + "</td>";
            }
            dia++;
        }


        if (i % 7 == 0) {
            if (dia > ultimoDiaMes)
                break;
            resultado += "</tr><tr>\n";//En este putno se comienza una nueva semana, por loque se añade una nueva línea
        }
    }

    resultado += "</tr>";
    //Array contenedor de meses
    var meses = Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    /*-------------AVANCE MES / AÑO------------*/
    siguienteMes = month + 1;//Cálculo del siguiente mes
    siguienteAño = year;    //Cálculo del siguiente año
    if (month + 1 > 12) { //Si el mes supera 12, se avanza al siguiente año
        siguienteMes = 1; //El año obviamente comienza por el mes 1
        siguienteAño = year + 1; //Se avanza el año
    }

    /*-------------ATRASO MES / AÑO------------*/
    mesAnterior = month - 1;//Cálculo del mes anterior
    añoAnterior = year;//Cálculo del año anterior
    if (month - 1 < 1) {
        mesAnterior = 12;
        añoAnterior = year - 1;
    }

    document.getElementById("calendar").getElementsByTagName(
            "caption")[0].innerHTML = "<div>" + meses[month - 1] + " / " + year + "</div><div><a onclick='mostrarCalendario(" + añoAnterior + "," + mesAnterior + ")'><</a> <a onclick='mostrarCalendario(" + siguienteAño + "," + siguienteMes + ")'>&gt;</a></div>";
    document.getElementById("calendar").getElementsByTagName("tbody")[0].innerHTML = resultado;
}

mostrarCalendario(actual.getFullYear(), actual.getMonth() + 1);
<script>

var arrNum = [["º", "ª", "\\"], ["1", "!", "|"], ["2", "\"", "@"], ["3", "·", "#"], ["4", "$", "~"], ["5", "%", "€"], ["6", "&", "¬"], ["7", "/", ""], ["8", "(", ""], ["9", ")", ""], ["0", "=", ""], ["'", "?", ""], ["¡", "¿", ""]];
var teclasAlfa = [];
var teclaALTGR = false;
var caractDH = 0;
var arrDeshacer = [];
var estadoTecladoInicial = false;
var idDeTeclas = [];
var ctrlMayMin = false;
var textoVisualiza = "";
var SHIFT = false;
var teclasAlfa = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'ñ', 'z', 'x', 'c', 'v', 'b', 'n', 'm'];
function cargaTeclado() {
    rellenarTecladoArray();
    idDeTeclas.forEach(function (f) {
        t = f.substr(5, 5);
        if (t == "NN") {
            t = "Ñ";
        }
        document.getElementById(f).value = t.toLowerCase();
    });
}
function rellenarTecladoArray() {
    var valorTecla;
    teclasAlfa.forEach(function (f) {
        if (f == "ñ") {
            valorTecla = "letraNN";
        } else {
            valorTecla = "letra" + f.toUpperCase();
        }
        idDeTeclas.push(valorTecla);
        arrDeshacer.push(valorTecla);
    });
}
function pasarMayusculas() {
    for (i = 0; i < teclasAlfa.length; i++) {
        if (teclasAlfa[i] == "ñ") {
            letraActual = "letraNN";
        } else {
            letraActual = "letra" + teclasAlfa[i].toUpperCase();
        }
        if (ctrlMayMin) {
            document.getElementById(letraActual).value = teclasAlfa[i].toLowerCase();
        } else {
            document.getElementById(letraActual).value = teclasAlfa[i].toUpperCase();
        }
    }
    if (ctrlMayMin) {
        ctrlMayMin = false;
    } else {
        ctrlMayMin = true;
    }
}

function escribeCaracter(letra) {
    if (ctrlMayMin || SHIFT) {
        letra = letra.toUpperCase();
        if (SHIFT) {
            SHIFT = false;
            pasarMayusculas();
        }
    }
    textoVisualiza += letra;
    verCaracter();
    contarPalabras();
    visualiza();
}

function visualiza() {
    areaVisualiza.value = textoVisualiza;
}

function verCaracter() {
    document.getElementById("caracteres").innerHTML = "Caracteres: " + textoVisualiza.length;
}

function contarPalabras() {
    document.getElementById("palabras").innerHTML = "Palabras: " + textoVisualiza.split(" ").length;
}

function borrar() {
    textoVisualiza = textoVisualiza.substring(0, (textoVisualiza.length - 1));
    verCaracter();
    contarPalabras();
    visualiza();
}

function retornoCarro() {
    textoVisualiza += '\n';
    visualiza();
}

function pulsaShift() {
    if (SHIFT) {
        SHIFT = false;
    } else {
        SHIFT = true;
        pasarMayusculas();
    }
}

function deshacer() {
    if (arrDeshacer.length != 0) {
        textoVisualiza = textoVisualiza.substring(0, textoVisualiza.length - 1);
        arrDeshacer.push(textoVisualiza.substring(textoVisualiza.length - 1, textoVisualiza.length));
        caractDH++;
        visualiza();
    }
}

function rehacer() {
    if (arrDeshacer.length != 0 && caractDH != 0) {
        caractDH--;
        textoVisualiza += arrDeshacer.pop();
        visualiza();
    }
}

function teclaAltGr() {
    if (teclaALTGR) {
        teclaALTGR = false;
    } else {
        teclaALTGR = true;
    }
    console.log(teclaALTGR);
}

function alternaNumeros(nletra) {
    var posArr = 0;
    if (SHIFT) {
        posArr = 1;
        pulsaShift();
    } else {
        if (teclaALTGR) {
            posArr = 2;
            teclaAltGr();
        } else {
            posArr = 0;
        }
    }
    textoVisualiza += arrNum[nletra][posArr];
    visualiza();
}


function tieneQueSerMayus() {

    if (textoVisualiza == 0 || textoVisualiza[textoVisualiza.length - 1] == "." || ctrlMayMin) {
        return true;
    }

    if (textoVisualiza[textoVisualiza.length - 2 == "."]) {
        return false;
    }
    return false;
}
</script>
<form id="teclado">
    <input type="button" onclick="" value="Esc" name="Esc" id="ESC" />
    <input type="button" onclick="alternaNumeros(0)" value="º" name="º" />
    <input type="button" onclick="alternaNumeros(1)" value="1" name="1" />
    <input type="button" onclick="alternaNumeros(2)" value="2" name="2" />
    <input type="button" onclick="alternaNumeros(3)" value="3" name="3" />
    <input type="button" onclick="alternaNumeros(4)" value="4" name="4" />
    <input type="button" onclick="alternaNumeros(5)" value="5" name="5" />
    <input type="button" onclick="alternaNumeros(6)" value="6" name="6" />
    <input type="button" onclick="alternaNumeros(7)" value="7" name="7" />
    <input type="button" onclick="alternaNumeros(8)" value="8" name="8" />
    <input type="button" onclick="alternaNumeros(9)" value="9" name="9" />
    <input type="button" onclick="alternaNumeros(10)" value="0" name="0" />
    <input type="button" onclick="alternaNumeros(11)" value="?" name="?" />
    <input type="button" onclick="alternaNumeros(12)" value="¿" name="¿" />
    <input type="button" onclick="borrar()" value="<--" name="<--" />
    <br>
    <input type="button" ondblclick="pasarMayusculas()" value="Shift" name="Shift" id="SHIFT" />
    <input type="button" onclick="escribeCaracter('q')" name="q" id="letraQ" />
    <input type="button" onclick="escribeCaracter('w')" name="w" id="letraW" />
    <input type="button" onclick="escribeCaracter('e')" name="e" id="letraE" />
    <input type="button" onclick="escribeCaracter('r')" name="r" id="letraR" />
    <input type="button" onclick="escribeCaracter('t')" name="t" id="letraT" />
    <input type="button" onclick="escribeCaracter('y')" name="y" id="letraY" />
    <input type="button" onclick="escribeCaracter('u')" name="u" id="letraU" />
    <input type="button" onclick="escribeCaracter('i')" name="i" id="letraI" />
    <input type="button" onclick="escribeCaracter('o')" name="o" id="letraO" />
    <input type="button" onclick="escribeCaracter('p')" name="p" id="letraP" />
    <input type="button" onclick="retornoCarro()" value="Enter" name="Enter" id="ENTER" />
    <br>
    <input type="button" onclick="pasarMayusculas()" value="Bloq Mayus" name="Bloq Mayus" />
    <input type="button" onclick="escribeCaracter('a')" name="a" id="letraA" />
    <input type="button" onclick="escribeCaracter('s')" name="s" id="letraS" />
    <input type="button" onclick="escribeCaracter('d')" name="d" id="letraD" />
    <input type="button" onclick="escribeCaracter('f')" name="f" id="letraF" />
    <input type="button" onclick="escribeCaracter('g')" name="g" id="letraG" />
    <input type="button" onclick="escribeCaracter('h')" name="h" id="letraH" />
    <input type="button" onclick="escribeCaracter('j')" name="j" id="letraJ" />
    <input type="button" onclick="escribeCaracter('k')" name="k" id="letraK" />
    <input type="button" onclick="escribeCaracter('l')" name="l" id="letraL" />
    <input type="button" onclick="escribeCaracter('ñ')" name="ñ" id="letraNN" />
    <br>
    <input type="button" onclick="pulsaShift()" value="Sup" name="Sup" />
    <input type="button" onclick="escribeCaracter('z')" name="z" id="letraZ" />
    <input type="button" onclick="escribeCaracter('x')" name="x" id="letraX" />
    <input type="button" onclick="escribeCaracter('c')" name="c" id="letraC" />
    <input type="button" onclick="escribeCaracter('v')" name="v" id="letraV" />
    <input type="button" onclick="escribeCaracter('b')" name="b" id="letraB" />
    <input type="button" onclick="escribeCaracter('n')" name="n" id="letraN" />
    <input type="button" onclick="escribeCaracter('m')" name="m" id="letraM" />
    <input type="button" onclick="" value="," name="," />
    <input type="button" onclick="" value="." name="." />
    <input type="button" onclick="" value="-" name="-" />
    <input type="button" onclick="pulsaShift()" value="Sup" name="Sup" />
    <br>
    <input type="button" onclick="" value="Control" name="Control" id="CONTROL" />
    <input type="button" onclick="" value="Alt" name="Alt" id="ALT" />
    <input type="button" onclick="escribeCaracter(' ')" value="Espacio" name="Espacio" id="ESPACIO" />
    <input type="button" onclick="teclaAltGr()" value="Alt Gr" name="Alt Gr" id="ALTGR" />
    <input type="button" onclick="rehacer()" value="Hacer" name="Hacer" id="Hacer" />
    <input type="button" onclick="deshacer()" value="Deshacer" name="Deshacer" id="Deshacer" />
</form>

<?php

require_once 'DepartamentoPDO.php';

Class Departamento { //extends desde aqui orequire_once desde UsuariosPDO?

    private $codDepartamento;
    private $descDepartamento;
    private $volumenDeNegocio;
    private $fechaBajaDepartamento;

    function __construct($codDepartamento, $descDepartamento, $volumenDeNegocio, $fechaBajaDepartamento) {
        $this->codDepartamento = $codDepartamento;
        $this->descDepartamento = $descDepartamento;
        $this->volumenDeNegocio = $volumenDeNegocio;
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }

    function getCodDepartamento() {
        return $this->codDepartamento;
    }

    function getDescDepartamento() {
        return $this->descDepartamento;
    }

    function getVolumenDeNegocio() {
        return $this->volumenDeNegocio;
    }

    function getFechaBajaDepartamento() {
        return $this->fechaBajaDepartamento;
    }

    function setCodDepartamento($codDepartamento) {
        $this->codDepartamento = $codDepartamento;
    }

    function setDescDepartamento($descDepartamento) {
        $this->descDepartamento = $descDepartamento;
    }

    function setVolumenDeNegocio($volumenDeNegocio) {
        $this->volumenDeNegocio = $volumenDeNegocio;
    }

    function setFechaBajaDepartamento($fechaBajaDepartamento) {
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }

    public static function buscaDepartamentosPorCodigo($CodDepartamento) {
        return DepartamentoPDO::buscaDepartamentosPorCodigo($CodDepartamento);
    }

    /*
     * buscaDepartamentosPorDescripcion
     * 
     * Recoge los valores devueltos de la función UsuarioPDO::buscaDepartamentosPorDescripcion
     * 
     * @return Array Array de objetos departamento instanciados
     */

    public static function buscaDepartamentosPorDescripcion($descripcion, $criterioBusqueda) {
        $aDepartamentos = DepartamentoPDO::buscaDepartamentosPorDescripcion($descripcion, $criterioBusqueda);
        $aObjeDepartamentos = []; //Array que almacena los objetos Departamentos instanciados

        foreach ($aDepartamentos as $aDepartamento) {//Recorro el array de Departamentos para instanciar un objeto Departamento
            //Creo un objeto departamento con los valores del departamento actual
            $Departamento = new Departamento($aDepartamento[CodDepartamento], $aDepartamento[DescDepartamento], $aDepartamento[VolumenDeNegocio], $aDepartamento[FechaBajaDepartamento]);
            array_push($aObjeDepartamentos, $Departamento); //Añado el objeto departamento creado al array de objetos
        }
        return $aObjeDepartamentos; //Retorno el array de Objetos Departamento 
    }

    public static function altaDepartamento($CodDepartamento, $DescDepartamento, $VolumenNegocio) {
        return (DepartamentoPDO::altaDepartamento($CodDepartamento, $DescDepartamento, $VolumenNegocio));
    }

    public function bajaFisicaDepartamento() {
        
    }

    public function bajaLogicaDepartamento() {
        
    }

    public function modificaDepartamento() {
        
    }

    public function rehabilitaDepartamento() {
        
    }

    public static function validaCodNoExiste() {
        
    }

}

?>
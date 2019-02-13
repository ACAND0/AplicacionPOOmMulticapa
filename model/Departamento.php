<?php

/**
 * Archivo Departamento.php
 * 
 * Este archivo contiene una clase con varias funciones, las cuales manejan las operaciones
 * relacionadas con los objetos Departamento en nuestra aplicación, esta clase es independiente de
 * la base de datos o sistema con el que se trabaje, ya que de esa tarea se encarga la clase DepartamentoPDO
 *  
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package model
 */
require_once 'DepartamentoPDO.php';

/**
 *  Class Departamento
 * 
 * Contiene funciones que operan con objetos Departamento
 * 
 * @author Adrián Cando Oviedo
 * @modifiedDate 11/02/2019
 * @version 2.6
 * 
 */
Class Departamento { //extends desde aqui orequire_once desde UsuariosPDO?
    /**
     *
     * @var string Código de Departamento 
     */

    private $codDepartamento;

    /**
     *
     * @var string Descripción de Departamento 
     */
    private $descDepartamento;

    /**
     *
     * @var string Fecha de creación de Departamento 
     */
    private $FechaCreacionDepartamento;

    /**
     *
     * @var int Volumen de negocio de Departamento 
     */
    private $volumenDeNegocio;

    /**
     *
     * @var string Fecha de baja de Departamento 
     */
    private $fechaBajaDepartamento;

    /**
     * function __construct($codDepartamento, $descDepartamento, $FechaCreacionDepartamento, $volumenDeNegocio, $fechaBajaDepartamento)
     * 
     * Constructor del objeto Departamento
     * 
     * @param string $codDepartamento
     * @param string $descDepartamento
     * @param string $FechaCreacionDepartamento
     * @param int $volumenDeNegocio
     * @param string $fechaBajaDepartamento
     */
    function __construct($codDepartamento, $descDepartamento, $FechaCreacionDepartamento, $volumenDeNegocio, $fechaBajaDepartamento) {
        $this->codDepartamento = $codDepartamento;
        $this->descDepartamento = $descDepartamento;
        $this->FechaCreacionDepartamento = $FechaCreacionDepartamento;
        $this->volumenDeNegocio = $volumenDeNegocio;
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }

    /**
     * 
     * function getCodDepartamento()
     *
     * @return string
     */
    function getCodDepartamento() {
        return $this->codDepartamento;
    }

    /**
     * 
     * function getDescDepartamento()
     *
     * @return string
     *
     */
    function getDescDepartamento() {
        return $this->descDepartamento;
    }

    /**
     * 
     * function getFechaCreacionDepartamento()
     *
     * @return string
     */
    function getFechaCreacionDepartamento() {
        return $this->FechaCreacionDepartamento;
    }

    /**
     * 
     * function getVolumenDeNegocio()
     *
     * @return int
     */
    function getVolumenDeNegocio() {
        return $this->volumenDeNegocio;
    }

    /**
     * 
     * function getFechaBajaDepartamento()
     *
     * @return string
     */
    function getFechaBajaDepartamento() {
        return $this->fechaBajaDepartamento;
    }

    /**
     * 
     * function setCodDepartamento($codDepartamento)
     *
     * @param string $codDepartamento
     */
    function setCodDepartamento($codDepartamento) {
        $this->codDepartamento = $codDepartamento;
    }

    /**
     * 
     * function setDescDepartamento($descDepartamento)
     *
     * @param string $descDepartamento
     */
    function setDescDepartamento($descDepartamento) {
        $this->descDepartamento = $descDepartamento;
    }

    /**
     * 
     * function setVolumenDeNegocio($volumenDeNegocio)
     *
     * @param int $volumenDeNegocio
     */
    function setVolumenDeNegocio($volumenDeNegocio) {
        $this->volumenDeNegocio = $volumenDeNegocio;
    }

    /**
     * 
     * function setFechaBajaDepartamento($fechaBajaDepartamento)
     *
     * @param string $fechaBajaDepartamento
     */
    function setFechaBajaDepartamento($fechaBajaDepartamento) {
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }

    /**
     * public static function buscaDepartamentosPorCodigo($codigo)
     * 
     * Función que llama a buscaDepartamentosPorCodigo de la clase DepartamentoPDO e instancia 
     * un objeto de la clase Departamento si ha encontrado alguno
     * 
     * @param string $codigo
     * @return bool
     */
    public static function buscaDepartamentosPorCodigo($codigo) {
        $aDepartamento = DepartamentoPDO::buscaDepartamentosPorCodigo($codigo);
        if (!empty($aDepartamento)) {
            $Departamento = new Departamento($aDepartamento[CodDepartamento], $aDepartamento[DescDepartamento], $aDepartamento[FechaCreacionDepartamento], $aDepartamento[VolumenDeNegocio], $aDepartamento[FechaBajaDepartamento]);
        } else {
            $Departamento = null;
        }
        return $Departamento;
    }

    /**
     * public static function buscaDepartamentosPorDescripcion($descripcion, $criterioBusqueda)
     * 
     * Función que llama a buscaDepartamentosPorDescripcion de la clase DepartamentoPDO, la cual devuelve un array de Departamentos,
     * se instancian estos Departamentos y se van introduciendo en un array de Objetos Departamento
     * el cual será devuelto
     * 
     * @param string $descripcion
     * @param string $criterioBusqueda Alta,Baja o Todos, según su estado de fecha de baja
     * @return array Array de objetos departamento
     */
    public static function buscaDepartamentosPorDescripcion($descripcion, $criterioBusqueda,$primerRegistro,$registrosPorPagina) {
        $aDepartamentos = DepartamentoPDO::buscaDepartamentosPorDescripcion($descripcion, $criterioBusqueda,$primerRegistro,$registrosPorPagina);
        $aObjeDepartamentos = []; //Array que almacena los objetos Departamentos instanciados

        foreach ($aDepartamentos as $aDepartamento) {//Recorro el array de Departamentos para instanciar un objeto Departamento
            //Creo un objeto departamento con los valores del departamento actual
            $Departamento = new Departamento($aDepartamento[CodDepartamento], $aDepartamento[DescDepartamento], $aDepartamento[FechaCreacionDepartamento], $aDepartamento[VolumenDeNegocio], $aDepartamento[FechaBajaDepartamento]);
            array_push($aObjeDepartamentos, $Departamento); //Añado el objeto departamento creado al array de objetos
        }
        return $aObjeDepartamentos; //Retorno el array de Objetos Departamento 
    }
    
    
        public static function contarDepartamentosPorDesc($descripcion, $criterioBusqueda) {
            return DepartamentoPDO::contarDepartamentosPorDesc($descripcion, $criterioBusqueda);
        }

    /**
     * public static function altaDepartamento($CodDepartamento, $DescDepartamento, $VolumenNegocio)
     * 
     * Función que llama a altaDepartamento de la clase DepartamentoPDO 
     * 
     * @param string $CodDepartamento
     * @param string $DescDepartamento
     * @param int $VolumenNegocio
     * @return boolean
     */
    public static function altaDepartamento($CodDepartamento, $DescDepartamento, $VolumenNegocio) {
        return DepartamentoPDO::altaDepartamento($CodDepartamento, $DescDepartamento, $VolumenNegocio);
    }

    /**
     * public function bajaFisicaDepartamento()
     * 
     * Función que llama a bajaFisicaDepartamento de la clase DepartamentoPDO
     * 
     * @return boolean
     */
    public function bajaFisicaDepartamento() {
        return DepartamentoPDO::bajaFisicaDepartamento($this->getCodDepartamento());
    }

    /**
     * public function bajaLogicaDepartamento()
     * 
     * Función que llama a bajaLogicaDepartamento de la clase DepartamentoPDO
     *
     * @return boolean
     */
    public function bajaLogicaDepartamento() {
        return DepartamentoPDO::bajaLogicaDepartamento($this->getCodDepartamento());
    }

    /**
     * public function modificaDepartamento($VolumenDeNegocio, $DescDepartamento)
     * 
     * Función que llama a modificaDepartamento de la clase DepartamentoPDO
     *
     * @param int $VolumenDeNegocio
     * @param string $DescDepartamento
     * @return boolean
     */
    public function modificaDepartamento($VolumenDeNegocio, $DescDepartamento) {
        return DepartamentoPDO::modificaDepartamento($this->getCodDepartamento(), $VolumenDeNegocio, $DescDepartamento);
    }

    /**
     * public function rehabilitaDepartamento()
     * 
     * Función que llama a rehabilitaDepartamento de la clase DepartamentoPDO
     *
     * @return boolean
     */
    public function rehabilitaDepartamento() {
        return DepartamentoPDO::rehabilitaDepartamento($this->getCodDepartamento());
    }

    /**
     * public static function validaCodNoExiste($CodDepartamento)
     * 
     * Función que llama a validaCodNoExiste de la clase DepartamentoPDO
     *
     * @param string $CodDepartamento
     * @return boolean
     */
    public static function validaCodNoExiste($CodDepartamento) {
        return DepartamentoPDO::validaCodNoExiste($CodDepartamento);
    }

    /**
     * public static function importarDepartamento($CodDepartamento, $DescDepartamento, $FechaCreacionDepartamento, $VolumenNegocio, $FechaBajaDepartamento)
     *      
     * Función que llama a importarDepartamento de la clase DepartamentoPDO que devuelve un boolean
     *
     * @param string $CodDepartamento
     * @param string $DescDepartamento
     * @param string $FechaCreacionDepartamento
     * @param int $VolumenNegocio
     * @param string $FechaBajaDepartamento
     * @return boolean
     */
    public static function importarDepartamento($CodDepartamento, $DescDepartamento, $FechaCreacionDepartamento, $VolumenNegocio, $FechaBajaDepartamento) {
        return DepartamentoPDO::importarDepartamento($CodDepartamento, $DescDepartamento, $FechaCreacionDepartamento, $VolumenNegocio, $FechaBajaDepartamento);
    }

}

?>
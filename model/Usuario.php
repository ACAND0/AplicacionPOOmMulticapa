<?php

/**
 * Archivo Usuario.php
 * 
 * Este archivo contiene una clase con varias funciones, las cuales manejan las operaciones
 * relacionadas con los objetos Usuarios en nuestra aplicación, esta clase es independiente de
 * la base de datos o sistema con el que se trabaje, ya que de esa tarea se encarga la clase UsuarioPDO
 * 
 * @author Adrián Cando Oviedo
 * @version 2.6
 * @package model
 */
require_once 'UsuarioPDO.php';

/**
 *  Class Usuario
 * 
 * Contiene funciones que operan con objetos Usuarios
 * 
 * @author Adrián Cando Oviedo
 * @modifiedDate 11/02/2019
 * @version 2.6
 * 
 * 
 */
Class Usuario { //extends desde aqui orequire_once desde UsuariosPDO?
    /**
     * @var string Códgio de usuario
     */

    private $codUsuario;

    /**
     * @var string Password
     */
    private $password;

    /**
     * @var string Descripción del usuario
     */
    private $descUsuario;

    /**
     * @var int Numero de accesos
     */
    private $numAccesos;

    /**
     * @var string Fecha y hora de la última conexión, string cuando se recoge en php y timestamp al introducirlo en la base de datos
     */
    private $fechaHoraUltimaConexion;

    /**
     * @var string Perfil, string en php y enum en la base de datos
     */
    private $perfil;

    /**
     * __construct($codUsuario, $password, $descUsuario, $numAccesos, $fechaHoraUltimaConexion, $perfil)
     * 
     * Parámetros y reglas a la hora de instanciar un objeto Usuario
     * 
     * @param string $codUsuario
     * @param string $password
     * @param string $descUsuario
     * @param int $numAccesos
     * @param string $fechaHoraUltimaConexion
     * @param string $perfil
     */
    function __construct($codUsuario, $password, $descUsuario, $numAccesos, $fechaHoraUltimaConexion, $perfil) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numAccesos = $numAccesos;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->perfil = $perfil;
    }

    /**
     *  function getCodUsuario()
     *
     * @return string
     */
    function getCodUsuario() {
        return $this->codUsuario;
    }

    /**
     *  function setCodUsuario($codUsuario)
     *
     * @param string $codUsuario
     */
    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    /**
     *  function getPassword()
     *
     * @return string
     */
    function getPassword() {
        return $this->password;
    }

    /**
     *  function setPassword($password)
     *
     * @param string $password
     */
    function setPassword($password) {
        $this->password = $password;
    }

    /**
     *  function getDescUsuario()
     *
     * @return string
     */
    function getDescUsuario() {
        return $this->descUsuario;
    }

    /**
     *  function setDescUsuario($descUsuario)
     *
     * @param string $descUsuario
     */
    function setDescUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }

    /**
     *  function getNumAccesos()
     *
     * @return int
     */
    function getNumAccesos() {
        return $this->numAccesos;
    }

    /**
     *  function setNumAccesos($numAccesos)
     *
     * @param int $numAccesos
     */
    function setNumAccesos($numAccesos) {
        $this->numAccesos = $numAccesos;
    }

    /**
     *  function getFechaHoraUltimaConexion()
     *
     * @return string
     */
    function getFechaHoraUltimaConexion() {
        return $this->fechaHoraUltimaConexion;
    }

    /**
     *  function setFechaHoraUltimaConexion($fechaHoraUltimaConexion)
     *
     * @param string $fechaHoraUltimaConexion
     */
    function setFechaHoraUltimaConexion($fechaHoraUltimaConexion) {
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
    }

    /**
     *  function getPerfil()
     *
     * @return string
     */
    function getPerfil() {
        return $this->perfil;
    }

    /**
     * function setPerfil($perfil)
     *
     * @param string $perfil
     */
    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    /**
     * public static function validarUsuario($codUsuario, $password)
     * 
     * Si la validación desde la clase PDO retorna un array con elementos instancia un objeto Usuario y lo devuelve
     * Si retorna un array vacío, devuelve null
     * 
     * @param string $codUsuario
     * @param string $password
     * @return \Usuario|null 
     */
    public static function validarUsuario($codUsuario, $password) {
        $Usuario = null;
        $aUsuario = UsuarioPDO::validarUsuario($codUsuario, $password);
        if (!empty($aUsuario)) {
            $Usuario = new Usuario($codUsuario, $password, $aUsuario['DescUsuario'], $aUsuario['NumAccesos'], $aUsuario['FechaHoraUltimaConexion'], $aUsuario['Perfil']);
        }
        return $Usuario;
    }

    /**
     * public static function altaUsuario($codUsuario, $Password, $DescUsuario)
     * 
     * Instancia un objeto usuario con los datos pasados como parámetros y lo devuelve, siempre que la clase PDO haya devuelto 
     * un boolean true
     * 
     * @param string $codUsuario
     * @param string $Password
     * @param string $DescUsuario
     * @return \Usuario|null
     */
    public static function altaUsuario($codUsuario, $Password, $DescUsuario) {
        $Usuario = null;
        if (UsuarioPDO::altaUsuario($codUsuario, $Password, $DescUsuario)) {
            $Usuario = new Usuario($codUsuario, $Password, $DescUsuario, 0, null, 'usuario');
        }
        return $Usuario;
    }

    /**
     * public function modificarUsuario($DescUsuario, $Perfil, $Password)
     * 
     * Función que devuelve unos parámetros devueltos a su vez por la función modificarUsuario de la clase UsuarioPDO
     * 
     * @param String $DescUsuario
     * @param String $Perfil
     * @param String $Password
     * @return boolean
     */
    public function modificarUsuario($DescUsuario, $Perfil, $Password) {
        return UsuarioPDO::modificarUsuario($this->getCodUsuario(), $DescUsuario, $Perfil, $Password);
    }

    /**
     * public function cambiarPassword($password)
     * 
     * Llama a cambiarPassword de la clase UsuarioPDO
     * @param string $password 
     * @return boolean
     */
    public function cambiarPassword($password) {
        $this->setPassword($password);
        return UsuarioPDO::cambiarPassword($password, $this->getCodUsuario());
    }

    /**
     * public function borrarUsuario()
     * 
     * Llama a borrarUsuario de la clase UsuarioPDO
     * 
     * @return boolean
     */
    public function borrarUsuario() {
        return UsuarioPDO::borrarUsuario($this->getCodUsuario());
    }

    /**
     * public function registrarUltimaConexion($codUsuario)
     * 
     * Llama a registrarUltimaConexion de la clase UsuarioPDO
     * 
     * @param string $codUsuario
     * @return boolean
     */
    public function registrarUltimaConexion($codUsuario) {
        return UsuarioPDO::registrarUltimaConexion($codUsuario);
    }

    /**
     * public static function validarCodNoExiste($codUsuario)
     * 
     * Llama a validarCodNoExiste de la clase UsuarioPDO
     * 
     * @param string $codUsuario
     * @return boolean
     */
    public static function validarCodNoExiste($codUsuario) {
        return UsuarioPDO::validarCodNoExiste($codUsuario);
    }

    /**
     * public static function buscaUsuariosPorDesc($descripcion)
     * 
     * Llama a buscaUsuariosPorDesc de la clase UsuarioPDO, la cual devuelve un array de Usuarios,
     * se instancian estos Usuarios y se van introduciendo en un array de Objetos Usuario
     * el cual será devuelto
     * 
     * @param string $descripcion
     * @return array Array de objetos Usuario
     */
    public static function buscaUsuariosPorDesc($descripcion) {
        $aObjeUsuarios = []; //Array que almacena los objetos Departamentos instanciados
        $aUsuarios = UsuarioPDO::buscaUsuariosPorDesc($descripcion);

        foreach ($aUsuarios as $aUsuario) {//Recorro el array de Departamentos para instanciar un objeto Departamento
            //Creo un objeto departamento con los valores del departamento actual
            $Usuario = new Usuario($aUsuario[T01_CodUsuario], $aUsuario[T01_Password], $aUsuario[T01_DescUsuario], $aUsuario[T01_NumAccesos], $aUsuario[T01_FechaHoraUltimaConexion], $aUsuario[T01_Perfil]);
            array_push($aObjeUsuarios, $Usuario); //Añado el objeto departamento creado al array de objetos
        }
        return $aObjeUsuarios; //Retorno el array de Objetos Departamento         
    }

    /**
     * public static function buscaUsuariosPorCodigo($codigo)
     * 
     * Llama a buscaUsuariosPorCodigo de la clase UsuarioPDO, e instancia el usuario con ese código
     * si es que lo ha encontrado
     * 
     * @param string $codigo
     * @return \Usuario
     */
    public static function buscaUsuariosPorCodigo($codigo) {
        $aUsuario = UsuarioPDO::buscaUsuariosPorCodigo($codigo);
        if (!empty($aUsuario)) {
            $Usuario = new Usuario($aUsuario[T01_CodUsuario], $aUsuario[T01_Password], $aUsuario[T01_DescUsuario], $aUsuario[T01_NumAccesos], $aUsuario[T01_FechaHoraUltimaConexion], $aUsuario[T01_Perfil]);
        }
        return $Usuario;
    }

    /**
     * public static function importarUsuario($CodUsuario, $Password, $DescUsuario, $NumAccesos, $FechaHoraUltimaConexion, $Perfil)
     * 
     * Llama a importarUsuario de la clase UsuarioPDO
     * 
     * @param String $CodUsuario
     * @param String $Password
     * @param String $DescUsuario
     * @param int $NumAccesos
     * @param String $FechaHoraUltimaConexion
     * @param String $Perfil
     * @return boolean
     */
    public static function importarUsuario($CodUsuario, $Password, $DescUsuario, $NumAccesos, $FechaHoraUltimaConexion, $Perfil) {
        return UsuarioPDO::importarUsuario($CodUsuario, $Password, $DescUsuario, $NumAccesos, $FechaHoraUltimaConexion, $Perfil);
    }

}

?>

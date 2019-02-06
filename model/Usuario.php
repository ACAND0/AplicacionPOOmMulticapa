<?php

/*
 * Fichero Usuaruio.php
 * 
 * 
 * 
 */




require_once 'UsuarioPDO.php';
/*
 *  Clase usuario
 * 
 * @author Adrián Camdo Oviedo
 * @modifiedDate 28/01/2019
 * @version 1.5
 * 
 * @var 
 * 
 *  */

Class Usuario { //extends desde aqui orequire_once desde UsuariosPDO?

    private $codUsuario;
    private $password;
    private $descUsuario;
    private $numAccesos;
    private $fechaHoraUltimaConexion;
    private $perfil;
    private $listaOpinionesUsuario;

    function __construct($codUsuario, $password, $descUsuario, $numAccesos, $fechaHoraUltimaConexion, $perfil) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numAccesos = $numAccesos;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->perfil = $perfil;
    }

    function getCodUsuario() {
        return $this->codUsuario;
    }

    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    function getPassword() {
        return $this->password;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function getDescUsuario() {
        return $this->descUsuario;
    }

    function setDescUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }

    function getNumAccesos() {
        return $this->numAccesos;
    }

    function setNumAccesos($numAccesos) {
        $this->numAccesos = $numAccesos;
    }

    function getFechaHoraUltimaConexion() {
        return $this->fechaHoraUltimaConexion;
    }

    function setFechaHoraUltimaConexion($fechaHoraUltimaConexion) {
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function getListaOpinionesUsuario() {
        return $this->listaOpinionesUsuario;
    }

    function setListaOpinionesUsuario($listaOpinionesUsuario) {
        $this->listaOpinionesUsuario = $listaOpinionesUsuario;
    }

    /**
     * @function validarUsuario($codUsuario, $password)
     * @param  string $codUsuario, string $password
     * @return Objeto Instancia un objeto Usuario si la validación es satisfactoria
     * 
     */
    public static function validarUsuario($codUsuario, $password) {
        $Usuario = null;
        $aUsuario = UsuarioPDO::validarUsuario($codUsuario, $password);
        if (!empty($aUsuario)) {
            $Usuario = new Usuario($codUsuario, $password, $aUsuario['DescUsuario'], $aUsuario['NumAccesos'], $aUsuario['FechaHoraUltimaConexion'], $aUsuario['Perfil']);
        }
        return $Usuario;
    }

    public static function altaUsuario($codUsuario, $Password, $DescUsuario) {

        if (UsuarioPDO::altaUsuario($codUsuario, $Password, $DescUsuario)) {
            $Usuario = new Usuario($codUsuario, $Password, $DescUsuario, 0, null, 'usuario');
        }
        return $Usuario;
    }

    public function cambiarPassword($password) {
        $this->setPassword($password);
        return UsuarioPDO::cambiarPassword($password, $this->getCodUsuario());
    }

    public function modificarUsuario($DescUsuario) {
        $this->setDescUsuario($DescUsuario);
        return UsuarioPDO::modificarUsuario($this->getCodUsuario(), $DescUsuario);
    }

    public function borrarUsuario() {
        return UsuarioPDO::borrarUsuario($this->getCodUsuario());
    }

    public function registrarUltimaConexion($codUsuario) {
        return UsuarioPDO::registrarUltimaConexion($codUsuario);
    }

    public static function validarCodNoExiste($codUsuario) {
        return UsuarioPDO::validarCodNoExiste($codUsuario);
    }
            
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
    
    

    public function creaOpinion() {
        
    }

    public function modificaOpinion() {
        
    }

    public function borraOpinion() {
        
    }

}

?>
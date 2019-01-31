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

    private $CodUsuario;
    private $password;
    private $descUsuario;
    private $numAccesos;
    private $fechaHoraUltimaConexion;
    private $perfil;
    private $listaOpinionesUsuario;

    function __construct($CodUsuario, $password, $descUsuario, $numAccesos, $fechaHoraUltimaConexion, $perfil) {
        $this->codUsuario = $CodUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numAccesos = $numAccesos;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->perfil = $perfil;
    }

    function getCodUsuario() {
        return $this->codUsuario;
    }

    function setCodUsuario($CodUsuario) {
        $this->codUsuario = $CodUsuario;
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
     * @function validarUsuario($CodUsuario, $password)
     * @param  string $CodUsuario, string $password
     * @return Objeto Instancia un objeto Usuario si la validación es satisfactoria
     * 
     */
    public static function validarUsuario($CodUsuario, $password) {
        $Usuario = null;
        $aUsuario = UsuarioPDO::validarUsuario($CodUsuario, $password);
        if (!empty($aUsuario)) {
            $Usuario = new Usuario($CodUsuario, $password, $aUsuario['DescUsuario'], $aUsuario['NumAccesos'], $aUsuario['FechaHoraUltimaConexion'], $aUsuario['Perfil']);
        }
        return $Usuario;
    }

    public static function altaUsuario($CodUsuario, $Password, $DescUsuario) {

        if (UsuarioPDO::altaUsuario($CodUsuario, $Password, $DescUsuario)) {
            $Usuario = new Usuario($CodUsuario, $Password, $DescUsuario, 0, null, 'usuario');
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

    public function registrarUltimaConexion($CodUsuario) {
        return UsuarioPDO::registrarUltimaConexion($CodUsuario);
    }

    public static function validarCodNoExiste($CodUsuario) {
        return UsuarioPDO::validarCodNoExiste($CodUsuario);
    }

    public static function buscaUsuariosPorDesc() {
        
    }

    public function creaOpinion() {
        
    }

    public function modificaOpinion() {
        
    }

    public function borraOpinion() {
        
    }

}

?>
<?php

require_once 'UsuarioPDO.php';

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
            $Usuario = new Usuario($codUsuario, $password,$aUsuario['DescUsuario'],$aUsuario['NumAccesos'], $aUsuario['FechaHoraUltimaConexion'],  $aUsuario['Perfil']);
        }
        return $Usuario;
    }

    public static function altaUsuario() {
        
    }

    public function modificarUsuario() {
        
    }

    public function borrarUsuario() {
        
    }

    public function registrarUltimaConexion() {
        
    }

    public static function validarCodNoExiste() {
        
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
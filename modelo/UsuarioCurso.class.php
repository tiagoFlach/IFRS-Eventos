<?php
class UsuarioCurso{
    use DTO; //Usar a trait que implementa o metodo de inserção
    private $id;
    private $idUsuario;
    private $idCurso;
    
    public function __construct() {
    }
    
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    public function getIdCurso(){
        return $this->valorInscricaoDia;
    }
    public function setIdCurso($idCurso){
        $this->idCurso = $idCurso;
    }
}
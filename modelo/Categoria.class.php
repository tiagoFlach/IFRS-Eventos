<?php
class Categoria{
    use DTO; //Usar a trait que implementa o metodo de inserção
    private $id;
    private $nome;
    private $valorInscricaoDia;
    private $idEvento;
    
    public function __construct() {
    }
    
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getValorInscricaoDia(){
        return $this->valorInscricaoDia;
    }
    public function setValorInscricaoDia($valorInscricaoDia){
        $this->valorInscricaoDia = $valorInscricaoDia;
    }
    public function getIdEvento(){
        return $this->idEvento;
    }
    public function setIdEvento($idEvento){
        $this->idEvento = $idEvento;
    }
}
<?php
class Inscricao{
    use DTO; //Usar a trait que implementa o metodo de inserção
    private $id;
    private $idEvento;
    private $idUsuario;
    private $idCategoria;
    private $data;
    private $valor;
    private $valorTotal;

    public function __construct() {
    }
    
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getIdEvento(){
        return $this->idEvento;
    }
    public function setIdEvento($idEvento){
        $this->idEvento = $idEvento;
    }
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    public function getIdCategoria(){
        return $this->idCategoria;
    }
    public function setIdCategoria($idCategoria){
        $this->idCategoria = $idCategoria;
    }
    public function getData(){
        return $this->data;
    }
    public function setData($data){
        $this->data = $data;
    }
    public function getValor(){
        return $this->valor;
    }
    public function setValor($valor){
        $this->valor = $valor;
    }
    public function getValorTotal(){
        return $this->valorTotal;
    }
    public function setValorTotal($valorTotal){
        $this->valorTotal = $valorTotal;
    }
}
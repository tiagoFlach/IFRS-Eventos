<?php
class Data{
    use DTO; //Usar a trait que implementa o metodo de inserção
    private $data;
    private $valor;
    private $idCategoria;
    
    public function __construct() {
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
    public function getIdCategoria(){
        return $this->idCategoria;
    }
    public function setIdCategoria($idCategoria){
        $this->idCategoria = $idCategoria;
    }
}
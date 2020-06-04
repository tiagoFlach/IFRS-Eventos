<?php
class Curso{
    use DTO; //Usar a trait que implementa o metodo de inserção
    private $nome;
    private $valor;
    private $local;
    private $dataInicio;
    private $dataFim;
    private $idEvento;
    
    public function __construct() {
    }
    
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getValor(){
        return $this->valor;
    }
    public function setValor($valor){
        $this->valor = $valor;
    }
    public function getLocal(){
        return $this->local;
    }
    public function setLocal($local){
        $this->local = $local;
    }
    public function getDataInicio(){
        return $this->dataInicio;
    }
    public function setDataInicio($dataInicio){
        $this->dataInicio = $dataInicio;
    }
    public function getDataFim(){
        return $this->dataFim;
    }
    public function setDataFim($dataFim){
        $this->dataFim = $dataFim;
    }
    public function getIdEvento(){
        return $this->idEvento;
    }
    public function setIdEvento($idEvento){
        $this->idEvento = $idEvento;
    }
}
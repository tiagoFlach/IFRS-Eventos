<?php
class Evento{
    use DTO; //Usar a trait que implementa o metodo de inserção
    private $id;
    private $nome;
    private $descricao;
    private $dataInicio;
    private $dataFim;
    private $horaInicio;
    private $local;
    private $valorInscricao;

    public function __construct() {
    }
    
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getDescricao() {
        return $this->descricao;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    public function getDataInicio(){
        return $this->dataInicio;
    }
    public function setDataInicio($dataInicio){
        $data = implode("-",array_reverse(explode("/", $dataInicio)));
        $this->dataInicio = $data;
    }
    public function getDataFim(){
        return $this->dataFim;
    }
    public function setDataFim($dataFim){
        $data = implode("-",array_reverse(explode("/", $dataFim)));
        $this->dataFim = $data;
    }
    public function getHoraInicio(){
        return $this->horaInicio;
    }
    public function setHoraInicio($horaInicio){
        $this->horaInicio = $horaInicio;
    }
    public function getLocal(){
        return $this->local;
    }
    public function setLocal($local){
        $this->local = $local;
    }
    public function getValorInscricao(){
        return $this->valorInscricao;
    }
    public function setValorInscricao($valorInscricao){
        $this->valorInscricao = $valorInscricao;
    }
}
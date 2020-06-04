<?php
class Dia{
    use DTO; //Usar a trait que implementa o metodo de inserção
    private $data;
    private $horaInicio;
    private $horaFim;
    private $idCurso;

    public function getData(){
        return $this->data;
    }
    public function setData($data){
        $this->data = $data;
    }
    public function getHoraInicio(){
        return $this->horaInicio;
    }
    public function setHoraInicio($horaInicio){
        $this->horaInicio = $horaInicio;
    }
    public function getHoraFim(){
        return $this->horaFim;
    }
    public function setHoraFim($horaFim){
        $this->horaFim = $horaFim;
    }
    public function getIdCurso(){
        return $this->idCurso;
    }
    public function setIdCurso($idCurso){
        $this->idCurso = $idCurso;
    }
}
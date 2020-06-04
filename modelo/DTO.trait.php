<?php
    trait DTO{
        public function getArrayDados(){
            $dados = array();
            foreach($this as $atributo => $valor){
                $dados[$atributo] = $valor;
            }
            return $dados;
        }
    }
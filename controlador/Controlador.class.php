<?php

/**
 * Description of Controlador
 *
 * @author marcio.bigolin
 */

require_once 'visualizador/Visualizador.class.php';

class Controlador {
    protected $visualizador;
    
    public function __construct() {
        $this->visualizador = new Visualizador();
        $this->modelo = new Modelo(true);
    }
    
    public function redirecionar($endereco){
        header('location:'.$endereco);
    }
 
    public function gravarLog($mensagem){
        $data = date('d-m-y H-i-s');
        file_put_contents('logs/'.$data.'.txt', $mensagem, FILE_APPEND);
    }
    
    public function mensagemErro($mensagem){
        $this->gravarLog($mensagem);
    }

    public function index(){
        $this->redirecionar('?controle=evento&acao=mostrarEventos');
    } 
}
?>
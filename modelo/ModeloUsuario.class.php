<?php
require_once 'modelo/Modelo.class.php';
/**
 * Description of ModeloJogador
 *
 * @author marcio.bigolin
 */
class ModeloUsuario extends Modelo{

    public function salvar(Usuario $usuario){
        return $this->inserir('usuarios', $usuario);
    }   
    public function excluir($usuario){
        $condicao = 'id = '.$usuario;
        return $this->deletar('usuario', $usuario);
    }  
}
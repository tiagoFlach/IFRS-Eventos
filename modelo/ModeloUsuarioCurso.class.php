<?php
require_once 'modelo/Modelo.class.php';
/**
 * Description of ModeloJogador
 *
 * @author marcio.bigolin
 */
class ModeloUsuarioCurso extends Modelo{

    public function salvar(UsuarioCurso $usuarioCurso){
        return $this->inserir('usuario_curso', $usuarioCurso);
    }   
    public function excluir($usuarioCurso){
        $condicao = 'id = '.$usuario_curso;
        return $this->deletar('usuario_curso', $usuarioCurso);
    }  
}
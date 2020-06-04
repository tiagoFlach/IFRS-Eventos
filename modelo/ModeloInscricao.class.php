<?php
require_once 'modelo/Modelo.class.php';
/**
 * Description of ModeloJogador
 *
 * @author marcio.bigolin
 */
class ModeloInscricao extends Modelo{


	public function checaExisteUsuario($cpf){
		$tabela = 'usuarios users';
		$campos = 'users.cpf';
		$condicao = 'ins.idEvento = 1 and users.cpf = "'. $cpf.'"';
		$join = 'inner join inscricoes ins on ins.idUsuario = users.id';

		$buscaUsuarioEvento = $this->consultar($tabela, $campos, $condicao, $join);
		return $buscaUsuarioEvento;
	}

    public function salvar(Inscricao $inscricao){
        return $this->inserir('inscricoes', $inscricao);
    }   
    public function excluir($inscricao){
        $condicao = 'id = '.$inscricao;
        return $this->deletar('inscricoes', $condicao);
    }  
}
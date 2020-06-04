<?php
require_once 'modelo/Modelo.class.php';
/**
 * Description of ModeloJogador
 *
 * @author marcio.bigolin
 */
class ModeloEvento extends Modelo{

	public function eventos(){
        $buscaEventos = $this->consultar('eventos', '*');
        $eventos = $this->criaObjeto($buscaEventos);
        return $eventos;    
    } 

    public function proximos(){
        $buscaProximos = $this->consultar('eventos', '*', 'dataInicio >= "'. date('Y-m-d').'"');
        $proximos = $this->criaObjeto($buscaProximos);
        return $proximos;
    }

    public function anteriores(){
        $buscaAnteriores = $this->consultar('eventos', '*', 'dataInicio < "'. date('Y-m-d').'"');
        $anteriores = $this->criaObjeto($buscaAnteriores);
        return $anteriores;
    }

    public function eventoPorId($id){
        $evento = new Evento();
        foreach($this->consultar('eventos', '*', 'id = '.$id) as $linha){
			$evento->setId($linha['id']);
			$evento->setNome($linha['nome']);
			$evento->setDescricao($linha['descricao']);
			$evento->setDataInicio($linha['dataInicio']);
			$evento->setDataFim($linha['dataFim']);
			$evento->setHoraInicio($linha['horaInicio']);
			$evento->setLocal($linha['local']);
            if($linha['valorInscricao'] != null){
                $evento->setValorInscricao($linha['valorInscricao']);
            }
        }
        return $evento;
    }

    public function eventoBuscarFim(){
        $desBusca = htmlspecialchars($_POST['busca']);
        $sql = 'SELECT * FROM eventos WHERE nome LIKE "%'.$desBusca.'%" OR descricao LIKE "%'.$desBusca.'%"';
        return $this->query($sql);
    }

    public function salvar(Evento $evento){
        return $this->inserir('eventos', $evento);
    } 

    public function excluir($id){
        $condicao = 'id = '.$id;
        return $this->deletar('eventos', $condicao);
    } 

    public function ultimoEvento(){
        $ultimo = $this->consultar('eventos', 'id', false, false, 'id asc');
        if($ultimo){
            foreach($ultimo as $key => $value){
                $idEvento = $value['id']; 
            }
        } else {
            $idEvento = 1;
        }
        return $idEvento;
    }

    public function criaObjeto($consulta){
        $array = array();
        foreach ($consulta as $key => $value){
            $evento = new Evento;
            $evento->setId($value['id']);
            $evento->setNome($value['nome']);
            $evento->setDescricao($value['descricao']);
            $evento->setDataInicio($value['dataInicio']);
            $evento->setDataFim($value['dataFim']);
            $evento->setHoraInicio($value['horaInicio']);
            $evento->setLocal($value['local']);
            if($value['valorInscricao'] != null){
                $evento->setValorInscricao($value['valorInscricao']);
            }
            $array[] = $evento;
        }
        return $array;
    }

    public function atualizarEvento(){
        $x = 'x';
        $x = 'x';
    }
}
?>
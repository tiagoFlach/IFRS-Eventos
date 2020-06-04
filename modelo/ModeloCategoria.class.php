<?php
require_once 'modelo/Modelo.class.php';
/**
 * Description of ModeloJogador
 *
 * @author marcio.bigolin
 */
class ModeloCategoria extends Modelo{

	public function categoriaPorId($id){
        $categoria = new Categoria();
        foreach($this->consultar('categorias', '*', 'idEvento='.$id) as $linha){
			$categoria->setId($linha['id']);
			$categoria->setNome($linha['nome']);
			$categoria->setDescricao($linha['descricao']);
			$categoria->setDataInicio($linha['dataInicio']);
			$categoria->setDataFim($linha['dataFim']);
			$categoria->setHoraInicio($linha['horaInicio']);
			$categoria->setLocal($linha['local']);
        }
        return $categoria;
    }

    public function salvar(Comentario $comentario){
        return $this->inserir('comentario', $comentario);
    }   
    public function excluir($comentario){
        $condicao = 'id = '.$comentario;
        return $this->deletar('comentario', $condicao);
    } 

        public function consultarCategorias(){
        $buscaCategorias = $this->consultar('categorias', '*', 'idEvento = '.$_GET['id']);
        $categorias = array();
        foreach ($buscaCategorias as $key => $value) {
            $categoria = new Categoria;
            $categoria->setId($value['id']);
            $categoria->setNome($value['nome']);
            $categoria->setValorInscricaoDia($value['valorInscricaoDia']);
            $categoria->setIdEvento($value['idEvento']);
            $categorias[] = $categoria;
        }
        return $categorias;
    }

    public function consultarCategoriaDataValor(){
        $tabela = 'categoria_data_valor cdv';
        $campos = 'cdv.id, cdv.data, cdv.valor, cdv.idCategoria';
        $condicao = 'cdv.idCategoria = cat.id and cat.idEvento = '.$_GET['id'];
        $join = 'inner join categorias cat';
        $ordenacao = 'cdv.idCategoria, cdv.data';

        $bucaCategoria_d_v = $this->consultar($tabela, $campos, $condicao, $join, $ordenacao);
        $categoria_d_v = array();
        foreach ($bucaCategoria_d_v as $key => $value) {
            $categoria = new CategoriaDataValor;
            $categoria->setId($value['id']);
            $categoria->setData($value['data']);
            $categoria->setValor($value['valor']);
            $categoria->setIdCategoria($value['idCategoria']);
            $categoria_d_v[] = $categoria;
        }
        return $categoria_d_v;
    } 
}
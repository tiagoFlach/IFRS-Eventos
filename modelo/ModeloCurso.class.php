<?php
require_once 'modelo/Modelo.class.php';
/**
 * Description of ModeloJogador
 *
 * @author marcio.bigolin
 */
class ModeloCurso extends Modelo{

	public function cursoPorId($id){
        $curso = new curso();
        foreach($this->consultar('cursos', '*', false, 'id='.$id) as $linha){
			$curso->setId($linha['id']);
			$curso->setNome($linha['nome']);
			$curso->setDataInicio($linha['dataInicio']);
			$curso->setDataFim($linha['dataFim']);
			$curso->setLocal($linha['local']);
        }
        return $curso;
    }

    public function salvar(Comentario $comentario){
        return $this->inserir('comentario', $comentario);
    }   
    public function excluir($id){
        $condicao = 'id = '.$id;
        return $this->deletar('eventos', $condicao);
    } 

    public function consultarCursos(){
        $buscaCursos = $this->consultar('cursos', '*', 'idEvento = '. $_GET['id']);
        $cursos = array();
        foreach ($buscaCursos as $key => $value) {
            $curso = new Curso;
            $curso->setNome($value['nome']);
            $curso->setValor($value['valor']);
            $curso->setLocal($value['local']);
            $curso->setDataInicio($value['dataInicio']);
            $curso->setDataFim($value['dataFim']);
            $curso->setidEvento($value['idEvento']);
            $cursos[] = $curso;
        }
        return $cursos;
    }
    public function consultarCursoDiaHora(){
        $tabela = 'curso_dia_hora cdh';
        $campos = '*';
        $condicao = 'cdh.idCurso = c.id and c.idEvento = '.$_GET['id'];
        $join = 'inner join cursos c';

        $buscaCurso_d_h = $this->consultar($tabela, $campos, $condicao, $join);       
        $curso_d_h = array();
        foreach ($buscaCurso_d_h as $key => $value) {
            $cursoDiaHora = new CursoDiaHora();
            $cursoDiaHora->setId($value['id']);
            $cursoDiaHora->setData($value['data']);
            $cursoDiaHora->setHoraInicio($value['horaInicio']);
            $cursoDiaHora->setHoraFim($value['horaFim']);
            $cursoDiaHora->setIdCurso($value['idCurso']);
            $curso_d_h[] = $cursoDiaHora;
        }
        return $curso_d_h;
    } 
}
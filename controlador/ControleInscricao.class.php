<?php
/**
 * Description of ControleInscricao
 *
 * @author Tiago Flach
 */

class ControleInscricao extends Controlador{
    
    public function __construct(){
        parent::__construct();
        $this->modelo = new ModeloInscricao(true);
        $this->modeloUsuarioCurso = new modeloUsuarioCurso(true);
        $this->controleUsuario = new ControleUsuario(true);
        $this->controleEvento = new ControleEvento(true);
    }

    public function inscrever(){

        $valorTotal = 0;

        $buscaUsuarioEvento = $this->modelo->checaExisteUsuario($_POST['cpf']);

        if($buscaUsuarioEvento){
            $this->visualizador->setFlash('danger_Usuário já cadastrado neste evento!');
            $this->redirecionar('?controle=evento&acao=verEvento&id='.$_GET['id']);
            break;
        }

        if(isset($_POST['lembrar'])){
            $lembrar = 'on';
        } else {
            $lembrar = 'off';
        }

        $usuario = $this->controleUsuario->criar($lembrar);
        $buscaEvento = $this->modelo->consultar('eventos', 'id, dataInicio, valorInscricao', 'id = '.$_GET['id']);
        $buscaCategorias = $this->modelo->consultar('categorias', 'id, valorInscricaoDia', 'idEvento = '.$_GET['id']);


        // Método que determina o valor da inscrição de uma categoria para determinado dia
        if($buscaCategorias){
            if(isset($_POST['categoria'])){
                $condicao = 'idEvento = '.$_GET['id'].' and nome = "'.$_POST['categoria'].'"';
                $buscaCategoria = $this->modelo->consultar('categorias', 'id, valorInscricaoDia', $condicao);
                $idCategoria = $buscaCategoria[0]['id'];

                $buscaCategoria_d_v = $this->modelo->consultar('categoria_data_valor cdv', 'cdv.id, cdv.data, cdv.valor, cdv.idCategoria', 'cdv.idCategoria = cat.id and cat.idEvento = '.$_GET['id'].' and cat.id = '.$buscaCategoria[0]['id'], 'inner join categorias cat', 'data');
                
                $dia = strtotime(date('Y-m-d'));
                if($dia >= strtotime($buscaEvento[0]['dataInicio'])){
                    $valorDia = $buscaCategoria[0]['valorInscricaoDia'];
                } else {
                    foreach($buscaCategoria_d_v as $key => $value){
                        if($dia <= strtotime($value['data'])){
                            $valorDia = $value['valor']; 
                            break;
                        }
                    }
                }
            } else {
                $this->visualizador->setFlash('danger_Preencha todos os campos!');
                $this->redirecionar('?controle=evento&acao=verEvento&id='.$_GET['id']);
                return;
            }
        } else {
            foreach ($buscaEvento as $key => $value) {
                $valorDia = $value['valorInscricao'];
            }
        }

        // DESATIVADO
        // Método que verifica se os horários dos cursos desejados não colidem
        // if(isset($_POST['cursos'])) { 
        //     $valorCursos = 0;
        //     $cursos = array();
        //     $condicao = 'idEvento = '.$_GET['id'].' and ';
            
        //     foreach($_POST['cursos'] as $curso) { 
        //         $cursos[] = $curso; 
        //     } 
        //     for($i=0;$i<count($cursos);$i++){
        //         if($i == count($cursos)-1){
        //             $condicao .= 'nome = "'.$cursos[$i].'"';
        //         } else {
        //             $condicao .= 'nome = "'.$cursos[$i].'" or ';
        //         }
        //     }

        //     // SELECT cdh.id, cdh.idCurso, c.nome, cdh.data, cdh.horaInicio, cdh.horaFim, c.local from curso_dia_hora cdh inner join cursos c on cdh.idCurso = c.id where c.idEvento = 1 and c.nome = "Curso" or c.nome = "Informática"
        //     $buscaCurso_d_h = $this->modelo->consultar('curso_dia_hora cdh', 'cdh.id, cdh.idCurso, c.nome, cdh.data, cdh.horaInicio, cdh.horaFim, c.local', $condicao, 'inner join cursos c on cdh.idCurso = c.id');

        //     $cronograma = array();
        //     foreach ($buscaCurso_d_h as $key => $value) {
        //         $data = $value['data'];
        //         $horaInicio = $value['horaInicio'];
        //         $horaFim = $value['horaFim'];

        //         if(isset($cronograma[$data])){
        //             $i = 0;
        //             $x = count($cronograma[$data]);

        //             while($i < $x){

        //                 if($horaInicio < $cronograma[$data][$i] and $horaFim <= $cronograma[$data][$i] or $horaInicio >= $cronograma[$data][$i + 1] and $horaFim > $cronograma[$data][$i + 1]){
        //                     $cronograma[$data][] = $horaInicio;
        //                     $cronograma[$data][] = $horaFim;
        //                 } else {
        //                     $this->visualizador->addJSAlt('alert("Horários dos cursos não conferem!");');
        //                     return $this->controleEvento->verEvento();

        //                     var_dump('datas não conferem!');
        //                 } 
        //                 $i += 2;
        //             }
        //         } else {
        //             $cronograma[$data] = array($horaInicio, $horaFim);
        //         }
        //     }
            
        //     $buscaCursos = $this->modelo->consultar('cursos', 'id, nome, valor', $condicao);
        //     foreach ($buscaCursos as $key => $value) {
        //         if($value['valor']){
        //             $valorCursos += $value['valor'];
        //         }
        //         $usuarioCurso = new UsuarioCurso();
        //         $usuarioCurso->setIdUsuario($usuario->getId()); 
        //         $usuarioCurso->setIdCurso($value['id']); 
        //         $this->modeloUsuarioCurso->salvar($usuarioCurso);
        //     }
            
        // } else { 
        // }

        if(isset($_POST['cursos'])) {
            $valorCursos = 0;
            $cursos = array();
            $condicao = 'idEvento = '.$_GET['id'].' and ';
            
            foreach($_POST['cursos'] as $curso) { 
                $cursos[] = $curso; 
            } 
            for($i=0;$i<count($cursos);$i++){
                if($i == count($cursos)-1){
                    $condicao .= 'nome = "'.$cursos[$i].'"';
                } else {
                    $condicao .= 'nome = "'.$cursos[$i].'" or ';
                }
            }
            $buscaCursos = $this->modelo->consultar('cursos', 'id, nome, valor', $condicao);
            foreach ($buscaCursos as $key => $value) {
                if($value['valor']){
                    $valorCursos += $value['valor'];
                }
                $usuarioCurso = new UsuarioCurso();
                $usuarioCurso->setIdUsuario($usuario->getId()); 
                $usuarioCurso->setIdCurso($value['id']); 
                $this->modeloUsuarioCurso->salvar($usuarioCurso);
            }
        } else {
            $valorCursos = 0;
        }

        $valorTotal = $valorCursos + $valorDia;

        $inscricao = new Inscricao();
        $inscricao->setIdEvento($_GET['id']);
        $inscricao->setIdUsuario($usuario->getId());
        if(isset($idCategoria)){        
            $inscricao->setIdCategoria($idCategoria);
        }
        $inscricao->setData(date('Y-m-d/H:i:s'));
        if($valorDia != false){
            $inscricao->setValor($valorDia);
        }
        $inscricao->setValorTotal($valorTotal);

        $this->modelo->salvar($inscricao);
        $this->visualizador->setFlash('success_Inscrição feita com sucesso!');
        $this->redirecionar('?controle=evento&acao=verEvento&id='.$_GET['id']);
    }

    public function verInscritos($idEvento){

        // select inscricoes.id, usuarios.nome, usuarios.cpf from inscricoes inner join usuarios on inscricoes.idUsuario = usuarios.id where inscricoes.idEvento = 1;
        $buscaInscritos = $this->modelo->consultar('inscricoes ins', 'ins.id, users.nome, users.cpf, users.endereco, users.cidade, users.uf, users.cidade, users.telefone, users.celular, users.empresa, users.email', 'where inscricoes.idEvento = '. $idEvento, 'inner join usuarios on inscricoes.idUsuario = usuarios.id');

        var_dump($buscaInscritos);
    }
}
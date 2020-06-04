<?php
/**
 * Description of ControleEvento
 *
 * @author Tiago Flach
 */

class ControleEvento extends Controlador{
    
    public function __construct(){
        parent::__construct();
        $this->modelo = new ModeloEvento(true);
    }
	
	public function limita_caracteres($texto, $limite, $quebra = true) {
		$tamanho = strlen($texto);
		
		// Verifica se o tamanho do texto é menor ou igual ao limite
		if ($tamanho <= $limite) {
			$novo_texto = $texto;
			// Se o tamanho do texto for maior que o limite
		} else {
			// Verifica a opção de quebrar o texto
			if ($quebra == true) {
				$novo_texto = trim(substr($texto, 0, $limite)).'...';
			// Se não, corta $texto na última palavra antes do limite
			} else {
				// Localiza o útlimo espaço antes de $limite
				$ultimo_espaco = strrpos(substr($texto, 0, $limite), ' ');
				// Corta o $texto até a posição localizada
				$novo_texto = trim(substr($texto, 0, $ultimo_espaco)).'...';
			}
		}
		// Retorna o valor formatado
		return $novo_texto;
	}
	
    public function mostrarEventos(){
        $buscaEventos = $this->modelo->eventos();       

		//Editar descrição de eventos
        foreach ($buscaEventos as $key => $value) {           
            $descricao = $this->limita_caracteres($value->getDescricao(), 497);
            $value->setDescricao($descricao);
        }

		$this->visualizador->atribuiValor('buscaEventos', $buscaEventos);
        $this->visualizador->setTitulo('Eventos');
        $this->visualizador->mostrarNaTela('home');
    }

    public function proximos(){
        $buscaProximos = $this->modelo->proximos();

        //Editar descrição de eventos
        foreach ($buscaProximos as $key => $value) {           
            $descricao = $this->limita_caracteres($value->getDescricao(), 497);
            $value->setDescricao($descricao);
        }

        $this->visualizador->atribuiValor('local', 'proximos');
        $this->visualizador->atribuiValor('buscaEventos', $buscaProximos);
        $this->visualizador->setTitulo('Próximos Eventos');
        $this->visualizador->mostrarNaTela('home');
    }

    public function anteriores(){
        $buscaAnteriores = $this->modelo->anteriores();
        
        //Editar descrição de eventos
        foreach ($buscaAnteriores as $key => $value) { 
           $descricao = $this->limita_caracteres($value->getDescricao(), 497);
            $value->setDescricao($descricao);
        }

        $this->visualizador->atribuiValor('local', 'anteriores');
        $this->visualizador->atribuiValor('buscaEventos', $buscaAnteriores);
        $this->visualizador->setTitulo('Eventos Anteriores');
        $this->visualizador->mostrarNaTela('home');
    }

    public function buscarFim(){
        if(!isset($_POST['busca'])){
            $this->visualizador->setFlash('error_Digite algum termo para buscar.');
            $this->index();
            return;
        } else {
            $modEvento = new ModeloEvento();
            $arrEventos = $modEvento->eventoBuscarFim();
            for($i = 0; $i < count($arrEventos); $i++){
                $arrEventos[$i]['descricao'] = $this->limita_caracteres($arrEventos[$i]['descricao'], 497);
            }
            $this->visualizador->atribuiValor('modEvento', $modEvento);
            $this->visualizador->atribuiValor('arrEventos', $arrEventos);
            $this->visualizador->mostrarNaTela('busca');
        }
    }
    
    public function criar(){
        $this->visualizador->addJS('criarEvento.js');
        $this->visualizador->atribuiValor('local', 'criarEvento');
        $this->visualizador->setTitulo('Criar Evento');
        $this->visualizador->mostrarNaTela('criarEvento');    
    }

    public function criarEvento(){


        var_dump($_POST);
        

        
        $proxEvento = $this->modelo->consultar('eventos', 'id', false, false, 'id asc');
        $proxCurso = $this->modelo->consultar('cursos', 'id', false, false, 'id asc');
        $proxCategoria = $this->modelo->consultar('categorias', 'id', false, false, 'id asc');        
        
        if($proxEvento){
            foreach($proxEvento as $key => $value){
                $idEvento = $value['id'] + 1; 
            }
        } else {
            $idEvento = 1;
        }
        if($proxCurso){
            foreach($proxCurso as $key => $value){
                $idCurso = $value['id'] + 1; 
            }
        } else {
            $idCurso = 1;
        }
        if($proxCategoria){
            foreach($proxCategoria as $key => $value){
                $idCategoria = $value['id'] + 1;   
            }
        } else {
            $idCategoria = 1;
        } 

        foreach ($_POST as $key => $value) {
            for($i = 1; $i < count($_POST); $i ++){
                
                // Curso

                // $x = 'curso'.$i;
                // if($key == $x && $value == true){

                //     $hora = 'horaCurso'. $i;
                //     $local = 'localCurso'. $i;
                //     $valor = 'valorCurso'. $i;
                //     $diaInicio = 'diaInicio'. $i;
                //     $diaFim = 'diaFim'. $i;

                //     $j = $_POST[$diaInicio];
                //     for($p = 1;$p < count($_POST); $p ++){
                //         $t = 'horaInicio'.$i.$p;
                //         $f = 'horaFim'.$i.$p;
                //         if(isset($_POST[$t])){
                //             $dia = new Dia();
                //             $dia->setData($j);
                //             $dia->setHoraInicio($_POST[$t]);
                //             $dia->setHoraFim($_POST[$f]);
                //             $dia->setIdCurso($idCurso);

                //             $j++;
                           
                //             $this->modelo->inserir('curso_dia_hora', $dia);
                //         } 
                //     }

                //     $curso = new Curso();
                //     $curso->setNome($value);
                //     $curso->setLocal($_POST[$local]);
                //     $curso->setValor($_POST[$valor]);
                //     $curso->setDataInicio($_POST[$diaInicio]);
                //     $curso->setDataFim($_POST[$diaFim]);
                //     $curso->setIdEvento($idEvento);

                    
                //     $this->modelo->inserir('cursos', $curso);
                // }



                // Categoria

                $x = 'categoria'.$i;
                if($key == $x && $value == true){
                    
                    
                    $dia = 'valorInscricao'. $i. 'Dia';
                    $valor = 'valorInscricao'. $i;


                    $categoria = new Categoria();
                    $categoria->setId($idCategoria);
                    $categoria->setNome($_POST[$x]);

                    if($key == $dia && $value == true){
                        $categoria->setValorInscricaoDia($_POST[$dia]);
                    } else {
                        $categoria->setValorInscricaoDia($_POST[$valor]);
                    }


                    for($y = 0; $y < count($_POST); $y++){
                        
                        $data = 'dataInscricao:'. $i. ','. $y;
                        $valor = 'valorInscricao:'. $i. ','. $y;

                        $dataValor = new Data();
                        $dataValor->setIdCategoria($categoria->getId());

                        if(isset($_POST[$data]) && $_POST[$data] == true && $_POST[$valor] == true){                           
                            $dataValor->setData($_POST[$data]);
                            $dataValor->setValor($_POST[$valor]);
                        }else{
                            break;
                        } 
                        
                        $this->modelo->inserir('categoria_data_valor', $dataValor);
                    }
                    $idCategoria++;
                    $categoria->setIdEvento($idEvento); 
                    
                    $this->modelo->inserir('categorias', $categoria);
                }
            }
        }
        
        $evento = new Evento;
        $evento->setId($idEvento);        
        $evento->setNome($_POST['nome']);
        $evento->setDescricao($_POST['descricao']);
        $evento->setDataInicio($_POST['dataInicio']);
        $evento->setDataFim($_POST['dataFim']);
        $evento->setHoraInicio($_POST['hora']);
        $evento->setLocal($_POST['local']);
        $evento->setValorInscricao($_POST['valorInscricao']);

        $this->modelo->salvar($evento);

        $idEvento = $this->modelo->ultimoEvento();

        $this->visualizador->setFlash('success_Evento cadastrado com sucesso!');
        $this->redirecionar('?controle=evento&acao=verEvento&id='.$idEvento);      
    }

    public function verEvento(){
        #Evento
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }

        $this->modeloCategoria = new ModeloCategoria();
        $this->modeloCurso = new ModeloCurso();

        $evento = $this->modelo->eventoPorId($id);
        $buscaCategorias = $this->modeloCategoria->consultarCategorias();
        $buscaCategoria_d_v = $this->modeloCategoria->consultarCategoriaDataValor();       
        $buscaCursos = $this->modeloCurso->consultarCursos();
        $buscaCurso_d_h = $this->modeloCurso->consultarCursoDiaHora();       

        #Categorias
        if($buscaCategorias){
            $this->visualizador->atribuiValor('buscaCategorias', $buscaCategorias);
            $this->visualizador->atribuiValor('buscaCategoria_d_v', $buscaCategoria_d_v);
        }

        #Cursos
        if($buscaCursos){
            $this->visualizador->atribuiValor('buscaCursos', $buscaCursos);          
        }
        
        if($buscaCursos && $buscaCurso_d_h){            
            $this->visualizador->atribuiValor('buscaCurso_d_h', $buscaCurso_d_h);
        }
 
        // $this->inscricao($buscaCategorias, $buscaCursos, $buscaCategoria_d_v, $evento);
        $this->verInscritos();


        $this->visualizador->atribuiValor('evento', $evento);
        $this->visualizador->addJS('verEvento.js');
        $this->visualizador->setTitulo('Evento');
        $this->visualizador->mostrarNaTela('evento');
    }
    

    public function editar(){
        $evento = $this->modelo->eventoPorId($_GET['id']);
        $this->visualizador->atribuiValor('evento', $evento);
        $this->visualizador->mostrarNaTela('editarEvento');
    }

    public function editarEvento(){
        $evento = new Evento;
        $evento->setNome($_POST['nome']);
        $evento->setDescricao($_POST['descricao']);
        $evento->setData($_POST['data']);
        $evento->setHora($_POST['hora']);
        $evento->setLocal($_POST['local']);

        $condicao = 'id = '. $_GET['id'];
        $consulta = $this->modelo->atualizar('eventos', $evento, $condicao);

        $this->verEvento();
    }
    
    public function verInscritos(){

        $idEvento = $_GET['id'];

        // select inscricoes.id, usuarios.nome, usuarios.cpf from inscricoes inner join usuarios on inscricoes.idUsuario = usuarios.id where inscricoes.idEvento = 1;
        $buscaInscritos = $this->modelo->consultar('inscricoes ins', 'ins.id, users.nome, users.cpf, users.endereco, users.cidade, users.uf, users.cidade, users.telefone, users.celular, users.empresa, users.email', 'ins.idEvento = '. $idEvento, 'inner join usuarios users on ins.idUsuario = users.id', 'users.nome');

        $this->visualizador->atribuiValor('buscaInscritos', $buscaInscritos);    
    }

    public function excluir(){
        $id = $_GET['id'];
        $this->modelo->excluir($id);
        $this->visualizador->setFlash('danger_Evento excluido com sucesso!');
        $this->redirecionar('?controle=evento&acao=mostrarEventos');
    }
}
?>
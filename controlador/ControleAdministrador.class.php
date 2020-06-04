<?php
/**
 * Description of ControleJogador
 *
 * @author Tiago Flach
 */
class ControleAdministrador extends Controlador{
    
    public function __construct(){
        parent::__construct();
        $this->modelo = new ModeloAdministrador(true);
    }

    /**
     * Método responsável por mostra a página de login ao administrador
     *
     * @param $inicio - booleano para indicar se deve redirecionar para o inicio
     *
    **/
    public function login($inicio = false){
        if($inicio){
            if(isset($_SESSION['idAdministrador'])){
                if($_SESSION['idAdministrador'] != null){
                    $this->consultarFim();
                    return;
                }
            }
        }
        $this->visualizador->mostrarNaTela('login'); 
    }

    /**
     * Método responsável por receber os dados do login informados
     * pelo administrador e enviar para a classe Modelo. 
     * Retorna e checa se o administrador deve ser logado ou não.
     *
    */
    public function loginFim(){
        $modAdministrador = new ModeloAdministrador();

        if($modAdministrador->loginFim()){
            $this->consultarFim();
            return;
        } else {
            $mensagem = 'Usuario ou senha incorretos!';
            $this->mensagemErro($mensagem);
            $this->visualizador->atribuiValor('mensagem', $mensagem);
            $this->login();
            return;
        }
    }
    public function consultarFim($id = 0){
        if($id == 0){
            if(isset($_SESSION['idAdministrador']))
                $id = $_SESSION['idAdministrador'];
        }
        if($this->modelo->checaExiste('administradores', 'id', $id)){
            if($_SESSION['idAdministrador'] == $id){
                $modAdministrador = new ModeloAdministrador();
                $this->visualizador->atribuiValor('id', $id);
                $this->visualizador->atribuiValor('dtoAdministrador', $modAdministrador->getAdministrador($id));             
                $this->home();
            }else{
                $this->visualizador->setFlash(PERMISSAO);
                $this->index();
            }
        }else{
            $this->visualizador->setFlash(NAO_EXISTE);
            $this->index();
        }
    }

    public function home(){
        $this->redirecionar('?controle=evento&acao=mostrarEventos');    
    }
    public function criarEvento(){
        $this->redirecionar('?controle=evento&acao=criar');
    }

    public function administradores(){
        $buscaAdministradores = $this->modelo->administradores();       
        $this->visualizador->atribuiValor('buscaAdministradores', $buscaAdministradores);
        $this->visualizador->atribuiValor('local', 'administradores');
        $this->visualizador->addJS('administradores.js');
        $this->visualizador->setTitulo('Administradores');
        $this->visualizador->mostrarNaTela('administradores');
    }
    public function adicionar(){
        $this->visualizador->mostrarNaTela('criarAdministrador');
    }
    public function criarAdministrador(){
        
        $proxAdm = $this->modelo->consultar('administradores', 'id', false, false, 'id asc');        
        
        if($proxAdm){
            foreach($proxAdm as $key => $value){
                $idAdm = $value['id'] + 1; 
            }
        } else {
            $idAdm = 1;
        }
        
        $administrador = new Administrador;        
        $administrador->setLogin($_POST['login']);
        $administrador->setSenha($_POST['senha']);

        $this->modelo->salvar($administrador);

        $this->visualizador->setFlash('success_Administrador cadastrado com sucesso!');
        $this->redirecionar('?controle=administrador&acao=administradores'); 
    }
    public function excluir(){
        $id = $_GET['id'];
        $this->modelo->excluir($id);
        $this->visualizador->setFlash('danger_Administrador excluido com sucesso!');
        $this->redirecionar('?controle=administrador&acao=administradores');
    }

    public function logout(){
        session_destroy();
        $this->login();
    }
}
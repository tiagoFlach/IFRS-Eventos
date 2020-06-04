<?php
/**
 * Description of Visualizador
 *
 * @author marcio.bigolin
 */
class Visualizador {
    private $variaveis = array();
    private $css;
    private $js;
    private $modelo;
    
    public function __construct() {
        $this->atribuiValor('titulo', '');
        $this->atribuiValor('css', '');
        $this->atribuiValor('js', '');
        //$this->modelo = new ModeloProduto;
    }

    public function mostrarNaTela($pagina){
        //gera as variáveis para o escopo local
        foreach($this->variaveis as $var =>$valor){
            global $$var;
            $$var = $valor;
        }


        if($pagina == 'login'){
            include('visualizador/login.php');
        } else {
            include('visualizador/cabecalho.php');
            
            if(isset($_SESSION['idAdministrador'])){
                include('visualizador/menuAdministrador.php');
            } else {
                include('visualizador/menu.php');
            }

            if(file_exists('visualizador/'. $pagina. '.php')){
                include ('visualizador/'. $pagina. '.php');
            }else{
                echo '<div class="col-md-9"><h4>Pagina não encontrada!</h4></div>';
            }
            include ('visualizador/rodape.php');
        }  
    }
    
    public function atribuiValor($variavel, $valor){
        $this->variaveis[$variavel] = $valor;
    }
    
    public function setTitulo($titulo){
        $this->atribuiValor('titulo', $titulo);
    }
    
    public function addCSS($arquivoCSS){
        $this->css[] = '<link href="'.$arquivoCSS.'" rel="stylesheet" type="text/css" />';
    }
    
    public function addJS($arquivoJs){
        $this->atribuiValor('js', '<script src="javascript/'.$arquivoJs.'" type="text/javascript"></script>');
    }

    public function addJSAlt($arquivoJS){
        $this->atribuiValor('jsalt', '<script>'.$arquivoJS.'<script>');
    }

    /**
     * Método responsável por setar um flash para visualização
     * na página HTML
     *
     * @param String $mensagem - mensagem a ser mostrada na paǵina
     *
    **/
    public function setFlash($mensagem){
        $_SESSION['flash'] = $mensagem;
    }


    /**
     * Método responsável por recuperar o valor do flash
     *
     * @return String - mensagem contida no flash.
     *
    **/
    public function getFlash(){
        return $_SESSION['flash'];
    }
}

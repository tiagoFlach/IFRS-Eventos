<?php
/**
 * Description of ControleUsuario
 *
 * @author Tiago Flach
 */

class ControleUsuario extends Controlador{
    
    public function __construct(){
        parent::__construct();
        $this->modelo = new ModeloUsuario(true);
        $this->modeloInscricao = new ModeloInscricao(true);      
    }

    public function criar($lembrar){

        $condicao = 'cpf = "'. $_POST['cpf'].'"';
        $buscaUsuario = $this->modelo->consultar('usuarios', 'id', $condicao);

        $usuario = new Usuario();

        if(!($buscaUsuario)){
            
            $proxUsuario = $this->modelo->consultar('usuarios', 'id');

            if($proxUsuario){
                foreach($proxUsuario as $key => $value){
                    $idUsuario = $value['id'] + 1; 
                }
            } else {
                $idUsuario = 1;
            }

            $usuario->setId($idUsuario);
            $usuario->setCpf($_POST['cpf']);
            $usuario->setNome($_POST['nome']);
            $usuario->setEndereco($_POST['endereco']);
            $usuario->setCidade($_POST['cidade']);
            $usuario->setUf($_POST['uf']);
            $usuario->setTelefone($_POST['telefone']);
            $usuario->setCelular($_POST['celular']);
            $usuario->setEmpresa($_POST['empresa']);
            $usuario->setEmail($_POST['email']);

            
            if($lembrar == 'on'){
                setcookie("cpf", $usuario->getCpf());
                setcookie("nome", $usuario->getNome());
                setcookie("endereco", $usuario->getEndereco());
                setcookie("cidade", $usuario->getCidade());
                setcookie("uf", $usuario->getUf());
                setcookie("telefone", $usuario->getTelefone());
                setcookie("celular", $usuario->getCelular());
                setcookie("empresa", $usuario->getEmpresa());
                setcookie("email", $usuario->getemail());
                setcookie("lembrar", $lembrar);
            } else {
                if(isset($_COOKIE["cpf"])) { unset($_COOKIE['cpf']); }
                if(isset($_COOKIE["nome"])){ unset($_COOKIE["nome"]); }
                if(isset($_COOKIE["endereco"])){ unset($_COOKIE["endereco"]); };
                if(isset($_COOKIE["cidade"])){ unset($_COOKIE["cidade"]); }
                if(isset($_COOKIE["uf"])){ unset($_COOKIE["uf"]); }
                if(isset($_COOKIE["telefone"])){ unset($_COOKIE["telefone"]); }
                if(isset($_COOKIE["celular"])){ unset($_COOKIE["celular"]); }
                if(isset($_COOKIE["empresa"])){ unset($_COOKIE["empresa"]); }
                if(isset($_COOKIE["email"])){ unset($_COOKIE["email"]); }
                if(isset($_COOKIE["lembrar"])){ unset($_COOKIE["lembrar"]); }
            }

            break;
            $this->modelo->salvar($usuario);           
        } else {
            $usuario->setId($buscaUsuario[0]['id']);
        }
        return $usuario;
    }
}
?>
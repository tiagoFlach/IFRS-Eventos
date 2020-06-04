<?php
require_once 'modelo/Modelo.class.php';
/**
 * Description of ModeloJogador
 *
 * @author marcio.bigolin
 */
class ModeloAdministrador extends Modelo{

    /**
     * Método utilizado para retornar o objeto DTO
     * do administrador requisitado
     *
     * @param Integer $id - id do administrador
     * @return Object - objeto DTO do administrador
     *
    **/
    public function getAdministrador($id){
        $dtoAdministrador = new DTOAdministrador();
        $condicao = array('id' => $id);
        $arrAdministrador = $this->consultar('administradores', '*', $condicao)[0];
        foreach($dtoAdministrador->getArrayDados() as $nomCampo => $valCampo){
        	$nomFuncao = 'set'.ucfirst($nomCampo);
        	$dtoAdministrador->{$nomFuncao}($arrAdministrador[$nomCampo]);
        }
        return $dtoAdministrador;
    }

    public function salvar(Administrador $administrador){
        return $this->inserir('administradores', $administrador);
    } 

    public function loginFim(){
    	$dtoAdministrador = new DTOAdministrador();
    	$dtoAdministrador->setLogin($_POST['login']);
    	$dtoAdministrador->setSenha($_POST['senha']);

        $condicao = array('login'		=> $dtoAdministrador->getLogin(),
                          'conscond1'	=> 'AND',
                          'senha'		=> $dtoAdministrador->getSenha());

        $consulta = $this->consultar('administradores', '*', $condicao);

        if(count($consulta) == 1){ 
            $dtoAdministrador = $this->getAdministrador($consulta[0]['id']);
            $id = $dtoAdministrador->getId();
            $user = $dtoAdministrador->getLogin();

            $_SESSION['idAdministrador'] = $id;
            $_SESSION['login'] = $dtoAdministrador->getLogin();

            return true;

        }else{
            return false;
        }
    }

    public function administradores(){
        $buscaAdministradores = $this->consultar('administradores', '*');
        $administradores = $this->criaObjeto($buscaAdministradores);
        return $administradores;   
    }

    public function criaObjeto($consulta){
        $array = array();
        foreach ($consulta as $key => $value){
            $administrador = new Administrador;
            $administrador->setId($value['id']);
            $administrador->setLogin($value['login']);
            $administrador->setSenha($value['senha']);
            $array[] = $administrador;
        }
        return $array;
    }
    public function excluir($id){
        $condicao = 'id = '.$id;
        return $this->deletar('administradores', $condicao);
    }  
}
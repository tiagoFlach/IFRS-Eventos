<?php
class Administrador{
    use DTO; //Usar a trait que implementa o metodo de inserção
    private $id;
    private $login;
    private $senha;
    
    public function __construct() {
    }
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getLogin() {
        return $this->login;
    }
    public function setLogin($login) {
        $this->login = $login;
    }
    public function getSenha() {
        return $this->senha;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }
}
?>
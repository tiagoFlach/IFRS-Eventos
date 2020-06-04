<?php

	/**
	 * Classe responsável pelo mantimento de dados de transição com o banco
	 * envolvendo a tabela administrador
	 *
	 * @autor Tiago Lucas Flach - <tiagolucas9830@gmail.com>
	 * @version 1.0.0 - 2015-06-10
	 *
	**/
	class DTOAdministrador{
		use DTO;
		use Validacao;
		use Transformacao;
		private $id;
		private $login;
		private $senha;
		
		/**
		 * Método responsável por setar o valor do código numérico do administrador
		 *
		 * @param Integer $id - código numérico do administrador
		 * @return Boolean - true se sucesso, false se não
		 *
		**/
		public function setId($id){
			if($this->validacaoNumero($id)){
				$this->id = $id;
				return true;
			}
			return false;
		}
		
		/**
		 * Método responsável por retornar o código numérico do administrador
		 *
		 * @return Integer - código numérico do administrador
		 *
		**/
		public function getId(){
			return $this->id;
		}
		
		
		/**
		 * Método responsável por setar o login do administrador
		 *
		 * @param String $login - login do administrador
		 * @return Boolean - true se sucesso, false se não
		 *
		**/
		public function setLogin($login){

			if(trim($login) == ''){
				return false;
			}
			if(!$this->validacaoEspeciais($login)){
				return false;
			}
			$this->login = $login;
			return true;
		}
		
		/**
		 * Método responsável por retornar o e-mail do administrador
		 *
		 * @return String - e-mail do administrador
		 *
		**/
		public function getLogin(){
			return $this->login;
		}
		
		/**
		 * Método responsavel por setar a senha do administrador, utilizando
		 * criptografia blowfish.
		 *
		 * @param String $desSenha - senha do administrador
		 * @return Boolean - true se sucesso, false se não
		 *
		**/
		public function setsenha($senha){
			if(trim($senha) == ''){
				return false;
			}
			if(!$this->validacaoEspeciais($senha)){
				return false;
			}

			$this->senha = $this->transformacaoSenha($senha);
			return true;
		}
		
		/**
		 * Método responsável por retornar a senha do administrador
		 *
		 * @return String - senha do administrador
		 *
		**/
		public function getsenha(){
			return $this->senha;
		}
		
	}
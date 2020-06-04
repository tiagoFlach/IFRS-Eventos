<?php

	/**
	 * Classe responsável pelo mantimento de dados de transição com o banco
	 * envolvendo a tabela de visitas
	 *
	 * @autor Tiago Lucas Flach - <tiagolucas9830@gmail.com>
	 * @version 1.0.0 - 2015-06-12
	 *
	**/
	class DTOVisita{
		use DTO;
		use Validacao;
		use Transformacao;
		private $cdnUsuario;
		private $cdnOferta;
		private $datVisita;

		/**
		 * Método responsável por setar o valor do código numérico do usuário
		 *
		 * @param Integer $cdnUsuario - código numérico do usuário
		 * @return Boolean - true se sucesso, false se não
		 *
		**/
		public function setCdnUsuario($cdnUsuario){
			if($this->validacaoNumero($cdnUsuario)){
				$this->cdnUsuario = $cdnUsuario;
				return true;
			}
			return false;
		}

		/**
		 * Método responsável por retornar o código numérico do usuário
		 *
		 * @return Integer - código numérico do usuário
		 *
		**/
		public function getCdnUsuario(){
			return $this->cdnUsuario;
		}

		/**
		 * Método responsável por setar o código numérico da oferta
		 *
		 * @param Integer $cdnOferta - código numérico da oferta
		 * @return Boolean - true se sucesso, false se não.
		 *
		**/
		public function setCdnOferta($cdnOferta){
			if($this->validacaoNumero($cdnOferta)){
				$this->cdnOferta = $cdnOferta;
				return true;
			}
			return false;
		}

		/**
		 * Método responsável por retornar o código numérico da oferta
		 *
		 * @return Integer - código numérico da oferta
		 *
		**/
		public function getCdnOferta(){
			return $this->cdnOferta;
		}

		/**
		 * Método responsável por setar o valor da data da visita
		 *
		 * @param String $datVisita - data no formato 'YYYY-MM-DD HH:MM:SS'
		 * @return Boolean - true se sucesso, false se não
		 *
		**/
		public function setDatVisita($datVisita){
			$this->datVisita = $datVisita;
			return true;
		}

		/**
		 * Método responsável por retornar a data da visita
		 *
		 * @param Boolean $indTransforma - transformar data para formato 'DD/MM/YYYY HH:MM:SS'
		 * @return String - data da visita no formato 'YYYY-MM-DD HH:MM:SS'
		 *
		**/
		public function getDatVisita($indTransforma = false){
			if(!$indTransforma)
				return $this->datVisita;
			return $this->transformacaoDatetime($this->datVisita);

		}
	}

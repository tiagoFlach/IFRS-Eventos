<?php

	/**
	 * Função responsável por carregar os arquivos automaticamente
	 *
	 * @author Tiago Lucas Flach - <tiagolucas9830@gmail.com>
	 * @param String $classe - nome da classe que está sendo chamada
	 *
	**/
    function autoload($classe) {
        if (file_exists('controlador/' . $classe . '.class.php')) {
            include_once('controlador/' . $classe . '.class.php');
        }
        if (file_exists('modelo/' . $classe . '.class.php')) {
            include_once('modelo/' . $classe . '.class.php');
        }
        if(file_exists('modelo/'.$classe.'.trait.php')){
            include_once('modelo/'.$classe.'.trait.php');
        }
        if(file_exists('modelo/DTO/'.$classe.'.class.php')){
            include_once('modelo/DTO/'.$classe.'.class.php');
        }
        if(file_exists('modelo/DTO/'.$classe.'.trait.php')){
            require_once('modelo/DTO/'.$classe.'.trait.php');
        }
        require_once('visualizador/Visualizador.class.php');
        require_once('modelo/DTO.trait.php');
    }
    spl_autoload_register('autoload');
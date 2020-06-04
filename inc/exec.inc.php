<?php
	
	/**
	 * Arquivo de execução dos métodos
	 *
	**/
    if(!isset($_SESSION['erroPHP'])){
        $_SESSION['erroPHP'] = '';
    }
    if(!isset($_SESSION['flash'])){
        $_SESSION['flash'] = '';   
    }
    if (!(isset($_GET['controle']) || isset($_GET['acao']))){
        $controleget = 'administrador';
        $acaoget = 'login';
    } else {
        $controleget = $_GET['controle'];
        $acaoget = $_GET['acao'];
    }

    $controleNome = 'Controle'.ucfirst($controleget);
    $controle = new $controleNome();
    $controle->{$acaoget}();
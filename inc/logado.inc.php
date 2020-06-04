<?php

	/**
	 * Arquivo responsável pela verificação de login
	 *
	**/
	$logado = false;
	$controle = 'Controle'.ucfirst($this->called);
	eval('$controle = new '.$controle.'();');
	if(isset($_SESSION['cdnUsuario']) || isset($_SESSION['cdnCompanhia']) || isset($_SESSION['cdnAdministrador'])){
		if($_SESSION['cdnUsuario'] != null){
			if($controle->modelo->checaExiste('usuario', 'cdnUsuario', $_SESSION['cdnUsuario']))
				$logado = true;
		}elseif($_SESSION['cdnCompanhia'] != null){
			if($controle->modelo->checaExiste('companhia', 'cdnCompanhia', $_SESSION['cdnCompanhia']))
				$logado = true;
		}elseif($_SESSION['cdnAdministrador'] != null){
			if($controle->modelo->checaExiste('administrador', 'cdnAdministrador', $_SESSION['cdnAdministrador']))
				$logado = true;
		}
	}
	if(!$logado){
		$this->setFlash(LOGIN);
		$controle->index();
		die;
	}

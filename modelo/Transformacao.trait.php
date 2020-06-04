<?php

	trait Transformacao{

		public function transformacaoData($entrada){
			return date('d/m/Y', strtotime($entrada));
		}

		public function transformacaoDatetime($entrada){
			return date('d/m/Y H:i:s', strtotime($entrada));
		}

		public function transformacaoUF($entrada){
			$entrada = strtoupper($entrada);
			$arrUF = array("AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará","DF"=>"Distrito Federal","ES"=>"Espírito Santo","GO"=>"Goiás","MA"=>"Maranhão","MT"=>"Mato Grosso","MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"Pará","PB"=>"Paraíba","PR"=>"Paraná","PE"=>"Pernambuco","PI"=>"Piauí","RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte","RO"=>"Rondônia","RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina","SE"=>"Sergipe","SP"=>"São Paulo","TO"=>"Tocantins");

			return $arrUF($entrada);
		}

		public function transformacaoFile($entrada){
			$entrada = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).])", '', $entrada);
			$entrada = preg_replace("([\.]{2,})", '', $entrada);
			return $entrada;
		}

	    public function transformacaoTiraAcento($entrada, $enc = "UTF-8"){

	        $acentos = array(
	            'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
	            'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
	            'C' => '/&Ccedil;/',
	            'c' => '/&ccedil;/',
	            'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
	            'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
	            'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
	            'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
	            'N' => '/&Ntilde;/',
	            'n' => '/&ntilde;/',
	            'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
	            'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
	            'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
	            'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
	            'Y' => '/&Yacute;/',
	            'y' => '/&yacute;|&yuml;/',
	            'a.' => '/&ordf;/',
	            'o.' => '/&ordm;/'
	        );

	        return preg_replace($acentos,array_keys($acentos),htmlentities($entrada,ENT_NOQUOTES, $enc));
	    }

	    public function transformacaoNomeMes($entrada){
	        switch ($entrada) {
	                case "01":    $entrada = 'Janeiro';     break;
	                case "02":    $entrada = 'Fevereiro';   break;
	                case "03":    $entrada = 'Março';       break;
	                case "04":    $entrada = 'Abril';       break;
	                case "05":    $entrada = 'Maio';        break;
	                case "06":    $entrada = 'Junho';       break;
	                case "07":    $entrada = 'Julho';       break;
	                case "08":    $entrada = 'Agosto';      break;
	                case "09":    $entrada = 'Setembro';    break;
	                case "10":    $entrada = 'Outubro';     break;
	                case "11":    $entrada = 'Novembro';    break;
	                case "12":    $entrada = 'Dezembro';    break;
	         }

	         return $entrada;
	    }

	    public function transformacaoBooleano($entrada){
	    	if($entrada)
	    		return 1;
	    	return false;
	    }

	    public function transformacaoSenha($entrada){
	    	return $entrada;
	    	// return crypt($entrada, '$2a$12$jALKAJSeqwnaSEnxcjayeE$');
	    }

	}

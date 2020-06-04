<?php

	trait Validacao {

		public function validacaoNumero($entrada){
			return filter_var($entrada, FILTER_VALIDATE_INT) or $entrada == 0;
		}

		public function validacaoEmail($entrada){
			return filter_var($entrada, FILTER_VALIDATE_EMAIL);
		}

		public function validacaoEspeciais($entrada){
			return filter_var($entrada, FILTER_SANITIZE_FULL_SPECIAL_CHARS) == $entrada;
		}

		public function validacaoBooleano($entrada){
			return true;
		}

		public function validacaoCPF($entrada){
            $entrada = ereg_replace('[^0-9]', '', $entrada);
            $entrada = str_pad($entrada, 11, '0', STR_PAD_LEFT);


            if (strlen($entrada) != 11) {
                return false;
            }else{

                for ($t = 9; $t < 11; $t++) {

                    for ($d = 0, $c = 0; $c < $t; $c++) {
                        $d += $entrada{$c} * (($t + 1) - $c);
                    }
                    $d = ((10 * $d) % 11) % 10;
                    if ($entrada{$c} != $d) {
                        return false;
                    }
                }
                return true;
            }
		}

		public function validacaoData($entrada){
			$entrada = explode('-', $entrada);
			if(count($entrada) == 3){
				if(checkdate($entrada[1], $entrada[2], $entrada[0])){
					return true;
				}
			}
			return false;
		}

		public function validacaoDataPassou($entrada){
			$entrada = explode('-', $entrada);
			if(count($entrada) == 3){
				if(checkdate($entrada[1], $entrada[2], $entrada[0])){
					return strtotime(implode('-', $entrada)) > strtotime(date('Y-m-d'));
				}
			}
			return false;
		}

		public function validacaoHorario($entrada){
			$entrada = explode(':', $entrada);
			if(count($entrada) == 2){
				if(($entrada[0] < 24) && ($entrada[1] < 60)){
					return true;
				}
			}
			elseif(count($entrada) == 3){
				if(($entrada[0] < 24) && ($entrada[1] < 60) && ($entrada[2] < 60)){
					return true;
				}
			}
		}

		public function validacaoDatetime($entrada){
			$entrada = explode(' ', $entrada);
			if(count($entrada) != 2)
				return false;
			if(!$this->validacaoData($entrada[0]))
				return false;
			if(!$this->validacaoHorario($entrada[1]))
				return false;
			return true;
		}

		public function validacaoUF($entrada){
			$entrada = strtoupper($entrada);
			$arrUF = array("AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará","DF"=>"Distrito Federal","ES"=>"Espírito Santo","GO"=>"Goiás","MA"=>"Maranhão","MT"=>"Mato Grosso","MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"Pará","PB"=>"Paraíba","PR"=>"Paraná","PE"=>"Pernambuco","PI"=>"Piauí","RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte","RO"=>"Rondônia","RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina","SE"=>"Sergipe","SP"=>"São Paulo","TO"=>"Tocantins");

			return array_key_exists($entrada, $arrUF);
		}

		public function validacaoPorcentagem($entrada, $minimo, $maximo){
			if(filter_var($entrada, FILTER_VALIDATE_INT) || filter_var($entrada, FILTER_VALIDATE_FLOAT)){
				if(($entrada >= $minimo) && ($entrada <= $maximo))
					return true;
			}
			return false;
		}

		

		public function validacaoArquivo($entrada, $tipo){
			$extensao = explode('.', $entrada);
			if(count($extensao) < 2)
				return false;
            $extensao = strtolower($extensao[count($extensao)-1]);

            if($tipo == 'imagem'){
            	if($extensao == 'jpeg' || $extensao == 'jpg' || $extensao = 'bmp' ||
            	   $extensao == 'png')
            	   return true;
            }
            if($tipo == 'pdf')
            	if($extensao == 'pdf')
            		return true;
            return false;
		}


	}

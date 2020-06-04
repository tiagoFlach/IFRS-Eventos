if(isset($buscaCursos) and isset($buscaCurso_d_h)){

					$dataInicio = strtotime($evento->getDataInicio());
		            $dataFim = strtotime($evento->getDataFim());
		            $diferenca = $dataFim - $dataInicio;
		            $dias = (int)floor($diferenca / (60 * 60 * 24)) + 1;
		            ?>

		            <b>Cronograma:</b>
                    <table class="table table-bordered table-striped">
                        <thead>    
                            <tr>
                                <th>&nbsp;</th>

                    <?php
		            $data = date('d/m/Y', strtotime($evento->getDataInicio()));
		            $datas = [];
		            for($i=1;$i<=$dias;$i++){
		                $datas[] = $data;
		                ?>
		                	<th colspan="<?php echo count($buscaCursos); ?>">Dia <?php echo $i; ?> - <?php echo $data; ?></th> 
		                <?php
		                $data = date('d/m/Y', strtotime("+".$i." days",strtotime($evento->getDataInicio())));         
		            }
		            ?>
				           	</tr>
				           	<tr>
				                <th>Hora</th>
				    <?php
		            $colunas = 0;
		            for($i=0;$i<$dias;$i++){
		                for($j=0;$j<count($buscaCursos);$j++){
		                	?>
		                    	<th><?php echo $buscaCursos[$j]['local']; ?></th>
		                    <?php
		                    $colunas++;
		                }
		            }
		            ?>
		            		</tr>
		            	</thead>
		            	<tbody>
		            <?php       
		            $horaInicial = date('H:i', strtotime($evento->getHoraInicio()));
		            $horaFinal = $horaInicial;

		            for($i=0;$i<count($buscaCurso_d_h);$i++){
		                if($buscaCurso_d_h[$i]['horaInicio'] < $horaInicial){
		                    $horaInicial = date('H:i', strtotime($buscaCurso_d_h[$i]['horaInicio']));
		                }
		                if($buscaCurso_d_h[$i]['horaFim'] > $horaFinal){
		                    $horaFinal = $buscaCurso_d_h[$i]['horaFim'];
		                }
		            }

		            $horas = [];
		            $horas[] += strtotime($horaInicial);
		            while(strtotime($horaInicial) < strtotime($horaFinal)){
		                $horaInicial = date('H:i', strtotime("$horaInicial + 30 minutes"));
		                $horas[] += strtotime($horaInicial);
		            }


		            $arrayCursos = array();
		            for($x=0;$x<count($buscaCurso_d_h);$x++){
		                $arrayCursos[] += $buscaCurso_d_h[$x]['idCurso']; 
		            }
		            $arrayCursos = array_merge(array_unique($arrayCursos));
		            for($x=0;$x<count($arrayCursos);$x++){
		                $arrayCursos[$x] = array();
		            }    
		            for($x=1;$x<=count($arrayCursos);$x++){
		                for($y=0;$y<count($buscaCurso_d_h);$y++){
		                    if($buscaCurso_d_h[$y]['idCurso'] == $x){

		                        $data = date('d/m/Y', strtotime($buscaCurso_d_h[$y]['data']));
		                        $inicio = $buscaCurso_d_h[$y]['horaInicio'];
		                        $fim = $buscaCurso_d_h[$y]['horaFim'];

		                        $arrayCursos[$x-1][$data] = array('inicio' => $inicio,'fim' => $fim);
		                    }
		                }        
		            } 

		            $arrayCursosJS = array();
		            for($x=0;$x<count($buscaCursos);$x++){
		                $arrayCursosJS[$buscaCursos[$x]['nome']] = array(); 
		            }        
		            for($x=1;$x<=count($arrayCursosJS);$x++){
		                for($y=0;$y<count($buscaCurso_d_h);$y++){
		                    if($buscaCurso_d_h[$y]['idCurso'] == $x){

		                        $data = date('d/m/Y', strtotime($buscaCurso_d_h[$y]['data']));
		                        $inicio = $buscaCurso_d_h[$y]['horaInicio'];
		                        $fim = $buscaCurso_d_h[$y]['horaFim'];

		                        $arrayCursosJS[$buscaCursos[$x-1]['nome']] += array($data => array('inicio' => $inicio,'fim' => $fim));
		                        // $arrayCursosJS[$buscaCursos[$x-1]['nome']][$data] = array('inicio' => $inicio,'fim' => $fim);
		                    }
		                }        
		            }
		             
		            //$arrayCursos[5] = array('2015-06-16' => array('inicio' => '08:00','fim' => '16:00')); 
		            //var_dump($arrayCursos);
		            //$arrayCursos= [1 => [2015-06-16['inicio' => '08:00','fim' => '16:00']]]
		            //print_r($arrayCursos);

		            //var_dump($buscaCursos);
		            for($w=0;$w<count($horas);$w++){
		                $hora = date('H:i', $horas[$w]);
		                ?>
		                <tr>
		                <th><?php echo $hora; ?></th>
		                <?php
		                $hora = date('H:i:s', $horas[$w]);

		                for($x=0;$x<$dias;$x++){    // 0 a 3 (dia 1 a 4)
		                    $data = $datas[$x];
		                    for($y=0;$y<count($buscaCursos);$y++){     // 0 a 1 (cursos 1 a 2)
		                        if(isset($arrayCursos[$y][$data])){
		                            if($hora >= $arrayCursos[$y][$data]['inicio'] && $hora < $arrayCursos[$y][$data]['fim']){
		                            ?>
		                                <td><?php echo $buscaCursos[$y]['nome']; ?></td>
		                            <?php
		                            } else {
		                            ?>
		                                <td>&nbsp;</td>
		                            <?php
		                            }
		                        } else {
		                        ?>
		                            <td>&nbsp;</td>
		                        <?php
		                        }
		                    }
		                }
		                ?>
		               		</tr>
		               	
		               	<?php
		            }
		            ?>
		            	</tbody>
		            </table>
		            <?php
		        }
			?>
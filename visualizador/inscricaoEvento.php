<?php
	if(isset($buscaCategorias)){
		?>
		<div class="form-group">
        <label for="categoria">Categoria:</label>
		<table class="table table-striped">
			<tbody>
				<?php
					foreach($buscaCategorias as $key => $value){
						?>
						<tr>
							<td><input type="radio" name="categoria" required value="<?php echo $value->getNome() ?>">
							&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $value->getNome(); ?></td>
							<?php
								$arrayDataValor = array();

								if($buscaCategoria_d_v){
									foreach($buscaCategoria_d_v as $chave => $valor){
										if($valor->getIdCategoria() == $value->getId()){
											$arrayDataValor[$valor->getData()] = $valor->getValor();
										}
									}
		                    	}

		                    	$hoje = date('Y-m-d');
		                    	$existeValor = "nao";
		                    	foreach ($arrayDataValor as $chave => $valor) {
		                    		if($hoje <= $chave){
		                    			?>
		                    				<td>R$ <?php echo $valor; ?></td>
		                    			<?php
		                    			$existeValor = "sim";
		                    			break;
		                    		}
		                    	}

		                    	if($existeValor == "nao"){
		                    		?>
		                    			<td>R$ <?php echo $value->getValorInscricaoDia(); ?></td>
		                    		<?php
		                    	}
		                    ?>
		                </tr>
	                    <?php
	                }
				?>
			</tbody>
		</table>
		</div>
	<?php
	}
?>
<?php
	if(isset($buscaCursos)){
		?>
		<div class="form-group">
        <label for="categoria">Cursos:</label>
		<table class="table table-striped">
			<tbody>
				<?php
					foreach($buscaCursos as $key => $value){
						?>
						<tr>
							<td><input onchange="cursos(<?php echo $value->getNome(); ?>)" type="checkbox" name="cursos[]" value="<?php echo $value->getNome() ?>">
							&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $value->getNome(); ?></td>
							<?php
								if($value->getValor()){
									?>
				               			<td>R$ <?php echo $value->getValor(); ?>,00</td>
				               		<?php
				               	}
			               	?>
		                </tr>
	                    <?php
	                }
				?>
			</tbody>
		</table>
		</div>
	<?php
	}
?>














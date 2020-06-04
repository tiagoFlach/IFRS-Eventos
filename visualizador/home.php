<div class="col-md-9">
	<?php
	include('inc/getErrors.inc.php');

	if($buscaEventos){
		foreach($buscaEventos as $key => $value){
			?>
			<div class="thumbnail" >
				<div class="caption-full">
					<h3><a href="?controle=evento&acao=verEvento&id=<?php echo $value->getId() ?>"><?php echo $value->getNome() ?></a></h3>
				
					<?php
					if($value->getDataInicio() == $value->getDataFim()){
						?>
						<p><b>Data: </b><?php echo date('d/m/Y', strtotime($value->getDataInicio())) ?><br />
						<?php
					} else {
						?>
						<p><b>Data de início: </b><?php echo date('d/m/Y', strtotime($value->getDataInicio())) ?><br />
							<b>Data de término: </b><?php echo date('d/m/Y', strtotime($value->getDataFim())) ?><br />
						<?php
					}
					?>
					<b>Hora: </b><?php echo date('H:i', strtotime($value->getHoraInicio())) ?><br />
					<b>Local: </b><?php echo $value->getLocal() ?><br />
					
					<?php			
					if($value->getValorInscricao()){
						?>
						<b>Valor de incrição: </b>R$ <?php echo $value->getValorInscricao() ?>,00<br />
						<?php
					}
					?>

					<b>Descrição: </b><?php echo $value->getDescricao() ?></p>
				</div>
			</div>	
			<?php	
		}

	} else {
		?>
		<h4>Nenhum evento encontrado!</h4>
		<?php
	}
?>
</div>
		
		






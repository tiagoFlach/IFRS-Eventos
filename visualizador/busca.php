<div class="col-md-9">             
        <?php
		if($arrEventos){
			?>
			<h5 id="titulo">Resultados para "<?php echo filter_var($_POST['busca'], FILTER_SANITIZE_SPECIAL_CHARS); ?>":</h5>
    		<hr class="blue">
    		<?php
			foreach($arrEventos as $key => $value){
				?>
				<div class="thumbnail" >
					<div class="caption-full">
					<h3><a href="?controle=evento&acao=verEvento&id=<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></a></h3>
				
				<?php
				if($value['dataInicio'] == $value['dataFim']){
					?>
					<p><b>Data: </b><?php echo date('d/m/Y', strtotime($value['dataInicio'])) ?><br />
					<?php
				} else {
					?>
					<p><b>Data de início: </b><?php echo date('d/m/Y', strtotime($value['dataInicio'])) ?><br />
						<b>Data de término: </b><?php echo date('d/m/Y', strtotime($value['dataFim'])) ?><br />
					<?php
				}
				?>
				<b>Hora: </b><?php echo date('H:i', strtotime($value['horaInicio'])) ?><br />
				<b>Local: </b><?php echo $value['local'] ?><br />
				
				<?php			
				if($value['valorInscricao']){
					?>
					<b>Valor de incrição: </b>R$ <?php echo $value['valorInscricao'] ?><br />
					<?php
				}
				?>

				<b>Descrição: </b><?php echo $value['descricao'] ?></p>
				</div></div>	
				<?php	
			}
		} else {
			?>
			<h4>Nenhum resultado encontrado!</h4>
			<?php
		}
	?>
</div>
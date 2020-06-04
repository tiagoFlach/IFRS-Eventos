<div class="col-md-9">
	<?php
	include('inc/getErrors.inc.php');
	?>
	<div class="thumbnail">
		<div class="caption-full">
			<h2>Editar evento</h2>
			<form method="post" action="?controle=evento&acao=editarEvento&id=<?php echo $_GET['id']; ?>">
			
			<fieldset>
				<legend><?php echo $evento->getNome() ?></legend>

				<div class="form-group">
					<label for="nome">Nome do evento:</label>
					<input type="text" class="form-control" name="nome" value="<?php echo $evento->getNome() ?>" required="" />
				</div>

		  		<?php
		  		if($evento->getDataInicio() == $evento->getDataFim() or !($evento->getDataFim())){
						?>
						<p class="descricao"><b>Data: </b><?php echo date('d/m/Y', strtotime($evento->getDataInicio())); ?></p>
						<?php
					} else {
						?>
						<p class="descricao"><b>Data de início: </b><?php echo date('d/m/Y', strtotime($evento->getDataInicio())); ?></p>
						<p class="descricao"><b>Data de término: </b><?php echo date('d/m/Y', strtotime($evento->getDataFim())); ?></p>
						<?php
					}
				?>
				<p class="descricao"><b>Hora: </b><?php echo date('H:i', strtotime($evento->getHoraInicio()))?></p>
				<p class="descricao"><b>Local: </b><?php echo $evento->getLocal(); ?></p>
				<?php 
					if($evento->getValorInscricao()){
			            ?>
			            <p class="descricao"><b>Valor de incrição: </b> R$ <?php echo $evento->getValorInscricao(); ?>,00</p>
			            <?php
			        }   
				?>
				<hr>	
				

				<div class="form-group">
					<h3>Descrição</h3>
					<textarea class="form-control" rows="5" name="descricao" required=""><?php echo $evento->getDescricao(); ?></textarea>
				</div>


				<hr>
				<input type="submit" class="btn btn-success btn-block" id="sucess" value="Salvar edição">
			</fieldset>
			</form>
		</div>
	</div>
</div>
<div class="col-md-9">
	<?php
	include('inc/getErrors.inc.php');
	?>
	<div class="thumbnail">
		<div class="caption-full">

			<h2><?php echo $evento->getNome() ?></h2>

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
			<h3>Descrição</h3>
			<p><?php echo $evento->getDescricao(); ?></p>


			<?php 
				if(isset($buscaCategorias)){ 
					?>
					<hr>
					<h3>Categorias</h3>
					<?php 
		            foreach ($buscaCategorias as $key => $value) {
		            	if(isset($buscaCategoria_d_v)){
		            		?>
		            		<table class="table table-striped">
		            			<thead>
		            				<tr>
		            					<th colspan="2"><?php echo $value->getNome(); ?></th>
		            				</tr>
		            			</thead>
		            			<tbody>
		            				<?php
		            				foreach($buscaCategoria_d_v as $chave => $valor){
		            					if($valor->getIdCategoria() == $value->getId()){
		            					?>
			            				<tr>
			            					<td>Inscrições até dia <?php echo date('d/m/Y', strtotime($valor->getData())); ?>:</td>
			            					<td>R$ <?php echo $valor->getValor(); ?></td>
			            				</tr>
			            				<?php
			            				}
		            				}
		            				?>
		            				<tr>
		            					<td>Inscrições no dia:</td>
		            					<td>R$ <?php echo $value->getValorInscricaoDia(); ?></td>
		            				</tr>
		            			</tbody>
		            		</table>
		            		<?php
		            	} else {
		            		?>
		            		<p><?php echo $value->getNome(); ?></p>
		            		<?php
		            	}	    
            		}
				}
			?>
			
			<?php
			if(isset($buscaCursos)){ 
				?>
				<hr>
				<h3>Cursos</h3>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data de Inicio</th>
                            <th>Data de Fim</th>
                            <th>Local</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
					foreach($buscaCursos as $key => $value){
						?>
						<tr>
	                        <td><?php echo $value->getNome(); ?></td>
	                        <td><?php echo date('d/m/Y', strtotime($value->getDataInicio())); ?></td>
	                        <td><?php echo date('d/m/Y', strtotime($value->getDataFim())); ?></td>
	                        <td><?php echo $value->getLocal(); ?></td>
	                        <td>R$ <?php echo $value->getValor(); ?></td>
	                    </tr>
	                    <?php
	    				}
	    			?>
    				</tbody>
				</table>
				<?php
				}
			?>
		</div>

	</div>
	
	<?php if(isset($_SESSION['idAdministrador'])){
		?>
	<a name="inscritos"></a>
	<div class="well">
		<?php include('visualizador/inscritos.php'); ?>
	</div>
		<?php
		}
	?>

	<div class="well">
		<?php include('visualizador/inscricao.php'); ?>
	</div>
</div>
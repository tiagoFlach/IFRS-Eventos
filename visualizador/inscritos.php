<div class="caption-full" name="#inscritos">
	<?php 
	if($buscaInscritos){
	?>

	<h2>Lista de inscritos</h2>
	<table class="table table-striped">
	    <thead>
		    <tr>
		    	<th>Nome</th>
		    	<th>E-mail</th>
		    	<th>Empresa</th>
		    	<th>Telefone</th>
		    	<th>Celular</th>
	    	</tr>
	    </thead>
	    <tbody>   
	<?php
		foreach ($buscaInscritos as $key => $value) {
			?>
			<tr>
				<td><?php echo $value['nome']; ?></td>
				<td><?php echo $value['email']; ?></td>
				<td><?php echo $value['empresa']; ?></td>
				<td><?php echo $value['telefone']; ?></td>
				<td><?php echo $value['celular']; ?></td>
			</tr>
			<?php
		}
	?>	
		</tbody>
	</table>
	<?php
	} else {
		?>
		<h1 id="inscs">Nenhuma inscrição até o momento.</h1>
		<?php
	}
	?>
</div>
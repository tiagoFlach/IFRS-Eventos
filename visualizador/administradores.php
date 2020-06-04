<div class="col-md-9">
	<?php
	include('inc/getErrors.inc.php');
	?>
	<div class="thumbnail">
		<div class="caption-full">

			<h2>Administradores</h2>
							    
			<?php
			if($buscaAdministradores){
				?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Login</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
				<?php
				foreach ($buscaAdministradores as $key => $value) {
					?>
					<tr>
						<td><?php echo $value->getLogin(); ?></td>
						<td align="right"><a class="btnExcluir btn btn-danger pull-rights" id="<?php echo $value->getId(); ?>">Excluir Administrador</a></td>
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
</div>
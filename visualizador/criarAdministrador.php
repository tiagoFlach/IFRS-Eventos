<div class="col-md-9">
	<?php
	include('inc/getErrors.inc.php');
	?>
	<div class="thumbnail">
		<div class="caption-full">

			<h2>Criar administrador</h2>
			
			<form method="post" action="?controle=administrador&acao=criarAdministrador">
				<div class="form-group">
					<label for="login">Login:</label>
					<input type="text" class="form-control" name="login" placeholder="Login" required=""/>
				</div>
				<div class="form-group">
					<label for="senha">Senha:</label>
					<input type="password" class="form-control" name="senha" placeholder="Senha" required=""/>
				</div>
				<div class="form-group">
					<label for="senha2">Confirmação de senha:</label>
					<input type="password" class="form-control" name="senha2" placeholder="Confirmação de senha" required=""/>
				</div>
				<hr>
				<input type="submit" class="btn btn-success btn-block" id="sucess" value="Criar Administrador">
			</form>
	  	</div>
	</div>
</div>
<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="icon" href="../../favicon.ico">

	    <title>Login</title>
	    <link href="imagens/favicon.ico" rel="Shortcut Icon" /> 

	    <!-- Bootstrap core CSS -->
	    <link href="css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="css/login.css" rel="stylesheet">

	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
  	</head>
  	<body>
    	<div class="container">
	    	<form class="form-signin" method="post" action="?controle=administrador&acao=loginFim">
	        	<h2 class="form-signin-heading">Login</h2>
	        	<?php if(isset($mensagem)){ echo '<p class="erro">'.$mensagem.'</p>'; } ?>
		        <label for="login" class="sr-only">Usuario</label>
		        <input type="text" name="login" class="form-control" placeholder="Usuario" required autofocus>
		        <label for="senha" class="sr-only">Senha</label>
		        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
	        	<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
	      	</form>
    	</div> 
	</body>
</html>


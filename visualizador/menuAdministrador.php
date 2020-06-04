<div class="col-md-3">            
  <div class="list-group" id="menu">
      <a href="?controle=evento&acao=proximos" <?php if(isset($local) && $local == 'proximos'){ ?>class="list-group-item active" <?php } else { ?>class="list-group-item" <?php } ?>>Próximos Eventos</a>
      <a href="?controle=evento&acao=anteriores" <?php if(isset($local) && $local == 'anteriores'){ ?>class="list-group-item active" <?php } else { ?>class="list-group-item" <?php } ?>>Eventos Anteriores</a>
      <a href="?controle=administrador&acao=administradores" <?php if(isset($local) && $local == 'administradores'){ ?>class="list-group-item active" <?php } else { ?>class="list-group-item" <?php } ?>>Administradores</a>
      <a href="?controle=administrador&acao=criarEvento" <?php if(isset($local) && $local == 'criarEvento'){ ?>class="list-group-item active" <?php } else { ?>class="list-group-item" <?php } ?>>Criar Evento</a>
      <a href="?controle=administrador&acao=logout" class="list-group-item">Logout</a>
  </div>

  <form action="?controle=evento&acao=buscarFim" method="post" class="search-form" id="buscar">
      <div class="input-group" >
          <input required id="busca" type="text" class="form-control" name="busca" placeholder="Buscar...">
          <span class="input-group-btn">
             <button class="btn btn-default" type="submit">
                 <span class="glyphicon sucess glyphicon-search"></span>
             </button>
         </span>
     </div>
  </form>

  <?php 
  if($_GET['acao'] == 'verEvento'){
    ?>
    <div id="admBotoes">
      <a class="btn btn-success btn-block" href="#inscritos">Visualizar Lista de Inscritos</a>
      <a class="btn btn-primary btn-block" href="?controle=evento&acao=editar&id=<?php echo $_GET['id'] ?>">Editar Evento</a>
      <a class="btnExcluir btn btn-danger btn-block" id="<?php echo $_GET['id'] ?>">Excluir Evento</a>
    </div>
    <?php
  }
  if($_GET['acao'] == 'administradores'){
    ?>
    <div id="admBotoes">
      <a class="btn btn-warning btn-block" href="#">Alterar Dados</a>
      <a class="btn btn-primary btn-block" href="?controle=administrador&acao=adicionar">Adicionar administrador</a>
    </div>
    <?php
  }
  if($_GET['controle'] == 'evento' && $_GET['acao'] == 'editar'){
    ?>
    <div id="admBotoes">
      <a class="btn btn-primary btn-block" href="?controle=evento&acao=verEvento&id=<?php echo $_GET['id'] ?>">Voltar</a>

    </div>
    <?php
  }
  ?>
  
</div>
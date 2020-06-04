<div class="col-md-3">            
  <div class="list-group" id="menu">
      <a href="?controle=evento&acao=proximos" <?php if(isset($local) && $local == 'proximos'){ ?>class="list-group-item active" <?php } else { ?>class="list-group-item" <?php } ?>>Próximos Eventos</a>
      <a href="?controle=evento&acao=anteriores" <?php if(isset($local) && $local == 'anteriores'){ ?>class="list-group-item active" <?php } else { ?>class="list-group-item" <?php } ?>>Eventos Anteriores</a>
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

</div>
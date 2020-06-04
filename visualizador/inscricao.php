<h2>Ficha de Inscrição</h2>
<form role="form" name="inscricao" id="inscricao" method="post" action="?controle=inscricao&acao=inscrever&id=<?php echo $_GET['id'];?>">

    <div class="form-group">
        <label for="nome">Nome completo:</label>
        <input type="text" class="form-control" placeholder="Nome" name="nome" id="nome" value="<?php if(isset($_COOKIE['nome'])){echo $_COOKIE['nome'];}  ?>" required>
    </div>

    <div class="form-group">
        <label for="cpf">CPF:</label>
        <input type="number" class="form-control" placeholder="CPF" name="cpf" id="cpf" value="<?php if(isset($_COOKIE['cpf'])){echo $_COOKIE['cpf'];}  ?>" required>
    </div>

    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="text" class="form-control" placeholder="E-mail" name="email" id="email" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}  ?>" required>
    </div>

    <div class="form-group">

        <label for="uf">Estado:</label>
        <select class="form-control" name="uf">  
            <option value="estado">Estado</option> 
            <option value="ac" <?php $estado='ac'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Acre</option> 
            <option value="al" <?php $estado='al'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Alagoas</option>
            <option value="ap" <?php $estado='ap'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Amapá</option>  
            <option value="am" <?php $estado='am'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Amazonas</option> 
            <option value="ba" <?php $estado='ba'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Bahia</option> 
            <option value="ce" <?php $estado='ce'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Ceará</option> 
            <option value="df" <?php $estado='df'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Distrito Federal</option> 
            <option value="es" <?php $estado='es'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Espírito Santo</option> 
            <option value="go" <?php $estado='go'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Goiás</option> 
            <option value="ma" <?php $estado='ma'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Maranhão</option> 
            <option value="mt" <?php $estado='mt'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Mato Grosso</option> 
            <option value="ms" <?php $estado='ms'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Mato Grosso do Sul</option> 
            <option value="mg" <?php $estado='mg'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Minas Gerais</option> 
            <option value="pa" <?php $estado='pa'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Pará</option> 
            <option value="pb" <?php $estado='pb'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Paraíba</option> 
            <option value="pr" <?php $estado='pr'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Paraná</option> 
            <option value="pe" <?php $estado='pe'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Pernambuco</option> 
            <option value="pi" <?php $estado='pi'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Piauí</option> 
            <option value="rj" <?php $estado='rj'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Rio de Janeiro</option> 
            <option value="rn" <?php $estado='rn'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Rio Grande do Norte</option> 
            <option value="rs" <?php $estado='rs'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Rio Grande do Sul</option> 
            <option value="ro" <?php $estado='ro'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Rondônia</option> 
            <option value="rr" <?php $estado='rr'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Roraima</option> 
            <option value="sc" <?php $estado='sc'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Santa Catarina</option>
            <option value="sp" <?php $estado='sp'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>São Paulo</option>  
            <option value="se" <?php $estado='se'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Sergipe</option> 
            <option value="to" <?php $estado='to'; if(isset($_COOKIE['uf']) && $_COOKIE['uf'] == $estado){echo 'selected';}?>>Tocantins</option> 
        </select>
    </div>
    
    <div class="form-group">
        <label for="cidade">Cidade:</label>
        <input type="text" class="form-control" placeholder="Cidade" name="cidade" id="cidade" value="<?php if(isset($_COOKIE['cidade'])){echo $_COOKIE['cidade'];}  ?>" required>
    </div>
    
    <div class="form-group">
        <label for="endereco">Endereço:</label>
        <input type="text" class="form-control" placeholder="Endereço" name="endereco" id="endereco" value="<?php if(isset($_COOKIE['endereco'])){echo $_COOKIE['endereco'];}  ?>" required>
    </div>
    
    <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="text" class="form-control" placeholder="Telefone" name="telefone" id="telefone" value="<?php if(isset($_COOKIE['telefone'])){echo $_COOKIE['telefone'];}  ?>" required>
    </div>

    <div class="form-group">
        <label for="celular">Celular:</label>
        <input type="text" class="form-control" placeholder="Celular" name="celular" id="celular" value="<?php if(isset($_COOKIE['celular'])){echo $_COOKIE['celular'];}  ?>" required>
    </div>

    <div class="form-group">
        <label for="empresa">Empresa:</label>
        <input type="text" class="form-control" placeholder="Empresa" name="empresa" id="empresa" value="<?php if(isset($_COOKIE['empresa'])){echo $_COOKIE['empresa'];}  ?>" required>
    </div>

    <?php include('visualizador/inscricaoEvento.php'); ?>

    <div class="checkbox">
        <hr>
        <label><input type="checkbox" name="lembrar" <?php if(isset($_COOKIE['lembrar'])){ echo 'checked'; } ?>>Lembrar de mim</label>
    </div>
    <button type="submit" class="btn btn-primary  btn-block">Inscrever-se</button>
</form>


<div class="col-md-9">
	<div class="thumbnail">
		<div class="caption-full">
			<h2>Formulário de criação</h2>
			<form method="post" action="?controle=evento&acao=criarEvento">
				
				<!--Informações básicas-->
				<fieldset>
					<legend>Informações básicas</legend>

					<div class="form-group">
						<label for="nome">Nome do evento:</label>
						<input type="text" class="form-control" name="nome" placeholder="Nome do evento" required=""/>
					</div>

			       <div class="col-md-6 datas" id="esquerda">
                        <div class="form-group">
                            <label for="dataInicio">Data de Início:</label>
                            <div class="input-group datepicker">
                                <input type='text' class="form-control" name="dataInicio" placeholder="dd/mm/aaaa" required=""/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>                      
                    </div>

                    <div class="col-md-6 datas">
                        <div class="form-group">
                            <label for="dataFim">Data de Finalização:</label>
                            <div class="input-group datepicker">
                                <input type='text' class="form-control" name="dataFim" placeholder="dd/mm/aaaa" required=""/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 datas" id="esquerda">
						<div class="form-group">
							<label for="hora">Horário:</label>
			                <div class="input-group clockpicker" data-autoclose="true">
							    <input type="text" class="form-control" name="hora" placeholder="Hora" required="">
							    <span class="input-group-addon">
							        <span class="glyphicon glyphicon-time"></span>
							    </span>
							</div>
						</div>
					</div>

					<div class="col-md-6 datas">
						<div class="form-group">
							<label for="valorInscricao">Valor da Inscrição:</label>
							<div class="input-group">
		                        <span class="input-group-addon">R$</span>
		                        <input type="number" class="form-control" name="valorInscricao" placeholder="Valor"/>
		                        <span class="input-group-addon" onclick="">,00</span>
		                    </div>
						</div>
					</div>

					<div class="form-group">
						<label for="local">Local:</label>
						<input type="text" class="form-control" name="local" placeholder="Local" required=""/>
					</div>

					<div class="form-group">
						<label for="site">Site do evento:</label>
						<input type="text" class="form-control" name="site" placeholder="Site" />
					</div>
					
					<div class="form-group">
						<label for="descricao">Descrição:</label>
						<textarea class="form-control" rows="5" name="descricao" placeholder="Descriçao..." required=""></textarea>
					</div>
				</fieldset>


				<!--Categorias-->
				<fieldset>
					<legend>Categorias</legend>
					
					<div class="form-inline">
					    <div class="form-group">
				   			<input type="button" class="btn btn-primary" name="adicionarCategoria" value="Adicionar Categoria" onclick="addCategoria();" />
					    </div>
					    <div class="form-group" id="botaoCategoria">
					   	</div>
					</div>

					<div id="categoria0"></div>
				</fieldset>
				
			
				<!--Cursos-->
				<fieldset>
					<legend>Cursos</legend>

					<div class="form-inline">
					    <div class="form-group">
					    	<input type="button" class="btn btn-primary" name="adicionarCurso" value="Adicionar Curso" onclick="addCurso();" />
					    </div>
					    <div class="form-group" id="botaoCurso">
					   	</div>
					</div>

					<div id="curso0"></div>						
				</fieldset>

				<hr>
				<input type="submit" class="btn btn-success btn-block" id="sucess" value="Criar Evento">
			</form>
		</div>
	</div>


</div>

$(function () {
    $('.datepicker').datetimepicker({
        format: 'DD/MM/YYYY'
    });
	$('.clockpicker').clockpicker({
		'default': '0'
	});
});

function construct(){
    $('.datepicker').datetimepicker({
        format: 'DD/MM/YYYY'
    });
	$('.clockpicker').clockpicker({
		'default': 'now'
	});
}


var listaCursos = [];
var listaCategorias = [];
var listaInscricao = [];
// var categorias = [];

var categorias = [];

function addCategoria(){
	var x = listaCategorias.length;

	if(x == 0){
		var divBotao = document.getElementById("botaoCategoria");
		divBotao.innerHTML = "<input type='button' class='btn btn-danger' name='removerCategoria' value='Remover Categoria' onclick='rmvCategoria();' />";
	}
	x += 1;

	var categoria = "<hr><div class='form-group'><label for='nome'>Nome da categoria:</label><input type='text' class='form-control' name='categoria"+ x +"' placeholder='Categoria' required=''/></div>";
	var inicioDiv = "<div class='col-md-12 well' id='addDatas'>";
	var inscricao = "<div class='col-md-6' id='inscdia'><div class='form-group'><label for='dataInscricao:"+ x +",0'>Inscrições até dia:</label><div class='input-group datepicker'><input type='text' class='form-control' onfocus='addInscricao("+ x +",0)' name='dataInscricao:"+ x +",0' placeholder='dd/mm/aaaa' /><span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></div></div></div>";
	var valor1 = "<div class='col-md-6' id='inscvalor'><div class='form-group'><label for='valorInscricao:"+ x +",0'>Valor:</label><div class='input-group'><span class='input-group-addon'>R$</span><input type='number' class='form-control' name='valorInscricao:"+ x +",0' placeholder='Valor' /></div></div></div>";
	var div1 = "<div id='inscricao:"+ x +",0'></div>";
	var valorDia = "<div class='col-md-12'><div class='form-group'><label for='valorInscricao"+ x +"Dia'>Valor no dia:</label><div class='input-group'><span class='input-group-addon'>R$</span><input type='number' class='form-control' name='valorInscricao"+ x +"Dia' placeholder='Valor no dia'/></div></div></div>";
	var fechaDiv = "</div>";
	var valor2 = "<div class='form-group'><label for='valorInscricao"+ x +"Dia'>Valor:</label><div class='input-group'><span class='input-group-addon'>R$</span><input type='number' class='form-control' name='valorInscricao"+ x +"' placeholder='Valor'/></div></div>";
	var fechaDiv2 = "</div>";
	var div2 = "<div id='categoria"+ x +"'>";

	x -= 1;

	var div = document.getElementById("categoria"+ x);

	div.innerHTML = categoria + inicioDiv + inscricao + valor1 + div1 + valorDia + fechaDiv + valor2 + fechaDiv2 + div2;

	construct();

	listaCategorias.push(x);
}

function rmvCategoria(){
	var x = listaCategorias.length;
	
	if(x == 1){
		var divBotao = document.getElementById("botaoCategoria");
		divBotao.innerHTML = "";
	}
	x -= 1;

	var nada = "";

	var div = document.getElementById("categoria"+ x);

	div.innerHTML = nada;

	listaCategorias.pop();
}

function addInscricao(x, y){
	
	var z = x.toString() + "," + y.toString();

	if(listaInscricao.indexOf(z) < 0){
		y += 1;

		var a = x.toString() + "," + y.toString();

		var inscricao = "<div class='col-md-6' id='inscdia'><div class='form-group'><label for='dataInscricao:"+ a +"'>Inscrições até dia:</label><div class='input-group datepicker'><input type='text' class='form-control' onfocus='addInscricao("+ x +","+ y +");' name='dataInscricao:"+ a +"' placeholder='dd/mm/aaaa' /><span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></div></div></div>";
		var valor = "<div class='col-md-6' id='inscvalor'><div class='form-group'><label for='valorInscricao:"+ a +"'>Valor:</label><div class='input-group'><span class='input-group-addon'>R$</span><input type='number' class='form-control' name='valorInscricao:"+ a +"' placeholder='Valor' /></div></div></div>";
		var div1 = "<div id='inscricao:"+ a +"'></div>";
			
		var div = document.getElementById("inscricao:"+ z);

		div.innerHTML = inscricao + valor + div1;

		console.log(inscricao, valor);

		listaInscricao += z;	
	}

	construct();
}

function addCurso(){
	var x = listaCursos.length;

	if(x == 0){
		var divBotao = document.getElementById("botaoCurso");
		divBotao.innerHTML = "<input type='button' class='btn btn-danger' name='removerCurso' value='Remover Curso' onclick='rmvCurso();' />";
	}

	x += 1;

	var nome = "<hr><div class='form-group'><label for='nome'>Nome do Curso:</label><input type='text' class='form-control' name='curso"+ x +"' placeholder='Nome do evento' required='' /></div>";
	var data = "<div class='col-md-6 datas' id='esquerda'><div class='form-group'><label for='dataInicio'>Data de Inicio:</label><div class='input-group datepicker'><input type='text' class='form-control' id='diaInicio"+ x +"' name='diaInicio"+ x +"' placeholder='dd/mm/aaaa' required='' /><span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></div></div></div><div class='col-md-6 datas'><div class='form-group'><label for='dataFim'>Data de Finalização:</label><div class='input-group datepicker'><input type='text' class='form-control' id='diaFim"+ x +"' name='diaFim"+ x +"' placeholder='dd/mm/aaaa' required='' /><span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></div></div></div>";
	var botao = "<input type='button' value='Gerar' onclick='dias(0);'></input>";
	var div1 = "<div id='programacao'></div>";
	var hora = "<div class='col-md-6 datas' id='esquerda'><div class='form-group'><label for='horaCurso"+ x +"'>Horário do Curso:</label><div class='input-group clockpicker' data-autoclose='true'><input type='text' class='form-control' name='horaCurso"+ x +"' placeholder='Hora' required='' /><span class='input-group-addon'><span class='glyphicon glyphicon-time'></span></span></div></div></div>";
	var valor = "<div class='col-md-6 datas'><div class='form-group'><label for='valorCurso"+ x +"'>Valor do Curso:</label><div class='input-group'><span class='input-group-addon'>R$</span><input type='number' class='form-control' name='valorCurso"+ x +"' placeholder='Valor' /></div></div></div>";
	var local = "<div class='form-group'><label for='localCurso"+ x +"'>Local do Curso:</label><input type='text' class='form-control' name='localCurso"+ x +"' placeholder='Local' required='' /></div>";
	
	var div2 = "<div id='curso"+ x +"'></div>";

	x -= 1;

	var div = document.getElementById("curso"+ x);

	div.innerHTML = nome + data + botao + div1 + hora + valor + local + div2;

	listaCursos.push(x);


	                $('.datepicker').datetimepicker({
	                    format: 'DD/MM/YYYY'
	                });
					$('.clockpicker').clockpicker({
						'default': 'now'
					});
}
function rmvCurso(){
	var x = listaCursos.length;

	if(x == 1){
		var divBotao = document.getElementById("botaoCurso");
		divBotao.innerHTML = "";
	}

	x -= 1;

	var nada = "";

	var div = document.getElementById("curso"+ x);

	div.innerHTML = nada;

	listaCursos.pop();	
}

function dias(x){

	var inicio = new Date(document.getElementById("diaInicio"+x).value);
	var fim = new Date(document.getElementById("diaFim"+x).value);

	inicio.setDate(inicio.getDate() + 1);
	fim.setDate(fim.getDate() + 1);

	if(inicio<fim){
		var dia = fim-inicio;
		dia = dia/86400000;

		var tabela = "<table border='1px'><tr>";
		for(i = 1; i <= dia+1; i++){
			//var data = inicio.getDate() + i;
			tabela += "<th>Dia "+i+"</th>";
		}
		tabela += "</tr><tr>";
		for(i = 1; i <= dia+1; i++){
			tabela += "<td>Hora de Inicio: <input type='time' name='horaInicio"+x+i+"' placeholder='Horário de inicio'></input></td>";
		}
		tabela += "</tr><tr>";
		for(i = 1; i <= dia+1; i++){
			tabela += "<td>Hora de Termino: <input type='time' name='horaFim"+x+i+"' placeholder='Horário de termino'></input></td>";
		}
		tabela += "</tr></table>";

		var div = document.getElementById("programacao");
		div.innerHTML = tabela;
	} else {
		alert("Data de inicio maior que data de fim!");
	}
}
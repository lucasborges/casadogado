$(document).ready(function(){
	
	<!-- VALIDA CADASTRO DE CLIENTES NO SITE -->
	$("#cadastraProduto").validate({
						   
				rules:{
				titulo:{required:true},
				tipo:{required:true},
				sexo:{required:true},
				idade:{required:true},
				qtd:{required:true,number:true},
				cidade:{required:true},
				estado:{required:true},
				valorVista:{required:true},
				descricao:{required:true},
				idade:{required:true}
				},
				
	   messages:{
	            titulo:{required:"Campo Título do Anúncio obrigatório!"},
				tipo:{required:"Campo Tipo Obrigatório!"},
				sexo:{required:"Campo Sexo Obrigatório!"},
				idade:{required:"Campo Idade Obrigatório!"},
				qtd:{required:"Campo Quantidade Cabeças Obrigatório!",number:"Favor informar somente números!"},
				cidade:{required:"Campo Cidade Obrigatório!"},
				estado:{required:"Campo Estado Obrigatório!"},
				valorVista:{required:"Campo Valor à Vista obrigatório!"},
				descricao:{required:"Campo Descrição obrigatório!"},
				idade:{required:"Campo Idade obrigatório!"}
		},						   
   });		   
})
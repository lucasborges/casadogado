$(document).ready(function(){
	
	<!-- VALIDA CADASTRO DE CLIENTES NO SITE -->
	$("#cadastrar_cliente").validate({						   
				rules:{
				nome:{required:true, minlength: 5},
				cpf:{required:true, minlength:14, maxlength:14},
				email:{required: true, email:true},
				operadora:{required: true},
				telefone:{required: true, minlength:13, maxlength:14},
				senha:{required: true, minlength: 5}
				},
				
	   messages:{
	   			nome:{required:"Campo nome obrigatório!", minlength:"O nome deve ter no mínimo 5 caracteres!"},
				cpf:{	required:"Campo CPF obrigatório!", 
						minlength:"O CPF deve conter 14 caracteres! Ex: xxx.xxx.xxx-xx",
						maxlength:"O CPF deve conter 14 caracteres! Ex: xxx.xxx.xxx-xx"},		
				email:{	required:"Campo Email obrigatório!", email:"Informe um e-mail válido!"},
				operadora:{	required:"Campo Operadora obrigatório!"},
				telefone:{	required:"Campo Telefone obrigatório!", 
							minlength:"O CPF deve conter no mínimo 13 caracteres! Ex: (xx)9xxxx-xxxx",
							maxlength:"O CPF deve conter no máximo 14 caracteres! Ex: (xx)9xxxx-xxxx"},
				senha:{required:"Campo Senha obrigatório!"}
		},						   
   });
   <!-- FIM CADASTRO DE CLIENTES NO SITE -->
   
   	<!-- VALIDA CADASTRO NECESSIDADE NO SITE -->
	$("#cadastrar_necessidade").validate({						   
				rules:{
				nome:{required:true, minlength: 5},
				email:{required: true, email:true},
				operadora:{required: true},
				telefone:{required: true, minlength:13, maxlength:14},
				mensagem:{required: true, minlength: 15}
				},
				
	   messages:{
	   			nome:{required:"Campo nome obrigatório!", minlength:"O nome deve ter no mínimo 5 caracteres!"},																
				email:{	required:"Campo Email obrigatório!", email:"Informe um e-mail válido!"},						
				operadora:{	required:"Campo Operadora obrigatório!"},				
				telefone:{	required:"Campo Telefone obrigatório!", 
							minlength:"O telefone deve conter no mínimo 13 caracteres! Ex: (xx)9xxxx-xxxx",
							maxlength:"O telefone deve conter no máximo 14 caracteres! Ex: (xx)9xxxx-xxxx"},
							
				mensagem:{required:"Campo mensagem obrigatório!" , minlength:"A mensagem deve conter no mínimo 15 caracteres!"}
		},						   
   });
  <!-- FIM VALIDA CADASTRO NECESSIDADE NO SITE -->
  
  <!-- VALIDA FALE CONOSCO NO SITE -->
	$("#fale_conosco").validate({						   
				rules:{
				nome:{required:true, minlength: 5},
				email:{required: true, email:true},
				operadora:{required: true},
				telefone:{required: true, minlength:13, maxlength:14},
				assunto:{required: true, minlength:5},
				mensagem:{required: true, minlength: 15}
				},
				
	   messages:{
	   			nome:{required:"Campo nome obrigatório!", minlength:"O nome deve ter no minimo 5 caracteres!"},																
				email:{	required:"Campo Email obrigatório!", email:"Informe um email válido!"},						
				operadora:{	required:"Campo Operadora obrigatório!"},				
				telefone:{	required:"Campo Telefone obrigatório!", 
							minlength:"O telefone deve conter no minimo 13 caracteres! Ex: (xx)9xxxx-xxxx",
							maxlength:"O telefone deve conter no maximo 14 caracteres! Ex: (xx)9xxxx-xxxx"},
				assunto:{required:"Campo Assunto obrigatório!",minlength:"Assunto deve conter no mínimo 5 caracteres!"},
				mensagem:{required:"Campo mensagem obrigatório!" , minlength:"A mensagem deve conter no mínimo 15 caracteres!"}
		},						   
   });
  	<!-- FIM VALIDA FALE CONOSCO NO SITE -->
  
   <!-- VALIDA FORM INTERESSE NO SITE -->
	$("#cadastrar_interesse").validate({						   
				rules:{
				nome:{required:true, minlength: 5},
				email:{required: true, email:true},
				cidade:{required: true},
				estado:{required: true},
				telefone:{required: true, minlength:13, maxlength:14},
				mensagem:{required: true, minlength: 15}
				},
				
	   messages:{
	   			nome:{required:"Campo nome obrigatório!", minlength:"O nome deve ter no minimo 5 caracteres!"},																
				email:{	required:"Campo Email obrigatório!", email:"Informe um email válido!"},				
				cidade:{required:"Campo Cidade obrigatório!"},
				estado:{required:"Campo Estado Obrigatório!"},					
				telefone:{	required:"Campo Telefone obrigatório!", 
							minlength:"O telefone deve conter no minimo 13 caracteres! Ex: (xx)9xxxx-xxxx",
							maxlength:"O telefone deve conter no maximo 14 caracteres! Ex: (xx)9xxxx-xxxx"},
				mensagem:{required:"Campo mensagem obrigatório!" , minlength:"A mensagem deve conter no mínimo 15 caracteres!"}
		},						   
   });
  <!-- FIM VALIDA F0RM INTERESSE -->
})
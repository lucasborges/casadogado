<div id="pagina">
	<div class="anuncie">
    
     <h2>Telefones:</h2>	
     <p>(xx 34) 3234-1209 (ESCRITÓRIO)<br />
     	(xx 34) 9993-1900 (CTBC) <br />
        (xx 34) 9996-3430 (CTBC) <br />
        (xx 34) 9217-1030 (TIM) <br />
        (xx 19) 9734-0605 (VIVO)     
     </p>
     
    <h2>Email:</h2>
   	<p>contato@portaldogado.com.br</p>
    
     <h2>Endereço:</h2>
	
     <p>Rua - Péricles Vieira da Motta, 78<br />
     	Bairro - Santa Mônica <br />
        Cidade - Uberlândia / MG <br />
        CEP - 38408-220
     </p>
     
    
     </div><!--fecha anuncies-->
    
    
    
    <form name="fale_conosco" id="fale_conosco" method="post" action="" enctype="multipart/form-data">
      <?php
		if(isset($_POST['fale_conosco'])){			
					$contatoNome 			= strip_tags(trim($_POST['nome']));
					$contatoEmail 			= strip_tags(trim($_POST['email']));
					$contatoTelefone 		= strip_tags(trim($_POST['telefone']));
					$contatoAssunto			= strip_tags(trim($_POST['assunto']));
					$contatoMensagem	 	= strip_tags(trim($_POST['mensagem']));
					$contatoData			= date('Y-m-d H:i:s');
					$contatoStatus			= 'pendente';
					$contatoCod				= date('d-H-i'). ' - Dia-Hora-Minuto - ' .$contatoEmail;		
				
				$sql_verificaContato = 'SELECT emailCod from portal_mailAdmin where emailCod = :contatoCod';
									
				try{
					$query_verificaContato = $conecta->prepare($sql_verificaContato);
					$query_verificaContato-> bindValue(':contatoCod',$contatoCod,PDO::PARAM_STR);
					$query_verificaContato->execute();
					$cont_verificaContato = $query_verificaContato->rowCount(PDO::FETCH_ASSOC);
					}catch(PDOexception $error_verificaCod){
						echo 'Erro ao selecionar o código do email';
				}
				
				if($cont_verificaContato >= '1'){
					echo '<div class="enviado_err">Por favor aguarde alguns minutos para enviar uma nova mensagem! <br/>Obrigado!</div>';
				} else {
					
					$sql_contatoSite = 'Insert into portal_mailAdmin (	emailNome,
																		emailEmail,
																		emailTelefone,
																		emailAssunto,
																		emailMensagem,
																		emailData,
																		emailStatus,
																		emailCod )
															values (	:contatoNome,
																		:contatoEmail,
																		:contatoTelefone,
																		:contatoAssunto,
																		:contatoMensagem,
																		:contatoData,
																		:contatoStatus,
																		:contatoCod	
															)';
															
				try {
					$query_cadastraContato = $conecta->prepare($sql_contatoSite);
					$query_cadastraContato-> bindValue(':contatoNome',$contatoNome,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoEmail',$contatoEmail,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoTelefone',$contatoTelefone,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoAssunto',$contatoAssunto,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoMensagem',$contatoMensagem,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoData',$contatoData,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoStatus',$contatoStatus,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoCod',$contatoCod,PDO::PARAM_STR);
					$query_cadastraContato->execute();
					echo '<div class="enviado">Seu e-mail foi enviado com sucesso!<br />Responderemos em breve!</div>';
				}catch(PDOexception $erro_cadastraMail){
					echo '<div class="enviado_err">Erro ao enviar seu e-mail! <br/>favor tente mais tarde ou nos informe pelo contato@portaldogado.com.br!</div>';
				}
			}	
		}
		
	?>
           <fieldset> <legend> Fale Conosco </legend>
                <label>
                    <span> Nome: </span>
                    <input type="text" name="nome"/>
                </label>            
                <label>
                    <span> Email: </span>
                    <input type="text" name="email"/>
                </label>
                
                <label>
                <span> Operadora: </span>
                <select name="operadora" id="operadora" onchange="" style="width:150px;" size='1' class=''>
            		<option value="" selected="selected">SELECIONE</option>                    
                        <option value='CLARO'>CLARO</option>
                        <option value='CTBC'>CTBC</option>
                        <option value='OI'>OI</option>
                        <option value='TIM'>TIM</option>
                        <option value='VIVO'>VIVO</option>
                  </select>
            	</label>
                
                <label>
                    <span> Telefone: </span>
                    <input type="text" name="telefone"/>
                </label>
                <label>
                    <span> Assunto: </span>
                    <input type="text" name="assunto"/>
                </label>
                <label>
                    <span> Mensagem: </span>
                    <textarea name="mensagem" id="mensagem" style="width:500px; height:90px;" class="formularios"></textarea>
               </label>
               
                <input type="submit" name="fale_conosco" id="fale_conosco" value="" class="btnEnviar"/>
            </fieldset>
    </form>
    
    
</div> <!-- Fecha Pagina -->


<div id="pagina">
	<div class="anuncie">
    
    <h2>Portal do Gado ajudando você!</h2>

    <p>O Portal do Gado tem o prazer em ajudar nossos clientes a encontrar o que procuram. Caso não encontre me nosso site o que procura 		
    	favor nos informar que localizamos para você, através de nossos parceiros!</p>
    <br/>    <br/>  
     <p><strong>Duvidas? <a href="interno.php?pg=contato.php">Clique aqui!</a></strong></p>
     
    <br/>
     </div><!--fecha anuncies-->
    
    <form name="cadastrar_necessidade" id="cadastrar_necessidade" method="post" action="" enctype="multipart/form-data">
    
    <?php
		if(isset($_POST['enviar'])){			
					$contatoNome 			= strip_tags(trim($_POST['nome']));
					$contatoEmail 			= strip_tags(trim($_POST['email']));
					$contatoOperadora		= strip_tags(trim($_POST['operadora']));
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
																		emailOperadora,
																		emailTelefone,
																		emailAssunto,
																		emailMensagem,
																		emailData,
																		emailStatus,
																		emailCod )
															values (	:contatoNome,
																		:contatoEmail,
																		:contatoOperadora,
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
					$query_cadastraContato-> bindValue(':contatoOperadora',$contatoOperadora,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoTelefone',$contatoTelefone,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoAssunto',$contatoAssunto,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoMensagem',$contatoMensagem,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoData',$contatoData,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoStatus',$contatoStatus,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoCod',$contatoCod,PDO::PARAM_STR);
					$query_cadastraContato->execute();
					echo '<div class="enviado">Seu e-mail foi enviado com sucesso!<br />Responderemos em breve!</div>';
				}catch(PDOexception $erro_cadastraMail){
					echo '<div class="enviado_err">Erro ao enviar seu e-mail! <br/>favor tente mais tarde ou nos informe pelo contato@casadogado.com.br!</div>';
				}
			}	
}?>
    
    
    
    	<fieldset> <legend> INFORME O QUE VOCÊ PRECISA!</legend>
            <label>
                <span> Nome: </span>
                <input type="text" name="nome"</label>
            </label>
            
            <label>
                <span> Email: </span>
                <input type="text" name="email"</label>
            </label>
            <label>
                <span> Operadora Celular: </span>
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
                <input type="text" name="telefone"</label>
            </label>
            <label>
                <span> Mensagem: </span>
           		<textarea name="mensagem" id="mensagem" style="width:500px; height:90px;" ></textarea>
           </label>
            <input type="submit" name="enviar" id="enviar" value="" class="btnEnviar"/>
        </fieldset>
    </form>
</div> <!-- Fecha Pagina -->
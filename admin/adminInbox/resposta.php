<?php include_once("sistema/restrito_admin.php");?>
<?php include_once("sistema/validar_user.php");?>
<?php include_once("header.php");?>
        <div id="local"> <!-- Inicio div local-->
    	   <div class="caminho"> Onde Estou: Portal do Gado &raquo;Painel de Controle &raquo; Visualizar/Responder </div>
 	       <div class="welcome"> Olá <?php echo $clienteNome ?>| Hoje <?php echo date('d/m/Y H:i').h ?> | <a href="deslogar.php">Deslogar</a></div>
        </div> <!-- fim div local-->
        
        <div id="content"><!-- inicio div content-->
			<?php include_once("menu.php")?>      
            
        	<div id="content_conteudo"><!-- inicio div content conteudo-->   
<?php include_once("sistema/carregando.php")?>

<?php
	if(isset($_POST['executar'])){
		$emailAdmin 		= 'contato@portaldogado.com.br'; 
		$emailStatus 		= 'completo';
		$emailResposta 		= date('Y-m-d H:m:s');
		$emailAssunto		= 'Contato Portal do Gado';
		$emailTxt 			= strip_tags(trim($_POST['mensagem']));
		$emailId 			= $_POST['emailId'];
		$emailClienteEmail	= $_POST['clienteEmail'];
		$emailRecebidoEm	= $_POST['emailData'];
		$emailMensagem		= $_POST['emailMensagem'];
		$emailNome			= $_POST['emailNome'];
		
		$headers = "From: $emailAdmin \n";
		$header .= "content-type: text/html; charset=\"utf-8\"\n\n";
		
		$sql_enviaAdmin = 'update portal_mailAdmin set	emailStatus 	= :emailStatus,
														emailResposta 	= :emailResposta,
														emailTxt 		= :emailTxt
														where emailId 	= :emailId';
		try{
			$query_enviaAdmin = $conecta->prepare($sql_enviaAdmin);
			$query_enviaAdmin->bindValue(':emailStatus',$emailStatus,PDO::PARAM_STR);
			$query_enviaAdmin->bindValue(':emailResposta',$emailResposta,PDO::PARAM_STR);
			$query_enviaAdmin->bindValue(':emailTxt',$emailTxt,PDO::PARAM_STR);
			$query_enviaAdmin->bindValue(':emailId',$emailId,PDO::PARAM_STR);
			$query_enviaAdmin->execute();
			echo '<div class="ok"> Mensagem Enviada com Sucesso! </div>';
			
			$mensagemEnvio = "
				Olá <strong>$emailNome</strong> o Portal do Gado agradece o seu contato: <br /> <br />
				<strong>Em resposta:</strong> $emailTxt <br /> <br />
				<strong>Recebemos sua mensagem em: </strong> $emailData; <br />
				<strong>Resposta em:</strong> $emailResposta; <br /><br />
				<strong>Mensagem Recebida:</strong> $emailMensagem;
			";
			
			mail($emailClienteEmail,$emailAssunto,$mensagemEnvio,$headers);
			
		}catch(PDOexception $erroAdminEmail){
			echo 'Erro ao atualizar e-mail';
		}
	}
?>
			
            	<div class="inbox" > <!-- inicio div inbox-->   
       	  		      <table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr style="background:#346700; color:#fff;font:12px 'Trebuchet MS', Arial, Helvetica, sans-serif;font-weight:bold;">
                          <td align="center">DATA:</td>
                          <td align="center">NOME:</td>
                          <td align="center">EMAIL:</td>
                          <td align="center">EXECUTAR:</td>
                        </tr>
                        
                        <?php 
							$emailId = $_GET['emailId']; // GET PEGA NA URL
							$sql_inboxAdmin = 'select * from portal_mailAdmin where emailId = :emailId';
							
							try{
								$query_inboxAdmin = $conecta->prepare($sql_inboxAdmin);
								$query_inboxAdmin->bindValue(':emailId',$emailId,PDO::PARAM_STR);
								$query_inboxAdmin->execute();
								$resultado_inboxAdmin = $query_inboxAdmin->fetchAll(PDO::FETCH_ASSOC);
								
							}catch(PDOException $error_inboxAdmin){
								echo 'Erro ao selecionar pendentes';
							}
							
							foreach($resultado_inboxAdmin as $res_inboxAdmin){
									$emailId		 	= $res_inboxAdmin['emailId'];
									$emailNome 			= $res_inboxAdmin['emailNome'];
									$emailEmail 		= $res_inboxAdmin['emailEmail'];
									$emailTelefone 		= $res_inboxAdmin['emailTelefone'];
									$emailAssunto 		= $res_inboxAdmin['emailAssunto'];
									$emailMensagem 		= $res_inboxAdmin['emailMensagem'];
									$emailData 			= $res_inboxAdmin['emailData'];
									$emailStatus 		= $res_inboxAdmin['emailStatus'];
									$emailResposta 		= $res_inboxAdmin['emailResposta'];
									$emailTxt 			= $res_inboxAdmin['emailTxt'];
									$i++;
									$cor = 'style="background:#F4F4F4"';
							?>
                            <tr <?php echo $cor;?>>
                              	<td align="center"><?php echo date('d/m/Y H:i',strtotime($emailData)).'h';?></td>
                              	<td align="center"><?php echo $emailNome;?></td>
                              	<td align="center"><?php echo $emailEmail;?></td>
                             	<td align="center"><a href="painel.php?exe=adminInbox/inbox"> Voltar</a></td>
                            </tr>
                            
                             <tr <?php echo $cor;?>>
                                  <td align="center" style="background:#346700; color:#fff;font:12px 'Trebuchet MS', Arial, Helvetica, sans-serif;font-weight:bold;">MENSAGEM:</td>
                                  <td colspan="3" style="color:#333;font:14px 'Trebuchet MS', Arial, Helvetica, sans-serif;"><?php echo $emailMensagem;?></td>
                        	</tr>                            
                        <?php 
						} // Final do ForEach
						?>
                 	 </table>
                     
                     <form name="responderEmail" action="" enctype="multipart/form-data" method="post">
                     		<label>
                            	<span style="font-weight:bold;"> Escreva a resposta: </span>
                            	<textarea rows="8" cols="136" name="mensagem"></textarea>
                            </label>
                            
                            <input type="hidden" name="emailId" value="<?php echo $emailId ?>"/>
                            <input type="hidden" name="clienteEmail" value="<?php echo $emailEmail?>"/>                            
                            <input type="hidden" name="emailData" value="<?php echo $emailData?>"/>
                            <input type="hidden" name="emailMensagem" value="<?php echo $emailMensagem?>"/> 
                             <input type="hidden" name="emailNome" value="<?php echo $emailNome?>"/>                            
                                                                     
                            <input type="submit" name="executar" id="executar" value="Enviar Resposta" />
                     
                     </form>
                     
                     
                     
			  </div> <!-- fim div inbox-->
                
          </div><!-- fim div content conteudo-->
        </div> <!-- fim div content -->
		<?php include_once("footer.php")?> 
</body>
</html>
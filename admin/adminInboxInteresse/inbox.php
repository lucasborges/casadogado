<?php include_once("sistema/restrito_admin.php");?>
<?php include_once("sistema/validar_user.php");?>
<?php include_once("header.php");?>
        <div id="local"> <!-- Inicio div local-->
    	   <div class="caminho"> Onde Estou: Portal do Gado &raquo;Painel de Controle &raquo;Admin Inbox </div>
 	       <div class="welcome"> Olá <?php echo $clienteNome ?>| Hoje <?php echo date('d/m/Y H:i').h ?> | <a href="deslogar.php">Deslogar</a></div>
        </div> <!-- fim div local-->
        
        <div id="content"><!-- inicio div content-->
			<?php include_once("menu.php")?>      
            
        	<div id="content_conteudo"><!-- inicio div content conteudo-->   
<?php include_once("sistema/carregando.php")?>
            	<div class="inbox" > <!-- inicio div inbox-->   
       	  		      <table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr style="background:#346700; color:#fff;font:12px 'Trebuchet MS', Arial, Helvetica, sans-serif;font-weight:bold;">
                          <td align="center">DATA:</td>
                          <td align="center">NOME:</td>
                          <td align="center">EMAIL:</td>
                          <td align="center">EXECUTAR:</td>
                        </tr>
                        
                        <?php 
							$interesse_clienteStatus = 'pendente';
							$sql_inboxAdmin = 'select * from portal_interesses 
											   where interesse_clienteStatus = :interesse_clienteStatus 
											   order by interesse_clienteData asc';
							
							try{
								$query_inboxAdmin = $conecta->prepare($sql_inboxAdmin);
								$query_inboxAdmin->bindValue(':interesse_clienteStatus',$interesse_clienteStatus,PDO::PARAM_STR);
								$query_inboxAdmin->execute();
								$resultado_inboxAdmin = $query_inboxAdmin->fetchAll(PDO::FETCH_ASSOC);
								
							}catch(PDOException $error_inboxAdmin){
								echo 'Erro ao selecionar pendentes' .$error_inboxAdmin;
							}
							
							foreach($resultado_inboxAdmin as $res_inboxAdmin){
									$emailId		 	= $res_inboxAdmin['email_id'];
									$clienteId		 	= $res_inboxAdmin['clienteId'];
									$emailNome 			= $res_inboxAdmin['interesse_clienteNome'];
									$emailEmail 		= $res_inboxAdmin['interesse_clienteEmail'];
									$emailCidade		= $res_inboxAdmin['interesse_clienteCidade'];
									$emailEstado		= $res_inboxAdmin['interesse_clienteEstado'];
									$emailTelefone 		= $res_inboxAdmin['interesse_clienteTelefone'];
									$emailDetalhes		= $res_inboxAdmin['interesse_clienteDetalhes'];
									$emailData	 		= $res_inboxAdmin['interesse_clienteData'];
									$emailStatus 		= $res_inboxAdmin['interesse_clienteStatus'];
									$i++;
									if($i % 2 == 0){
										$cor = 'style="background:#F4F4F4;"';										
									} else {
										$cor = 'style="background:#CECEBF"';
									}
						?>
                          <tr <?php echo $cor;?>>
                          <td align="center"><?php echo date('d/m/Y H:i',strtotime($emailData)).'h';?></td>
                          <td align="center"><?php echo $emailId;?></td>
                          <td align="center"><?php echo $emailEmail;?></td>
	                     <td align="center"><a href="painel.php?exe=adminInboxInteresse/resposta&emailId=<?php echo $emailId ;?>" class=		
                         							"visualizar-responder"> Visualizar / Responder</a></td>
                        </tr>
                        <?php 
						} // Final do ForEach
						?>
                 	 </table>
			  </div> <!-- fim div inbox-->
                
          </div><!-- fim div content conteudo-->
        </div> <!-- fim div content -->
		<?php include_once("footer.php")?> 
</body>
</html>
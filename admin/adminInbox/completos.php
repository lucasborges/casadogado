<?php include_once("sistema/restrito_admin.php");?>
<?php include_once("sistema/validar_user.php");?>
<?php include_once("header.php");?>
        <div id="local"> <!-- Inicio div local-->
    	   <div class="caminho"> Onde Estou: Portal do Gado &raquo;Painel de Controle &raquo; Emails Respondidos </div>
 	       <div class="welcome"> Olá <?php echo $clienteNome ?>| Hoje <?php echo date('d/m/Y H:i').h ?> | <a href="deslogar.php">Deslogar</a></div>
        </div> <!-- fim div local-->
        
        <div id="content"><!-- inicio div content-->
			<?php include_once("menu.php")?>      
            
        	<div id="content_conteudo"><!-- inicio div content conteudo-->   
<?php include_once("sistema/carregando.php")?>

<form name="s_emailAdmin" action="painel.php?exe=adminInbox/search" enctype="multipart/form-data" method="post" class=>

	<label> 
    	<input type="text" name="s" size="50"/>
        <input type="submit" name="executar" id="executar" value="Pesquisar pelo nome"/>
    </label>


</form>
            	<div class="inbox" > <!-- inicio div inbox-->   
       	  		      <table width="100%" border="0" cellspacing="3" cellpadding="0">
                        <tr style="background:#346700; color:#fff;font:12px 'Trebuchet MS', Arial, Helvetica, sans-serif;font-weight:bold;">
                          <td align="center">DATA:</td>
                          <td align="center">NOME:</td>
                          <td align="center">EMAIL:</td>
                          <td align="center">EXECUTAR:</td>
                        </tr>
                        
    <?php 					
		$pag = "$_GET[pag]";
		if($pag >= '1'){
			 $pag = $pag;
		}else{
			 $pag = '1';
		}
							
		$maximo = '15'; //RESULTADOS POR PÁGINA
		$inicio = ($pag * $maximo) - $maximo;
						
		$emailStatus = 'completo';
		$sql_inboxAdmin = 'select * from portal_mailAdmin where emailStatus = :emailStatus order by emailData asc limit '.$inicio. ','.$maximo;
							
							try{
								$query_inboxAdmin = $conecta->prepare($sql_inboxAdmin);
								$query_inboxAdmin->bindValue(':emailStatus',$emailStatus,PDO::PARAM_STR);
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
									if($i % 2 == 0){
										$cor = 'style="background:#F4F4F4;"';										
									} else {
										$cor = 'style="background:#CECEBF"';
									}
						?>
                          <tr <?php echo $cor;?>>
                          <td align="center"><?php echo date('d/m/Y H:i',strtotime($emailData)).'h';?></td>
                          <td align="center"><?php echo $emailNome;?></td>
                          <td align="center"><?php echo $emailEmail;?></td>
	                     <td align="center"><a href="painel.php?exe=adminInbox/ver&emailId=<?php echo $emailId ;?>" class=		
                         							"visualizar-responder"> Visualizar</a></td>
                        </tr>
                        <?php 
						} // Final do ForEach
						?>
                 	 </table>
                     
<?php

include("../Connections/painel_config.php");

//USE A MESMA SQL QUE QUE USOU PARA RECUPERAR OS RESULTADOS
//SE TIVER A PROPRIEDADE WHERE USE A MESMA TAMBÉM

$sql_res = mysql_query("select * from portal_mailAdmin where emailStatus = 'completo' order by emailData asc");
$total = mysql_num_rows($sql_res);
$paginas = ceil($total/$maximo);
$links = '5'; //QUANTIDADE DE LINKS NO PAGINATOR

echo "<a href=\"painel.php?exe=adminInbox/completos&amp;pag=1\">Primeira Página</a>&nbsp;&nbsp;&nbsp;";

	for ($i = $pag-$links; $i <= $pag-1; $i++){
		if ($i <= 0){
		}else{
			echo"<a href=\"painel.php?exe=adminInbox/completos&amp;pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";
		}
	}
	
	echo "$pag &nbsp;&nbsp;&nbsp;";

	for($i = $pag +1; $i <= $pag+$links; $i++){
		if($i > $paginas){
		}else{
			echo "<a href=\"painel.php?exe=adminInbox/completos&amp;pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";
		}
	}
	echo "<a href=\"painel.php?exe=adminInbox/completos&amp;pag=$paginas\">Última página</a>&nbsp;&nbsp;&nbsp;";
?>

			  </div> <!-- fim div inbox-->
          </div><!-- fim div content conteudo-->
        </div> <!-- fim div content -->
		<?php include_once("footer.php")?> 
</body>
</html>
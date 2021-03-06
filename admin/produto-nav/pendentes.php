<?php include_once("sistema/restrito_all.php");?>
<?php include_once("sistema/validar_user.php");?>
<?php include_once("header.php");?>
        <div id="local"> <!-- Inicio div local-->
    	   <div class="caminho"> Onde Estou: Portal do Gado &raquo;Painel de Controle. </div>
 	       <div class="welcome"> Olá <?php echo $clienteNome ?>| Hoje <?php echo date('d/m/Y H:i').h ?> | <a href="deslogar.php">Deslogar</a></div>
        </div> <!-- fim div local-->
        
        <div id="content"><!-- inicio div content-->
            
			<?php include_once("menu.php")?>      
            
        	<div id="content_conteudo"><!-- inicio div content conteudo-->       
				<?php include_once("sistema/carregando.php")?>
        
            
            	<table width="100%" border="0" cellspacing="3" cellpadding="0">
                      <tr style="background:#346700; color:#fff;font:12px 'Trebuchet MS', Arial, Helvetica, sans-serif;font-weight:bold;">
                       <td align="center">Anuncio ID</td>
                       <td align="center">Titulo</td>
                       <td align="center">Cadastro em:</td>
                       <td align="center">Status</td>
                     </tr>
               <?php
			   $produtoStatus = 'pendente';
			   $sql_buscaAtivos = 'SELECT * FROM portal_produto 
			   						WHERE clienteID = :clienteId 
									AND produtoStatus = :produtoStatus 
			   						ORDER BY produtoCadastro asc';
			   
			   try{
				   $query_buscaAtivos = $conecta->prepare($sql_buscaAtivos);
				   $query_buscaAtivos->bindValue(':clienteId',$clienteId,PDO::PARAM_STR);
				   $query_buscaAtivos->bindValue(':produtoStatus',$produtoStatus,PDO::PARAM_STR);
				   $query_buscaAtivos->execute();
				   $resultado_buscaAtivos = $query_buscaAtivos->fetchAll(PDO::FETCH_ASSOC);
				}catch(PDOexception $errorBuscaAtivos){
					echo 'Erro buscar anuncios ativos!';
				}
				
				foreach($resultado_buscaAtivos as $resAtivos){
					$produtoId 			= $resAtivos['produtoID'];
					$produtoTitulo 		= $resAtivos['produtoTitulo'];
					$produtoCadastro 	= $resAtivos['produtoCadastro'];
					$produtoVisitas 	= $resAtivos['produtoVisitas'];
					$i++;
									if($i % 2 == 0){
										$cor = 'style="background:#F4F4F4;"';										
									} else {
										$cor = 'style="background:#CECEBF"';
									}
			   
			   
			   ?>
                     <tr <?php echo $cor;?>>
                       <td align="center"><?php echo $produtoId?></td>
                       <td align="center"><?php echo $produtoTitulo?></td>
                       <td align="center"><?php echo date('d/m/y',strtotime($produtoCadastro))?></td>
                       <td align="center">Aguardando Aprovação</td>
                     </tr>
                     
                <?php
				}
				?>
                     
            	</table>
            
                 </div><!-- fim div content conteudo-->    
            
        	</div> <!-- fim div content -->
	
		<?php include_once("footer.php")?> 
</body>
</html>
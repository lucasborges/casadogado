<?php include_once("sistema/restrito_admin.php");?>
<?php include_once("sistema/validar_user.php");?>
<?php include_once("header.php");?>
        <div id="local"> <!-- Inicio div local-->
    	   <div class="caminho"> Onde Estou: Portal do Gado &raquo;Painel de Controle &raquo;Anuncios Pendentes </div>
 	       <div class="welcome"> Olá <?php echo $clienteNome ?>| Hoje <?php echo date('d/m/Y H:i').h ?> | <a href="deslogar.php">Deslogar</a></div>
        </div> <!-- fim div local-->
        
        <div id="content"><!-- inicio div content-->
            
			<?php include_once("menu.php")?>      
            
        	<div id="content_conteudo"><!-- inicio div content conteudo-->       
			<?php include_once("sistema/carregando.php")?>
            
            <table width="100%" border="0" cellspacing="3" cellpadding="0">
                      <tr style="background:#346700; color:#fff;font:12px 'Trebuchet MS', Arial, Helvetica, sans-serif;font-weight:bold;">
                      <td align="center">Cliente ID</td>
                      <td align="center">Anuncio ID</td>
                      <td align="center">Titulo</td>
                      <td align="center">Cadastro em:</td>
                      <td align="center">Status:</td>
                      <td align="center">Executar</td>
                     </tr>
               <?php
			   $produtoStatus = 'vendido';
			   $sql_buscaAtivos = 'SELECT * FROM portal_produto 
			   						WHERE produtoStatus <> :produtoStatus 
			   						ORDER BY produtoCadastro asc, produtoStatus asc';
			   
			   try{
				   $query_buscaAtivos = $conecta->prepare($sql_buscaAtivos);
				   $query_buscaAtivos->bindValue(':produtoStatus',$produtoStatus,PDO::PARAM_STR);
				   $query_buscaAtivos->execute();
				   $resultado_buscaAtivos = $query_buscaAtivos->fetchAll(PDO::FETCH_ASSOC);
				}catch(PDOexception $errorBuscaAtivos){
					echo 'Erro buscar anuncios ativos!';
				}
				
				foreach($resultado_buscaAtivos as $resAtivos){
					$clienteId 			= $resAtivos['clienteID'];
					$produtoId 			= $resAtivos['produtoID'];
					$produtoTitulo 		= $resAtivos['produtoTitulo'];
					$produtoCadastro 	= $resAtivos['produtoCadastro'];
					$produtoVisitas 	= $resAtivos['produtoVisitas'];
					$produtoStatus		= $resAtivos['produtoStatus'];
					$i++;
					if($i % 2 == 0){
						$cor = 'style="background:#F4F4F4;"';										
					} else {
						$cor = 'style="background:#CECEBF"';
					}
			   
			   
			   ?>
                     <tr <?php echo $cor;?>>
                       <td align="center"><?php echo $clienteId?></td>
                       <td align="center"><?php echo $produtoId?></td>
                       <td align="center"><?php echo $produtoTitulo?></td>
                       <td align="center"><?php echo date('d/m/y',strtotime($produtoCadastro))?></td>
                       <td align="center"><?php echo $produtoStatus ?> </td>                       
                       <td align="center"><a href="painel.php?exe=admin-produtos/pendentes_single&editarAnuncio=<?php echo $produtoId ?>"> Editar</a></td>
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
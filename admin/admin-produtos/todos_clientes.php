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
                      <td align="center">Nome</td>
                      <td align="center">CPF</td>
                      <td align="center">Operadora Celular</td>
                      <td align="center">Telefone:</td>
                      <td align="center">Status:</td>
                      <td align="center">Executar</td>
                     </tr>
               <?php
			  
			   $sql_buscaAtivos = 'SELECT * FROM portal_cliente
			   						WHERE usuarioNivel <> "admin"
			   						ORDER BY criadoEm asc';
			   
			   try{
				   $query_buscaAtivos = $conecta->prepare($sql_buscaAtivos);
				   $query_buscaAtivos->execute();
				   $resultado_buscaAtivos = $query_buscaAtivos->fetchAll(PDO::FETCH_ASSOC);
				}catch(PDOexception $errorBuscaAtivos){
					echo 'Erro buscar anuncios ativos!';
				}
				
				foreach($resultado_buscaAtivos as $resAtivos){
					$usuarioId			= $resAtivos['usuarioId'];
					$nome	 			= $resAtivos['nome'];
					$cpf	 			= $resAtivos['cpf'];
					$operadora		 	= $resAtivos['operadora'];
					$telefone		 	= $resAtivos['telefone'];
					$status				= $resAtivos['usuarioStatus'];
					$i++;
					if($i % 2 == 0){
						$cor = 'style="background:#F4F4F4;"';										
					} else {
						$cor = 'style="background:#CECEBF"';
					}
			   
			   
			   ?>
                     <tr <?php echo $cor;?>>
                       <td align="center"><?php echo $nome?></td>
                       <td align="center"><?php echo $cpf?></td>
                       <td align="center"><?php echo $operadora?></td>
                       <td align="center"><?php echo $telefone?></td>       
                       <td align="center"><?php echo $status?></td>       
                                  
                       <td align="center"><a href="painel.php?exe=admin-produtos/editarUsuario&usuarioId=<?php echo $usuarioId?>&nome=<?php echo $nome?>&cpf=<?php echo $cpf ?>&operadora=<?php echo $operadora?>&telefone=<?php echo $telefone?>&status=<?php echo $status?>"> Editar</a></td>
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
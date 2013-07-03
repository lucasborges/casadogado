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
                      <td align="center">Notica ID</td>
                      <td align="center">Titulo</td>
                      <td align="center">Cadastro em:</td>
                      <td align="center">Deletar</td>
                      <td align="center">Editar</td>
                     </tr>
               <?php
			   $sql_buscaNoticias = 'SELECT * FROM portal_anuncios ORDER BY anunciosID desc';
			   
			   try{
				   $query_buscaNoticas = $conecta->prepare($sql_buscaNoticias);
				   $query_buscaNoticas->bindValue(':produtoStatus',$produtoStatus,PDO::PARAM_STR);
				   $query_buscaNoticas->execute();
				   $resultado_buscaNoticas = $query_buscaNoticas->fetchAll(PDO::FETCH_ASSOC);
				}catch(PDOexception $errorBuscaNoticias){
					echo 'Erro buscar anuncios ativos -> '.$errorBuscaNoticias;
				}
				
				foreach($resultado_buscaNoticas as $resNoticias){
					$anunciosID 		= $resNoticias['anunciosID'];
					$anuncios_titulo 	= $resNoticias['anuncios_titulo'];
					$anuncios_dt 		= $resNoticias['anuncios_dt'];
					$i++;
					if($i % 2 == 0){
						$cor = 'style="background:#F4F4F4;"';										
					} else {
						$cor = 'style="background:#CECEBF"';
					}
			   
			   
			   ?>
                     <tr <?php echo $cor;?>>
                       <td align="center"><?php echo $anunciosID?></td>
                       <td align="center"><?php echo $anuncios_titulo?></td>
                       <td align="center"><?php echo date('d/m/y',strtotime($anuncios_dt))?></td>
     <td align="center"><a href="painel.php?exe=adminNoticias/noticias_single&editarAnuncio=<?php echo $anunciosID ?>"> Editar</a></td>     <td align="center"><a href="painel.php?exe=adminNoticias/noticias_single&excluirAnuncio=<?php echo $anunciosID ?>"> Excluir</a></td>
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
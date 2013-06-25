<?php include_once("sistema/restrito_all.php");?>
<?php include_once("sistema/validar_user.php");?>
<?php include_once("header.php");?>
        <div id="local"> <!-- Inicio div local-->
    	   <div class="caminho"> Onde Estou: Portal do Gado &raquo;Painel de Controle &raquo;Cadastrar Produto </div>
 	       <div class="welcome"> Olá <?php echo $clienteNome ?>| Hoje <?php echo date('d/m/Y H:i').h ?> | <a href="deslogar.php">Deslogar</a></div>
        </div> <!-- fim div local-->
        
        <div id="content"><!-- inicio div content-->
            
			<?php include_once("menu.php")?>      
            
        	<div id="content_conteudo"><!-- inicio div content conteudo-->     
              <BR/>
  <h2><strong>Obrigado por anunciar com o Portal do Gado.</strong></h2> <BR/>
  <p>Seu cadastro esta como <strong style="color:blue;">PENDENTE</strong>. Entenda abaixo os próximos passos!</p>
   <BR/>
  <p><strong style="color:blue;">&raquo; PENDENTE:</strong> o anuncio foi cadastrado e esta aguardando moderação. Ou seja, nossa equipe vai conferir as informações do anuncio. </p> <p>
  </p>
  <p>
  Assim que conferido se estiver tudo certo seu status será alterado para <strong style="color:blue;">ATIVO</strong>!</p>
  
   <BR/>
 
     <h2><strong>Seu anúncio pode ser visto na página Anúncios pendentes!</strong></h2> <br/>
            </div><!-- fim div content conteudo-->
        </div> <!-- fim div content -->
		<?php include_once("footer.php")?> 
</body>
</html>
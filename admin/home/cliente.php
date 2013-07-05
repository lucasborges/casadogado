<?php include_once("sistema/restrito_all.php");?>
<?php include_once("sistema/validar_user.php");?>
<?php include_once("header.php");?>

   
      <div id="local"> <!-- Inicio div local-->
       	<div class="caminho"> Onde Estou: Portal do Gado &raquo;Painel de Controle. </div>
        <div class="welcome"> Olá <?php echo $clienteNome ?>| Hoje <?php echo date('d/m/Y H:i').h ?> | <a href="deslogar.php">Deslogar</a></div>      </div> <!-- fim div local-->
        
        <div id="content"><!-- inicio div content-->
            
			<?php include_once("menu.php")?>      
            
        	<div id="content_conteudo"><!-- inicio div content conteudo-->       
            	Cliente
            </div><!-- fim div content conteudo-->
            
        </div> <!-- fim div content -->
		<?php include_once("footer.php");
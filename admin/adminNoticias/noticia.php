<?php include_once("sistema/restrito_admin.php");?>
<?php include_once("sistema/validar_user.php");?>
<?php include_once("header.php");?>
        <div id="local"> <!-- Inicio div local-->
    	   <div class="caminho"> Onde Estou: Portal do Gado &raquo;Painel de Controle; &raquo; Criar Notícias </div>
 	       <div class="welcome"> Olá <?php echo $clienteNome ?>| Hoje <?php echo date('d/m/Y H:i').h ?> | <a href="deslogar.php">Deslogar</a></div>
        </div> <!-- fim div local-->
        
        <div id="content"><!-- inicio div content-->
            
			<?php include_once("menu.php")?>      
            
        	<div id="content_conteudo"><!-- inicio div content conteudo-->       
			<?php include_once("sistema/carregando.php")?>            
	            <h4>Criar Anúncio</h4>
                <br />
 <form name="cadastraNoticia" id="cadastraNoticia" action="" method="post" enctype="multipart/form-data">
 	<label>
      	<span> Titulo do Anúncio:</span>
        <input type="text" name="titulo" size="130" />
    </label>   
        <br />
    <label>
    	<span> Mensagem:</span>
    	<textarea rows="15" cols="128" name="msg"> </textarea>
    </label>   	
                         
   
          
         
 <?php         
 if(isset($_POST['executar']) && $_POST['executar'] == 'Enviar'){ // Inicio IF
 	$titulo = strip_tags(trim($_POST['titulo']));
	$msg = strip_tags(trim($_POST['msg']));
	$dataCadastro = date('Y-m-d H:m:s');
	
	$sql_cadastraAnuncio = "INSERT INTO portal_anuncios ( 	anuncios_titulo, 
														 	anuncios_msg, 
															anuncios_dt 
														)
														VALUES(
															:titulo,
															:msg,
															:dataCadastro
														)";
	try{													
		$query_cadastraAnuncio = $conecta->prepare($sql_cadastraAnuncio);
		$query_cadastraAnuncio->bindValue(':titulo',$titulo,PDO::PARAM_STR);
		$query_cadastraAnuncio->bindValue(':msg',$msg,PDO::PARAM_STR);	
		$query_cadastraAnuncio->bindValue(':dataCadastro',$dataCadastro,PDO::PARAM_STR);
		$query_cadastraAnuncio->execute();
		echo '<div class="ok"> Anuncio cadastrado com sucesso! </div>';
	}catch(PDOexception $error_cadastraAnuncio){
		echo $sql_cadastraAnuncio.'</br>'; 
		echo 'Erro ao cadastar '.$error_cadastraAnuncio->getMessage();
	}	
 }
 ?>
  <input type="submit" name="executar" id="executar" value="Enviar" style="float:right; margin-right:50px;">
  </form>
        </div><!-- fim div content conteudo-->
        </div> <!-- fim div content -->
		<?php include_once("footer.php")?> 
</body>
</html>
<?php include_once("sistema/restrito_admin.php");?>
<?php include_once("sistema/validar_user.php");?>
<?php include_once("header.php");?>
<div id="local">
   <div class="caminho">Onde Estou: UpImóveis &raquo; Painel de Controle</div><!--caminho-->
   <div class="welcome">Olá <?php echo $clienteNome;?>| Hoje <?php echo date('d/m/Y H:i').'h';?> | <a href="deslogar.php">Deslogar</a></div><!--welcome-->
</div><!--local-->
   
<div id="content">

<?php include_once("menu.php");?>     

   <div id="content_conteudo">
   
   
<?php include_once("sistema/carregando.php");?>

	<?php
	
		if(isset($_GET['excluirAnuncio'])){
			 $anunciosID = $_GET['excluirAnuncio']; 
			 
			 $sql_editNoticia = 'DELETE FROM portal_anuncios where anunciosID 	= :anuncioID';
				try{
					$query_editNoticia = $conecta->prepare($sql_editNoticia);
					$query_editNoticia->bindValue(':anuncioID',$anunciosID,PDO::PARAM_STR);
					$query_editNoticia->execute();
					echo '<div class="ok"> Anúncio excluído com sucesso! </div>';
					}catch(PDOexception $error_sqlNoticia){
					echo 'Erro ao atulizar o anuncio' .$error_sqlNoticia;
				}
		}else{
	
	//}

    // <?php
		if(isset($_POST['executar']) && $_POST['executar'] == 'Editar'){ // Inicio IF
			$anuncioID 		= strip_tags(trim($_POST['anuncioID']));
			$editTitulo 	= strip_tags(trim($_POST['editTitulo']));
			$editDesc		= strip_tags(trim($_POST['editDesc']));
			$sql_editNoticia = 'UPDATE portal_anuncios SET 	anuncios_titulo 	= :editTitulo, 
															anuncios_msg 		= :editDesc
															where anunciosID 	= :anuncioID';
			try{
				$query_editNoticia = $conecta->prepare($sql_editNoticia);
				$query_editNoticia->bindValue(':editTitulo',$editTitulo,PDO::PARAM_STR);
				$query_editNoticia->bindValue(':editDesc',$editDesc,PDO::PARAM_STR);
				$query_editNoticia->bindValue(':anuncioID',$anuncioID,PDO::PARAM_STR);
				$query_editNoticia->execute();
				echo '<div class="ok"> Anúncio atualizado com sucesso! </div>';
				}catch(PDOexception $error_sqlNoticia){
				echo 'Erro ao atulizar o anuncio' .$error_sqlNoticia;
			}
		}
		?>

		<?php
	  		 $anunciosID = $_GET['editarAnuncio']; 
			 
			  $sql_buscaNoticias = 'SELECT * FROM portal_anuncios WHERE anunciosID = :anunciosID';
			   				   
			   try{
				   $query_buscaNoticias = $conecta->prepare($sql_buscaNoticias);
				   $query_buscaNoticias->bindValue(':anunciosID',$anunciosID,PDO::PARAM_STR);
				   $query_buscaNoticias->execute();
				   $resultado_buscaNoticias = $query_buscaNoticias->fetchAll(PDO::FETCH_ASSOC);
				}catch(PDOexception $errorBuscaAtivos){
					echo 'Erro buscar anuncios ativos!';
				}
				
				foreach($resultado_buscaNoticias as $resNoticias){
					$anunciosID 		= $resNoticias['anunciosID'];
					$anuncios_titulo	= $resNoticias['anuncios_titulo'];
					$anuncios_msg 		= $resNoticias['anuncios_msg'];
					$i++;
					if($i % 2 == 0){
						$cor = 'style="background:#F4F4F4;"';										
					} else {
						$cor = 'style="background:#CECEBF"';
					}
				}
	?>
    
      <form name="editar_anuncio" id="editar_anuncio" action="" enctype="multipart/form-data" method="post">
    
     <label>
        <span>Anuncio ID:</span>
        <input type="hidden" name="anuncioID"  value="<?php echo $anunciosID ?>" size="128" />
        <input type="text" name="anuncioIDAux"  disabled="disabled" value="<?php echo $anunciosID ?>" size="128" />
      </label>
         
      <label>
        <span>Titulo do anúncio:</span>
        <input type="text" name="editTitulo" value="<?php echo $anuncios_titulo ?>" size="128" />
      </label>
      
      <label>
        <span>Mensagem: <strong </strong></span>
        <textarea name="editDesc" cols="128" rows="5"> <?php echo $anuncios_msg ?></textarea>
      </label>
      <input type="submit" name="executar" id="executar" value="Editar" style="width:100px;float:right;margin-right:45px;" />
    </form>
   <?php 
   		}
   ?>


   </div><!--conteudo-->

</div><!--contet-->
     
<?php include_once("footer.php");?>
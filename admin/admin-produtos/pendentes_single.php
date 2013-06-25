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
	 	if(isset($_POST['executar']) && ($_POST['executar'] == 'Aprovar Anúncio' ||$_POST['executar'] == 'Editar')){ // Inicio IF
	 		$editTitulo 		= $_POST['editTitulo'];
			$editTipo			= $_POST['editTipo'];
			$editIdade			= $_POST['editIdade'];
			$editValorVista		= $_POST['editValorVista'];
			$editValorPrazo		= $_POST['editValorPrazo'];
			$editDesc			= $_POST['editDesc'];
			$editSexo			= $_POST['editSexo'];
			$editQtd			= $_POST['editQtd'];
			$editCidade			= $_POST['editCidade'];
			$editEstado			= $_POST['editEstado'];
			
			$sql_editAnuncio = 'UPDATE  portal_produto SET 	produtoTitulo 		= :editTitulo, 
															produtoTipo 		= :editTipo,
															produtoIdade 		= :editIdade,
															produtoValorAvista 	= :editValorVista,
															produtoValorPrazo 	= :editValorPrazo,
															produtoStatus		= :editStatus,															
															produtoDescricao	= :editDesc,
															produtoSexo			= :editSexo,
															produtoQuantidade	= :editQtd,
															produtoCidade		= :editCidade,
															produtoEstado		= :editEstado
														where produtoID = :produtoId';
														
			try{
				$query_editAnuncio = $conecta->prepare($sql_editAnuncio);
				$query_editAnuncio->bindValue(':editTitulo',$editTitulo,PDO::PARAM_STR);
				$query_editAnuncio->bindValue(':editTipo',$editTipo,PDO::PARAM_STR);
				$query_editAnuncio->bindValue(':editIdade',$editIdade,PDO::PARAM_STR);
				$query_editAnuncio->bindValue(':editValorVista',$editValorVista,PDO::PARAM_STR);
				$query_editAnuncio->bindValue(':editValorPrazo',$editValorPrazo,PDO::PARAM_STR);
				$query_editAnuncio->bindValue(':editStatus','ativos',PDO::PARAM_STR);
				$query_editAnuncio->bindValue(':editDesc',$editDesc,PDO::PARAM_STR);
				$query_editAnuncio->bindValue(':editSexo',$editSexo,PDO::PARAM_STR);
				$query_editAnuncio->bindValue(':editQtd',$editQtd,PDO::PARAM_STR);
				$query_editAnuncio->bindValue(':editCidade',$editCidade,PDO::PARAM_STR);
				$query_editAnuncio->bindValue(':editEstado',$editEstado,PDO::PARAM_STR);
				$query_editAnuncio->bindValue(':produtoId',$produtoId,PDO::PARAM_STR);
				$query_editAnuncio->execute();
				echo '<div class="ok"> Produto atualizado com sucesso! </div>';
				
				
				}catch(PDOexception $error_sqlAnuncio){
				echo 'Erro ao atulizar o anuncio' .$error_sqlAnuncio;
			}
		}
	 ?>



       <?php
	   
	  		 $produtoId = $_GET['editarAnuncio']; 
			 
			 if($produtoId == ''){
			   	$produtoId = $_GET['anuncio'];
			 }
			   
			   
			   
			   $sql_buscaAtivos = 'SELECT * FROM portal_produto 
			   						WHERE produtoID = :produtoId 
			   						ORDER BY produtoCadastro asc';
			   
			   try{
				   $query_buscaAtivos = $conecta->prepare($sql_buscaAtivos);
				   $query_buscaAtivos->bindValue(':produtoId',$produtoId,PDO::PARAM_STR);
				   $query_buscaAtivos->execute();
				   $resultado_buscaAtivos = $query_buscaAtivos->fetchAll(PDO::FETCH_ASSOC);
				}catch(PDOexception $errorBuscaAtivos){
					echo 'Erro buscar anuncios ativos!';
				}
				
				foreach($resultado_buscaAtivos as $resAtivos){
					$clienteId 			= $resAtivos['clienteID'];
					$editImagem			= $resAtivos['produtoImg'];
					$editTitulo 		= $resAtivos['produtoTitulo'];
					$editTipo			= $resAtivos['produtoTipo'];
					$editIdade			= $resAtivos['produtoIdade'];
					$editValorVista		= $resAtivos['produtoValorAvista'];
					$editValorPrazo		= $resAtivos['produtoValorPrazo'];
					$editDesc			= $resAtivos['produtoDescricao'];
					$editSexo			= $resAtivos['produtoSexo'];
					$editQtd			= $resAtivos['produtoQuantidade'];
					$editCidade			= $resAtivos['produtoCidade'];
					$editEstado			= $resAtivos['produtoEstado'];
					$editCadastro 		= $resAtivos['produtoCadastro'];
					$editVisitas 		= $resAtivos['produtoVisitas'];
					$i++;
					if($i % 2 == 0){
						$cor = 'style="background:#F4F4F4;"';										
					} else {
						$cor = 'style="background:#CECEBF"';
					}
				}
	
	?>
       	<h3 class="titulo">Id do Anuncio: <strong><?php echo $produtoId;?></strong> | id do cliente: <?php echo $clienteId;?> | Cadastro em: 
		<?php echo date('d/m/Y H:m',strtotime($editeCadastro)); ?>h</h3>
       
        <span class="exibir"><img src="../midias/<?php echo $editImagem;?>" alt="" width="100"/></span> 
		<!--	<video id="my_video_1" class="video-js vjs-default-skin" controls preload="auto" width="100" height="60" 	poster="my_video_poster.png" 		
            data-setup="{}">
			<source src=video/</div>/?php echo $editImagem;?> type="video/mp4">
		</video> -->
       
    
        
        
    <form name="anuncios_aprovar" action="" enctype="multipart/form-data" method="post">
   
      <label>
        <span>Titulo do anúncio:</span>
        <input type="text" name="editTitulo" value="<?php echo $editTitulo ?>" size="128" />
      </label>
      
      <label>
        <span>Tipo: <strong </strong></span>
        <input type="text" name="editTipo" value="<?php echo $editTipo ?>" size="128" />
      </label>
        
        <label>
        <span>Sexo: <strong></strong></span>
          <input type="text" name="editSexo" value="<?php echo $editSexo ?>" size="128" />
      </label>
      
       <label>
        <span>Idade: <strong></strong></span>
          <input type="text" name="editIdade" value="<?php echo $editIdade ?>" size="128" />
      </label>
      
      <label>
        <span>Quantidade: <strong></strong></span>
          <input type="text" name="editQtd" value="<?php echo $editQtd ?>" size="128" />
      </label>
      
       <label>
        <span>Cidade: <strong></strong></span>
          <input type="text" name="editCidade" value="<?php echo $editCidade ?>" size="128" />
      </label>
      
       <label>
        <span>Estado: <strong></strong></span>
          <input type="text" name="editEstado" value="<?php echo $editEstado ?>" size="128" />
      </label>
      
      </label>
      	  <span>Valor à vista: <strong></strong></span>
          <input type="text" name="editValorVista" value="<?php echo $editValorVista ?>" size="128" />
         
      <label>
        <span>Valor à prazo:</span>
         <input type="text" name="editValorPrazo" value="<?php 
		 if($editValorPrazo == ''){
			 $editValorPrazo = 'Não informado';
		 }
		 echo $editValorPrazo;
		 ?>" size="128" />
      </label>
      
      <label>
        <span>Descrição:</span>
        <textarea name="editDesc" cols="125" rows="5"> <?php echo $editDesc ?></textarea>
      </label>
	<input type="hidden" name="produtoId" value="<?php echo $produtoId ?>" />
    <?php
		$editar = $_GET['editarAnuncio']; 
		if($editar == ''){
	?>
		<input type="submit" name="executar" id="executar" value="Aprovar Anúncio" />
	<?php
		}else{
			?>
		<input type="submit" name="executar" id="executar" value="Editar" style="width:100px;" />
        <?php
		}
	?>

    </form>
   <h1>Imagens do anúncio!</h1> 
	 <div class="galeria"> <!--inicio div galeria-->
     
     <?php
		if(isset($_POST['executar']) && $_POST['executar'] == 'Excluir'){ // Inicio IF
			$midiaId = $_POST['midiaId'];
			$produtoMidia = $_POST['produtoMidia'];
			$produtoId = $_POST['produtoId'];
			$sql_deleta = 'DELETE FROM portal_midias WHERE midiaId = :midiaId';
			try{
				$query_deletaImagem = $conecta->prepare($sql_deleta);
				$query_deletaImagem-> bindValue(':midiaId',$midiaId,PDO::PARAM_STR);
				$query_deletaImagem->execute();
				
				$pastaDel = '../midias';				
				unlink($pastaDel.'/'.$produtoMidia);
				echo '<div class="ok"> Excluída </div>';
			}catch(PDOexception $errorDelImg){
				echo 'Erro ao excluir a Imagem ->'. $errorDelImg;
			}
		}
	?>
     
     
   		 <?php 
		
		 $produtoId = $_GET['editarAnuncio']; 
			 
			 if($produtoId == ''){
			   	$produtoId = $_GET['anuncio'];
			 }
		$sql_buscaImagem = 'SELECT * FROM PORTAL_MIDIAS WHERE produtoId = :produtoId';
		try{
			$query_buscaImagem = $conecta->prepare($sql_buscaImagem);
			$query_buscaImagem-> bindValue(':produtoId',$produtoId,PDO::PARAM_STR);
			$query_buscaImagem->execute();
			$resultado_buscaImagem = $query_buscaImagem->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOexception $errorbuscaImagem){
			echo 'Erro ao selecionar Imagems';
		}
		
		foreach($resultado_buscaImagem as $resImagem){
			$midiaId = $resImagem['midiaId'];
			$produtoMidia = $resImagem['produtoMidia'];
			$produtoId		=$resImagem['produtoId'];
			
			
		
	?>
           <div class="galeria_cadastro"> <!-- Galeria Cadastro -->
                        <span class="imagem"> <img src="../midias/<?php echo $produtoMidia?>" width="100" alt="Exibição" /></	
                        span>
                    <form name="excluirImagem" action="" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="midiaId" value="<?php echo $midiaId?>"/>
                        <input type="hidden" name="produtoMidia" value="<?php echo $produtoMidia?>"/>
                        <input type="hidden" name="produtoId" value="<?php echo $produtoId?>"/>
                        <input type="submit" name="executar" id="executar" value="Excluir" />
                    </form>
                </div>
      <?php 
	  }
	?>        
                </div> <!-- fim div galeria -->
    

   </div><!--conteudo-->

</div><!--contet-->
     
<?php include_once("footer.php");?>
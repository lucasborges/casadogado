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
            <?php
			
			 if(isset($_POST['executar']) && $_POST['executar'] == 'Próximo Passo'){ // Inicio IF
				$produtoTitulo 		= strip_tags(trim($_POST['titulo']));
				$produtoTipo 		= strip_tags(trim($_POST['tipo']));
				$produtoIdade 		= strip_tags(trim($_POST['idade']));
				$produtoValorAvista	= strip_tags(trim($_POST['valorVista']));
				$produtoValorPrazo 	= strip_tags(trim($_POST['valorPrazo']));
				$produtoDescricao 	= strip_tags(trim($_POST['descricao'])); 
				$produtoSexo		= strip_tags(trim($_POST['sexo']));
				$produtoQtd			= strip_tags(trim($_POST['qtd']));
				$produtoCidade		= strip_tags(trim($_POST['cidade']));
				$produtoEstado		= strip_tags(trim($_POST['estado']));
				$produtoVisitas 	= '1';
				$produtoCadastro 	= date('Y-m-d H:m:s');
				$produtoUpdate	 	= date('Y-m-d H:m:s');      
				$produtoStatus		= 'pendente';
				
				$imgPermitido		= array('image/jpg','image/jpeg','image/pjpg','IMAGE/JPG','IMAGE/JPEG','IMAGE/PJPG');
				$extension = end(explode(".", $_FILES["img"]["name"]));
				
				if (strtoupper($extension) != "JPG" && strtoupper($extension) != "JPEG" && strtoupper($extension) != "PJPG"){echo('<h3 class="no"><strong>Volte o navegador e cadastre um video permitido para continuar seu cadastro!</strong> </h3><br\>');
echo '<br\><label style="color: blue;">Extensões permitidas: .mov , .avi , .flv , .mpg , .wmv , .3gp e .rm ! </label>';
				die();
				} 
					
				$contarImg	 = count($_FILES["img"]["name"]);
				for ($i=0;$i<$contarImg;$i++){
					$imagemNome 	= $_FILES["img"]["name"];
					$imagemCaminho	= $_FILES["img"]["tmp_name"];
					$imagemTipo		= $_FILES["img"]["type"];
					$produtoPasta	=  '../midias/';
				}		
				if(!empty($imagemNome)){// && in_array($imagemTipo, $imgPermitido)){ // IF IMAGEM
					require("sistema/upload.php");
					$nomeImg = 'cliente='.$clienteId.'-'.md5(uniqid(rand(),true)).'.jpg';
					Redimensionar($imagemCaminho, $nomeImg, 500, $produtoPasta);
				}
				
				
				// Video 
				$allowedExts = array("mp4", "mov", "avi", "flv","mpg", "wmv", "3gp", "rm");
				$extension = end(explode(".", $_FILES["video"]["name"]));
				
				if (strtoupper($extension) != "MOV" && strtoupper($extension != "AVI") && strtoupper($extension) != "FLV" 
				&& strtoupper($extension != "MPG") && strtoupper($extension) != "WMV" && strtoupper($extension) != "3GP" 
				&& strtoupper($extension) != "RM"){
echo('<h3 class="no"><strong>Volte o navegador e cadastre um video permitido para continuar seu cadastro!</strong> </h3><br\>');
echo '<br\><label style="color: blue;">Extensões permitidas: .mov , .avi , .flv , .mpg , .wmv , .3gp e .rm ! </label>';
					die();
				}
				
				$produtoPasta			=  '../videos/';
				$contarVideo			= count( $_FILES["video"]["name"]);
				
						
				if ($_FILES['video']['error'] >0){
					echo('<h3 class="no"> <strong>Erro ao carregar video entre em contato com o portal do gado!</strong> </h3><br\>');
				}
						
				for ($i=0;$i<$contarVideo;$i++){
					$videoNome 	= $_FILES["video"]["name"];
					$videoCaminho 	= $_FILES["video"]["tmp_name"];
					$videoTipo 	= $_FILES["video"]["type"];
					$nomeVideo = 'cliente='.$clienteId.'-'.md5(uniqid(rand(),true)).'.'.strtolower($extension);
					move_uploaded_file($videoCaminho, $produtoPasta . $nomeVideo);
				}
					$sql_cadastraProduto = "INSERT INTO portal_produto (	clienteId,
																			produtoVisitas, 
																			produtoTitulo, 
																			produtoImg, 
																			produtoVideo,
																			produtoTipo, 																						
																			produtoDescricao,
																			produtoSexo,
																			produtoQuantidade,
																			produtoCidade,
																			produtoEstado,
																			produtoValorAvista, 
																			produtoValorPrazo, 
																			produtoIdade,
																			produtoCadastro,
																			produtoUpdate,
																			produtoStatus
																		)
																			VALUES(
																			:clienteId,
																			:produtoVisitas, 
																			:produtoTitulo, 
																			:produtoImg, 
																			:produtoVideo,
																			:produtoTipo, 																						
																			:produtoDescricao, 
																			:produtoSexo,
																			:produtoQuantidade,
																			:produtoCidade,
																			:produtoEstado,
																			:produtoValorAvista, 
																			:produtoValorPrazo, 
																			:produtoIdade,
																			:produtoCadastro,
																			:produtoUpdate,
																			:produtoStatus
																			)";
																			
						try{
							$query_cadastraProduto = $conecta->prepare($sql_cadastraProduto);
							$query_cadastraProduto->bindValue(':clienteId',$clienteId,PDO::PARAM_STR);
							$query_cadastraProduto->bindValue(':produtoVisitas',$produtoVisitas,PDO::PARAM_STR);	
							$query_cadastraProduto->bindValue(':produtoTitulo',$produtoTitulo,PDO::PARAM_STR);	
							$query_cadastraProduto->bindValue(':produtoImg',$nomeImg,PDO::PARAM_STR);
							$query_cadastraProduto->bindValue(':produtoVideo',$nomeVideo,PDO::PARAM_STR);
							$query_cadastraProduto->bindValue(':produtoTipo',$produtoTipo,PDO::PARAM_STR);	
							$query_cadastraProduto->bindValue(':produtoDescricao',$produtoDescricao,PDO::PARAM_STR);	
							$query_cadastraProduto->bindValue(':produtoSexo',$produtoSexo,PDO::PARAM_STR);	
							$query_cadastraProduto->bindValue(':produtoQuantidade',$produtoQtd,PDO::PARAM_STR);	
							$query_cadastraProduto->bindValue(':produtoCidade',$produtoCidade,PDO::PARAM_STR);	
							$query_cadastraProduto->bindValue(':produtoEstado',$produtoEstado,PDO::PARAM_STR);	
							$query_cadastraProduto->bindValue(':produtoValorAvista',$produtoValorAvista,PDO::PARAM_STR);	
							$query_cadastraProduto->bindValue(':produtoValorPrazo',$produtoValorPrazo,PDO::PARAM_STR);	
							$query_cadastraProduto->bindValue(':produtoIdade',$produtoIdade,PDO::PARAM_STR);	
							$query_cadastraProduto->bindValue(':produtoCadastro',$produtoCadastro,PDO::PARAM_STR);	
							$query_cadastraProduto->bindValue(':produtoUpdate',$produtoUpdate,PDO::PARAM_STR);	
							$query_cadastraProduto->bindValue(':produtoStatus',$produtoStatus,PDO::PARAM_STR);	
							$query_cadastraProduto->execute();
						}catch(PDOexception $error_cadastraProduto){
							echo $sql_cadastraProduto.'</br>'; 
							echo 'Erro ao cadastar '.$error_cadastraProduto->getMessage();
						}				
				$produtoId = $conecta->lastInsertId(); // Pega o ultimo ID inserido;
			 }// FIM IF isset
            ?>  
		
		<?php include_once("sistema/carregando.php")?>
        <span style="font:16px 'Trebuchet MS', Arial, Helvetica, sans-serif;color:#346700;" > 1: Informações |<strong> 3: Imagens</strong> </span> 
        
            <?php
				if(isset($_POST['executar']) && $_POST['executar'] == 'Enviar Imagem'){ // Inicio IF
						$produtoId	= $_POST['produtoId'];
						
						try{
							$sql_limitaUpload = 'SELECT * FROM portal_midias WHERE produtoId = :produtoId';
							$query_limitaUpload = $conecta->prepare($sql_limitaUpload);
							$query_limitaUpload-> bindValue(':produtoId',$produtoId,PDO::PARAM_STR);
							$query_limitaUpload->execute();
							$count_limitaUpload = $query_limitaUpload->rowCount(PDO::FETCH_ASSOC);
						}catch(PDOexception $erro_limitaUpload){
							echo 'erro ao limitar Upload';
						}
					
						if ($count_limitaUpload >= 5) {
							echo '<div class="no"> Você já enviou 5 imagens de 5 imagens </div>';
						} else {
							
						//$produtoImg 		=  $_FILES['img'];	
						$imgPermitido		= array('image/jpg','image/jpeg','image/pjpg','IMAGE/JPG','IMAGE/JPEG','IMAGE/PJPG');
						
						$extension = end(explode(".", $_FILES["img"]["name"]));
				
							if (strtoupper($extension) != "JPG" && strtoupper($extension) != "JPEG" && strtoupper($extension) != "PJPG"){
								echo '<div class="no"> Imagem inválida!</div>';
							} else{
								//$contarImg	 = count($produtoImg['name']);
								$contarImg	 = count($_FILES["img"]["name"]);
								require("sistema/upload.php");
								for ($i=0;$i<$contarImg;$i++){
									//$imagemNome 	= $produtoImg['name'][$i];
									//$imagemCaminho 	= $produtoImg['tmp_name'][$i];
									//$imagemTipo 	= $produtoImg['type'][$i];
									$imagemNome 	= $_FILES["img"]["name"];
									$imagemCaminho	= $_FILES["img"]["tmp_name"];
									$imagemTipo		= $_FILES["img"]["type"];
									$produtoPasta	=  '../midias/';
									
									if(!empty($imagemNome)){// && in_array($imagemTipo, $imgPermitido)){ // IF IMAGEM
										$nome = 'cliente='.$clienteId.'-'.md5(uniqid(rand(),true)).'.jpg';
										Redimensionar($imagemCaminho, $nome, 500, $produtoPasta);
										$sql_cadastraMidia = 'INSERT INTO portal_midias (	produtoId, 
																							produtoMidia
																						) Values (
																							:produtoId,
																							:nome																			
																						)';
																						
										try{
											$query_cadastraMidia = $conecta->prepare($sql_cadastraMidia);
											$query_cadastraMidia-> bindValue(':produtoId',$produtoId,PDO::PARAM_STR);
											$query_cadastraMidia-> bindValue(':nome',$nome,PDO::PARAM_STR);
											$query_cadastraMidia->execute();
											echo '<div class="ok"> Imagem cadastrada envie outra! </div>';
										}catch(PDOexception $erroMidia){
											echo '<div class="no"> Erro ao cadastarr a imagem!</div>';
										}										
									} else { // ELSE IF IMAGEM
										echo '<div class="no"> Imagem inválida!</div>';
									} // FIM IF IMAGEM
								}
							}
						} // Fim IF limita Upload
				} // FIM IF
				
			?>
            
         <?php
		 	if(isset($_POST['executar']) && $_POST['executar'] == 'Finalizar'){ // Inicio IF
				$produtoId	= $_POST['produtoId'];
				try{
					$sql_limitaUpload = 'SELECT * FROM portal_midias WHERE produtoId = :produtoId';
					$query_limitaUpload = $conecta->prepare($sql_limitaUpload);
					$query_limitaUpload-> bindValue(':produtoId',$produtoId,PDO::PARAM_STR);
					$query_limitaUpload->execute();
					$count_limitaUpload = $query_limitaUpload->rowCount(PDO::FETCH_ASSOC);
				}catch(PDOexception $erro_limitaUpload){
					echo 'erro ao limitar Upload';
				}
				
				if($count_limitaUpload == 0) {
					echo '<div class="no"> Favor informar no mínimo 1 imagem, lembrando que quanto mais imagens melhor </br> </div>';
				}else{
					sleep(1);
					$meta = '<meta http-equiv="refresh" content="0,URL=painel.php?exe=cliente/cadastro_fim"/>';
					echo $meta;
					}
				
			}		
		 ?>
         
        
        
        <form name="cadastraProduto" action="" method="post" enctype="multipart/form-data">
                
    <h2 style="margin:10px 0 0px 0; color:#666;"> &raquo; Você poderá enviar até 5 imagens!</h2>
    <h2 style="font:12px 'Trebuchet MS', Arial, Helvetica, sans-serif;color:#666;"> &nbsp; &nbsp;&nbsp;* Clique em escolher o arquivo!</h2>
    <h2 style="font:12px 'Trebuchet MS', Arial, Helvetica, sans-serif;color:#666;">&nbsp; &nbsp;&nbsp;* Selecione a Imagem!</h2>
    <h2 style="font:12px 'Trebuchet MS', Arial, Helvetica, sans-serif;color:#666;"> &nbsp; &nbsp;&nbsp;* Clique em enviar imagem!</h2>
	<h2 style="font:12px 'Trebuchet MS', Arial, Helvetica, sans-serif; margin-bottom:10px;color:#666;"> &nbsp; &nbsp;&nbsp;* Ao selecionar todas as imagens, clique em finalizar!</h2>
                
                
                <label>
                    	<span> Imagem de Exibição do Imóvel:</span>
                        <input type="file" name="img" size="60" />
                     </label>   
					<input type="hidden" name="produtoId" value="<?php echo $produtoId?>"/>
                    <input type="submit" name="executar" id="executar" value="Enviar Imagem" />
                    <input type="submit" name="executar" id="executar" value="Finalizar" />                	
                </form>
                
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
    
    <div class="galeria"> <!--inicio div galeria-->
    <?php 
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
			$midiaId 		= $resImagem['midiaId'];
			$produtoMidia 	= $resImagem['produtoMidia'];
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
            </div><!-- fim div content conteudo-->
        </div> <!-- fim div content -->
		<?php include_once("footer.php")?> 
</body>
</html>
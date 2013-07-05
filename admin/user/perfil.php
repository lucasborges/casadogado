<?php include_once("sistema/restrito_all.php");?>
<?php include_once("sistema/validar_user.php");?>
<?php include_once("header.php");?>
        <div id="local"> <!-- Inicio div local-->
    	   <div class="caminho"> Onde Estou: Portal do Gado &raquo;Painel de Controle; &raquo; Edição de Perfil</div>
 	       <div class="welcome"> Olá <?php echo $clienteNome ?>| Hoje <?php echo date('d/m/Y H:i').h;?> | <a href="deslogar.php">Deslogar</a></div>
        </div> <!-- fim div local-->
        
        <div id="content"><!-- inicio div content-->
            
			<?php include_once("menu.php")?>
        	<div id="content_conteudo"><!-- inicio div content conteudo-->       
			<?php include_once("sistema/carregando.php")?>
            <h1> Aqui você pode atualizar suas informações. </h1>            
           <?php 
		   		if(isset($_POST['enviar'])){
					$sendNome 		= strip_tags(trim($_POST['sendNome']));
					$sendOperadora 	= strip_tags(trim($_POST['sendOperadora']));
					$sendCelular 	= strip_tags(trim($_POST['sendCelular']));
					$sendSenha 		= strip_tags(trim($_POST['sendSenha']));
					
					if($sendSenha == ''){
						$sendSenha = $clienteSenha;
					}else{
						$sendSenha = strip_tags(trim(md5($sendSenha)));
					}					   		
					
					$sql_atualizaPerfil = 'UPDATE portal_cliente set 	nome		 	= :sendNome, 
																		operadora		= :sendOperadora,
																		telefone		= :sendCelular,
																		senha			= :sendSenha
																  where usuarioId		= :clienteId';
							  
														
					try{
						$query_atualizaPerfil = $conecta->prepare($sql_atualizaPerfil);
						$query_atualizaPerfil->bindValue(':sendNome',$sendNome,PDO::PARAM_STR);
						$query_atualizaPerfil->bindValue(':sendOperadora',$sendOperadora,PDO::PARAM_STR);
						$query_atualizaPerfil->bindValue(':sendCelular',$sendCelular,PDO::PARAM_STR);
						$query_atualizaPerfil->bindValue(':sendSenha',$sendSenha,PDO::PARAM_STR);
						$query_atualizaPerfil->bindValue(':clienteId',$clienteId,PDO::PARAM_STR);
						$query_atualizaPerfil->execute();
						echo '<div class="ok"> Perfil atualizado com sucesso! </div>';
						echo '<meta http-equiv="refresh", content="1,painel.php?exe=user/perfil"/>';
					}catch(PDOexception $error_atualizaPerfil){
						echo 'Error ao atualiar o perfil' .$error_atualizaPerfil;
					}				  
				}
?>        
            <form name="perfil" action="" enctype="multipart/form-data" method="post" >
                 <label>
                 	<span> Nome:</span>
                 	<input type="text" name="sendNome" size="100" value= "<?php echo $clienteNome;?>" />
                 </label>
                    
                  <label>
                 	<span> Operadora Celular:</span>
                 	<input type="text" name="sendOperadora" size="60" value="<?php echo $clienteOperadora;?>" />
                 </label>
                 
                  <label>
                 	<span> Telefone Celuar:</span>
                 	<input type="text" name="sendCelular" size="60" value= "<?php echo $clienteTelefone;?>" />
                 </label>
                 
                 <label>
                 	<span> Senha: <strong>(Caso não informado a senha não será alterada!)</strong></span>
                 	<input type="password" name="sendSenha" size="60"value="" />
                 </label>
            
            		<input type="submit" id="enviar" name="enviar" value="Atualizar" style="width:180px;float:left;cursor:pointer;" />
            
            </form>
            </div><!-- fim div content conteudo-->
        </div> <!-- fim div content -->
		<?php include_once("footer.php");?> 
</body>
</html>
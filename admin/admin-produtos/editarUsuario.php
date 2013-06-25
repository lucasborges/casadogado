<?php include_once("sistema/restrito_all.php");?>
<?php include_once("sistema/validar_user.php");?>
<?php include_once("header.php");?>
        <div id="local"> <!-- Inicio div local-->
    	   <div class="caminho"> Onde Estou: Portal do Gado &raquo;Painel de Controle; &raquo; Edição de Perfil</div>
 	       <div class="welcome"> Olá <?php echo $clienteNome ?>| Hoje <?php echo date('d/m/Y H:i').h ?> | <a href="deslogar.php">Deslogar</a></div>
        </div> <!-- fim div local-->
        
        <div id="content"><!-- inicio div content-->
            
			<?php include_once("menu.php")?>      
            
        	<div id="content_conteudo"><!-- inicio div content conteudo-->       
			<?php include_once("sistema/carregando.php")?>
            <h1> Aqui você pode atualizar suas informações. </h1>
            
            <?php
				
			
			?>		
            
            
           <?php 
		   		if(isset($_POST['enviar'])){					
					$nome = $_POST['sendNome'];
					$operadora = $_POST['sendOperadora'];
					$celular = $_POST['sendCelular'];
					$cpf = $_POST['sendCpf'];
					$senha = $_POST['sendSenha'];
					$usuarioId =  $_POST['sendUsuario'];
					
					echo $nome;
					echo $usuarioId;
					if($sendSenha == ''){
						$sendSenha = $clienteSenha;
					}else{
						$sendSenha = strip_tags(trim(md5($sendSenha)));
					}					   		
					
					$sql_atualizaPerfil = 'UPDATE portal_cliente set 	nome		 	= :nome, 
																		operadora		= :operadora,
																		telefone		= :celular,
																		cpf				= :cpf,
																		senha			= :senha,
																		usuarioStatus	= :usuarioStatus
																  where usuarioId		= :usuarioId';
							  
														
					try{
						
						
						
						$query_atualizaPerfil = $conecta->prepare($sql_atualizaPerfil);
						$query_atualizaPerfil->bindValue(':nome',$nome,PDO::PARAM_STR);
						$query_atualizaPerfil->bindValue(':operadora',$operadora,PDO::PARAM_STR);
						$query_atualizaPerfil->bindValue(':celular',$celular,PDO::PARAM_STR);
						$query_atualizaPerfil->bindValue(':cpf',$cpf,PDO::PARAM_STR);						
						$query_atualizaPerfil->bindValue(':senha',$senha,PDO::PARAM_STR);
						$query_atualizaPerfil->bindValue(':usuarioStatus','Concluído',PDO::PARAM_STR);
						$query_atualizaPerfil->bindValue(':usuarioId',$usuarioId,PDO::PARAM_STR);
						$query_atualizaPerfil->execute();
						echo '<div class="ok"> Perfil atualizado com sucesso! </div>';
						echo '<meta http-equiv="refresh", content="1,painel.php?exe=admin-produtos/editarUsuario"/>';
					}catch(PDOexception $error_atualizaPerfil){
						echo 'Error ao atualiar o perfil' .$error_atualizaPerfil;
					}				  
				}
														
		   ?>

            
            <form name="perfil" action="" enctype="multipart/form-data" method="post" >
                 <label>
                 	<span> Nome:</span>
                 	<input type="text" name="sendNome" size="100" value= "<?php echo $nome?>" />
                 </label>
                    
                  <label>
                 	<span> CPF:</span>
                 	<input type="text" name="sendCpf" size="100" value= "<?php echo $cpf?>" />
                 </label>
                    
                    
                  <label>
                 	<span> Operadora Celular:</span>
                 	<input type="text" name="sendOperadora" size="60" value="<?php echo $operadora?>" />
                 </label>
                 
                  <label>
                 	<span> Telefone Celuar:</span>
                 	<input type="text" name="sendCelular" size="60" value= "<?php echo $telefone?>" />
                 </label>
                 
                 <label>
                 	<span> Senha: <strong>(Caso não informado a senha não será alterada!)</strong></span>
                 	<input type="password" name="sendSenha" size="60"value="" />
                 </label>
            		<input type="hidden" name="sendUsuario" size="60"value="<?php echo $usuarioId?>" />
            		<input type="submit" id="enviar" name="enviar" value="Atualizar" style="width:180px;float:left;cursor:pointer;" />
            
            </form>
            
            
            
            </div><!-- fim div content conteudo-->
            
        </div> <!-- fim div content -->
		<?php include_once("footer.php")?> 
</body>
</html>
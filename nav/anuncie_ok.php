<div id="pagina">
	<div class="anuncie_ok">
    <?php 
		$criadoEm				=	date('Y-m-d H:i:s');
		$modificadoEm			=	date('Y-m-d H:i:s');
		$usuarioNivel			=	'cliente';
		$usuarioStatus			=	'pendente';
		$usuarioNome 			= 	strip_tags(trim($_POST['nome']));
		$usuarioCpf 			= 	strip_tags(trim($_POST['cpf']));
		$usuarioEmail 			= 	strip_tags(trim($_POST['email']));
		
		/* Verificando se usuario ja esta cadastrado */
		$sql_verificaMail = 'SELECT email FROM portal_cliente WHERE email = :usuarioEmail';
	
		try{
			$query_verificaMail = $conecta->prepare($sql_verificaMail);
			$query_verificaMail->bindValue(':usuarioEmail',$usuarioEmail,PDO::PARAM_STR);
			$query_verificaMail->execute();
			
			$count_verificaMail = $query_verificaMail->rowCount(PDO::FETCH_ASSOC);
			
			}catch(PDOexception $erro_verificaMail){
			  echo 'Erro ao selecionar verificador';
			}	
		
			if($count_verificaMail >= '1'){
					echo '<h3>Desculpe, o e-mail que você informou já foi cadastrado em nosso sitema!</h3>';
					echo '<p>Não é possivel realizar seu cadastro com  este e-mail!</p>';    
					echo '<p> <a href="admin/recover.php"> Clique aqui para recuperar sua senha.</p>';
			}else{ /* FIM Verificando se usuario ja esta cadastrado */
		
				$usuarioOperadora 		= 	strip_tags(trim($_POST['operadora']));
				$usuarioTelefone 		= 	strip_tags(trim($_POST['telefone']));
				$usuarioSenha 			= 	strip_tags(trim(md5($_POST['senha'])));
				$usuarioSenhaMail		= 	strip_tags(trim($_POST['senha']));
				
				
				$sql_cadastraCliente = 'INSERT INTO portal_cliente(
																	criadoEm, 
																	modificadoEm, 
																	usuarioStatus, 
																	usuarioNivel, 
																	nome, 
																	cpf, 
																	email, 
																	operadora, 
																	telefone, 
																	senha 
																	)'	 ;
				
				$sql_cadastraCliente .= ' values(	:criadoEm, 
													:modificadoEm, 
													:usuarioStatus, 
													:usuarioNivel, 
													:usuarioNome, 
													:usuarioCpf, 
													:usuarioEmail, 
													:usuarioOperadora, 
													:usuarioTelefone, 
													:usuarioSenha) ';
				
				
				try{
		
					$query_cadastraUsuario = $conecta->prepare($sql_cadastraCliente);			
					$query_cadastraUsuario->bindValue(':criadoEm',$criadoEm,PDO::PARAM_STR);
					$query_cadastraUsuario->bindValue(':modificadoEm',$modificadoEm,PDO::PARAM_STR);
					$query_cadastraUsuario->bindValue(':usuarioNivel',$usuarioNivel,PDO::PARAM_STR);
					$query_cadastraUsuario->bindValue(':usuarioStatus',$usuarioStatus,PDO::PARAM_STR);
					$query_cadastraUsuario->bindValue(':usuarioNome',$usuarioNome,PDO::PARAM_STR);
					$query_cadastraUsuario->bindValue(':usuarioCpf',$usuarioCpf ,PDO::PARAM_STR);
					$query_cadastraUsuario->bindValue(':usuarioEmail',$usuarioEmail ,PDO::PARAM_STR);
					$query_cadastraUsuario->bindValue(':usuarioOperadora',$usuarioOperadora ,PDO::PARAM_STR);
					$query_cadastraUsuario->bindValue(':usuarioTelefone',$usuarioTelefone,PDO::PARAM_STR);
					$query_cadastraUsuario->bindValue(':usuarioSenha',$usuarioSenha,PDO::PARAM_STR);
					$query_cadastraUsuario->execute();			
		
					/* Enviando email para mim*/			
					$mail_data = date('d/m/Y H:i:s');
					$meuEmail = 'contato@portaldogado.com.br';
					$assunto = 'Novo cliente cadastrado '.$usuarioNome;
					$headers = "From: $meuEmail\n";
					$header .= "content-type: text/html; charset=\"utf-8\"\n\n";
					$mensagemSistema = "
				  
					Novo cliente cadastrado:<br />
					<strong>Cliente Nome:</strong> $usuarioNome<br />
					<strong>Cliente E-mail:</strong> $usuarioEmail<br />
					<br />
					<br />
					Mensagem enviada em: $mail_data";
					
					mail($meuEmail,$assunto,$mensagemSistema,$headers);
					/* Fim email para mim*/	
					
					/* Enviando email para usuário*/
					$clienteAssunto = 'Cadastro com sucesso Portal do Gado';
					$mensagemCliente = "<strong>E-mail de segurança, guarde esse e-mail para consulta!</strong><br />
					Seus dados são:<br /><br />
					Login: $usuarioNome<br />
					Senha: $usuarioSenhaMail<br /><br />
				  
					Seu cadastro foi criado em $criadoEm!<br /><br />
		
					  Está é uma mensagem automática de nosso sistema, você não precisa responder!
					  <br />
					  <br />
					  Mensagem enviada em: $mail_data";
				  
					 mail($usuarioEmail,$clienteAssunto,$mensagemCliente,$headers);
					 /* Fim email para usuário*/
					
					 echo'<h3> Cadastro realizado com sucesso!</h3>';
					 echo'<p> 	Seu cadastro foi realizado com sucesso! Para acessar o seu painel e começar a anunciar 
								<a href="admin/index.php"> CLIQUE AQUI.</a></p>';
					 echo'<p> Por segurança nós enviamos uma copia do seu cadastro para o email <strong>'.$usuarioEmail.'</strong></p>';
					 
					}catch(PDOexception $error_cadastro)
					{
						echo '<h3>Erro ao cadastrar, por favor tente novamente ou nos informe o erro no email contato@portaldogado.com.br</h3>';
					}
}?>
    </div>    
</div> <!-- Fecha Pagina -->


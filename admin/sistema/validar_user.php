<?php
	include "../Connections/config.php";
	$usuarioSistema = $_SESSION['MM_Username'];
	$sqlSistema_usuarioSistema = 'SELECT * FROM portal_cliente where email = :usuarioSistema';
	try {
		$querySistema_usuarioSistema=$conecta->prepare($sqlSistema_usuarioSistema);
		$querySistema_usuarioSistema->bindValue(':usuarioSistema',$usuarioSistema,PDO::PARAM_STR);
		$querySistema_usuarioSistema->execute();
		$resultado_querySistema = $querySistema_usuarioSistema->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOexception $error_usuarioSistema){
			echo 'Erro ao selecionar o usuário';
			echo '<meta http-equiv="refresh" content="2, deslogar.php"/>';
		}
		
		foreach($resultado_querySistema as $res_UsuarioSistema);
			$clienteId 				= $res_UsuarioSistema['usuarioId'];
			$clienteCriadoEm		= $res_UsuarioSistema['criadoEm'];
			$clienteModificadoEm	= $res_UsuarioSistema['modificadoEm'];
			$clienteUsuarioStatus 	= $res_UsuarioSistema['usuarioStatus'];
			$clienteNome 			= $res_UsuarioSistema['nome'];
			$clienteCpf 			= $res_UsuarioSistema['cpf'];
			$clienteEmail			= $res_UsuarioSistema['email'];
			$clienteOperadora 		= $res_UsuarioSistema['operadora'];
			$clienteTelefone 		= $res_UsuarioSistema['telefone'];
			$clienteSenha 			= $res_UsuarioSistema['senha'];
			$clienteUsuarioNivel 	= $res_UsuarioSistema['usuarioNivel'];
?>
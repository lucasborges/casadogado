<?php
//define('HOST','mysql.casadogado.com.br');
//define('DB','casadogado_www');
//define('USER','casadogado');
//define('PASS','1q2w3e4r');
define('HOST','localhost');
define('DB','portaldogado');
define('USER','root');
define('PASS','');
$conexao = 'mysql:host='.HOST.';dbname='.DB;
try{
		$conecta = new PDO($conexao,USER,PASS);
		$conecta->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch(PDOexception $error_conecta){
		echo('Erro ao conectar favor informe no email contato@casadogado.com.br');}
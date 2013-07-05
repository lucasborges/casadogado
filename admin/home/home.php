<?php include_once("sistema/restrito_all.php");?>
<?php include_once("sistema/validar_user.php");?>

<?php 

 if($clienteUsuarioNivel == 'cliente'){
	include "cliente.php";
 }elseif ($clienteUsuarioNivel == 'admin'){
	 include "admin.php";
 } else { 
 	include "deslogar.php";
 }
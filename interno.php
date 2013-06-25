<?php include_once("header_interno.php")?>

<?php 
foreach ($_REQUEST as $___opt => $___val) {
  $$___opt = $___val;
}

if(empty($pg)) {
	include("nav\home");
}
	elseif(substr($pg, 0, 4)=='http' or substr($pg,0, 1)=="/" or substr($pg, 0, 1)==".") 
{
	echo '<br><font face=arial size=11px><br><b>A página não existe.</b><br>Por favor selecione uma página a partir do Menu Principal.</font>'; 
}
else {
include("nav/$pg");
}

?>


<?php include_once("footer.php")?>
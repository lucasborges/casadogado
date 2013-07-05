<?php session_start();?>
<?php 
	foreach ($_REQUEST as $___opt => $___val) {
  		$$___opt = $___val;
	}
	
	if(empty($pg) or $pg =="home.php"){
		include_once("header_index.php");
    } else {
		include_once("header_interno.php");
	}

	if(empty($pg)) {
		include("nav/home.php");
	}
	elseif(substr($pg, 0, 4)=='http' or substr($pg,0, 1)=="/" or substr($pg, 0, 1)==".") 
	{
		include("nav/error.php");		
	}
	else {
		include("nav/$pg");	
	}
?>
<?php include_once("footer.php");?>
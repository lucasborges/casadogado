<?php 
session_start();
foreach ($_REQUEST as $___opt => $___val) {
			  $$___opt = $___val;
			}
			
			if(empty($exe)) {
			  include("home/home.php");
			}elseif(substr($exe, 0, 4)=='http' or substr($exe,0, 1)=="/" or substr($exe, 0, 1)==".") {
				include("nav/error.php");
			}else {
			include("$exe.php");
}
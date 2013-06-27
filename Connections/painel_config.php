<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_painel_config = "mysql.casadogado.com.br";
$database_painel_config = "casadogado_www";
$username_painel_config = "casadogado";
$password_painel_config = "1q2w3e4r";
$painel_config = mysql_pconnect($hostname_painel_config, $username_painel_config, $password_painel_config) or trigger_error(mysql_error(),E_USER_ERROR); 
?>

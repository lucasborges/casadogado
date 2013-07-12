<?php
$hostname_painel_config = "mysql.casadogado.com.br";
$database_painel_config = "casadogado";
$username_painel_config = "casadogado";
$password_painel_config = "Vaca30@";
/*
$hostname_painel_config = "localhost";
$database_painel_config = "portaldogado";
$username_painel_config = "root";
$password_painel_config = "";
*/
$painel_config = mysql_pconnect($hostname_painel_config, $username_painel_config, $password_painel_config) or trigger_error(mysql_error(),E_USER_ERROR);
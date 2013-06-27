<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include"Connections/config.php";?>
<?php include"js/scripts.php";?>
<?php include"funcoes/funcoes.php";?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: Portal do Gado :.</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<div id="box"> <!-- Inicio Div BOX -->
    	<div id="header"> <!-- Inicio Div header -->
	       <div id="header_topo"> <!-- Inicio Div Header_topo-->            
            	<div id="header_topo_logo"> <!-- Inicio Div Header Topo Logo -- <label> Atendimento Gado Online: contato@portaldogado.com.br  | <a href="admin/index.php"><strong> Entrar</strong> </a>   </label> -->                 
	                 <div id="header_contato">
           <form action="<?php echo $loginFormAction;?>" name="login"  method="POST">
                <label><span> E-mail:</span> <input type="text" name="email"/> </label>
                <label><span> Senha:  </span> <input type="password" name="senha"/> </label>
                <input type="submit" name="logar" id="logar" value="Logar" class="btn" />
                <p> <a href="admin/recover.php">[Esqueci minha senha] </a></p>
            </form>
			</div>
                 
            	    <a href="index.php?pg=home.php"><img src="images/portaldogado_logo.png" alt="Home" title="Home" border="0"/></a>
                    
                   <ul>
                	   <li><a href="index.php?pg=home.php">Home</a></li>
                       <li><a href="index.php?pg=quemsomos.php">Quem Somos</a></li>
                       <li><a href="index.php?pg=condicoes.php">Condições</a></li>
                       <li><a href="index.php?pg=parceiros.php">Parceiros</a></li>  
                       <li><a href="index.php?pg=noticias.php">Notícias</a></li>                           	
                       <li><a href="index.php?pg=contato.php">Contato</a></li>
                   </ul>
                </div> <!-- Fim Div Header Topo Logo -->
                
           	 	<div id="header_img_noticias"> <!-- Inicio Header Imagens Noticias -->
                       	<div id="header_img_noticias_1">
                    	<!--<img src="images/capim_direito_bg.jpg" alt="Home" title="Home" border="0"/>-->
                       <img src="images/menu_capim_dir.jpg" alt="Home" title="Home" border="0"/>
                    </div>

                	<div id="header_img_noticias_2">
                    	<img src="images/fotos.jpg" alt="Home" title="Home" border="0"/>
                    </div>
                    <div id="header_img_noticias_3">   
                    	<div id="header_img_noticias_3_esq">         
                        	<img src="images/menu_capim_pq_bg.jpg" alt="Home" title="Home" border="0" />   	
                        </div>
                        
                        <div id="header_img_noticias_3_meio">
                        	<span>Notícias</span>  
                              <ul>
			                    <li>
            			            <h1>15/03/2013 </h1>
                           			<h2><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam</a></h2>
			                    </li>    
                                <li>
            			            <h1>15/03/2013 </h1>
                           			<h2><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam</a></h2>
			                    </li>                 	
                                <li>
            			            <h1>15/03/2013 </h1>
                           			<h2><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam</a></h2>
			                    </li>  
                              </ul>    
                              <span><a href="#"> + ver mais notícias </a>  </span>
                        </div>
                        
                        <div id="header_img_noticias_3_dir">
                        	<img src="images/menu_capim_dir.jpg" alt="Home" title="Home" border="0" /> 
                        </div>
                    	
                                        
                    </div>
                   
            	</div> <!-- Fim Header Imagens Noticias -->   
            </div><!-- Fim Div Header_topo-->
			
    		<!--  Inicio Header Navegar-->
    		<div id="header_navegar">
        		 <ul>
               	   <li><a href="index.php?pg=anuncie.php">CADASTRE-SE GRÁTIS</a> </li>                                
                   <li><a href="index.php?pg=necessidade.php">INFORME O QUE VOCÊ PRECISA</a></li>
             	</ul>
                
                 <form name="busca_comum" action="index.php?pg=search" method="get">
                 
                  <label>
                	<span> BUSCAR: </span>
                	 <input type="text" onblur="if (this.value == '') {this.value = 'Digite aqui o que procura...';}" 
									   onfocus="if (this.value == 'Digite aqui o que procura...') {this.value = '';}" 
										maxlength="100" size="20" value="Digite aqui o que procura..." name="p" />
                         <input type="submit" name="Buscar" value="" class="btn"/>                    
           		 </label>
	            </form>
        	</div>
          	<!--  FIM Header Navegar-->
        </div> <!-- Fim Div header -->


<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>

<?php

	require_once('Connections/painel_config.php');

// *** Validate request to login to this site.
if(isset($_POST['logar']) && $_POST['logar'] == 'Logar'){ // Inicio IF
		if (!isset($_SESSION)) {
		  session_start();
		}
		
		$loginFormAction = $_SERVER['PHP_SELF'];
		if (isset($_GET['accesscheck'])) {
		  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
		}
		
		if (isset($_POST['email'])) {
		  $loginUsername=$_POST['email'];
		  $password=md5($_POST['senha']);
		  $MM_fldUserAuthorization = "usuarioNivel";
		  $MM_redirectLoginSuccess = "admin/painel.php";
		  $MM_redirectLoginFailed = "admin/erro.php";
		  $MM_redirecttoReferrer = false;
		  mysql_select_db($database_painel_config, $painel_config);
			
		  $LoginRS__query=sprintf("SELECT email, senha, usuarioNivel FROM portal_cliente WHERE email=%s AND senha=%s",
		  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
		   
		  $LoginRS = mysql_query($LoginRS__query, $painel_config) or die(mysql_error());
		  $loginFoundUser = mysql_num_rows($LoginRS);
		  if ($loginFoundUser) {
			
			$loginStrGroup  = mysql_result($LoginRS,0,'usuarioNivel');
			
			if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
			//declare two session variables and assign them
			$_SESSION['MM_Username'] = $loginUsername;
			$_SESSION['MM_UserGroup'] = $loginStrGroup;	      
		
			if (isset($_SESSION['PrevUrl']) && false) {
			  $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
			}
			header("Location: " . $MM_redirectLoginSuccess );
		  }
		  else {
			header("Location: ". $MM_redirectLoginFailed );
		  }
		}
}
?>
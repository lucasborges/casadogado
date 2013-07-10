<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include"Connections/config.php";?>
<?php include"js/scripts.php";?>
<?php include"funcoes/single_funcoes.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: Casa do Gado :.</title>
<link href="style_int.css"  rel="stylesheet" type="text/css" />
<link href="http://vjs.zencdn.net/4.0/video-js.css" rel="stylesheet">

</head>

<body>
<div id="fb-root">
</div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div id="box"> <!-- Inicio Div BOX -->
    	<div id="header"> <!-- Inicio Div header -->
	       <div id="header_topo"> <!-- Inicio Div Header_topo-->            
            	<div id="header_topo_logo"> <!-- Inicio Div Header Topo Logo -->                 
	                 <div id="header_contato">
    	             	   <form name="login"  method="POST">
                                <label><span> E-mail:</span> <input type="text" name="email"/> </label>
                                <label><span> Senha:  </span> <input type="password" name="senha"/> </label>
                                <input type="submit" name="logar" value="Logar" class="btn" />
                                <p> <a href="admin/recover.php">[Esqueci minha senha] </a></p>
        					</form>
        	         </div>
                 
            	    <a href="index.php"><img src="images/portaldogado_logo.png" alt="Home" title="Home" border="0"/></a>
                    
                   <ul>
                	  <li><a href="index.php?pg=home.php">Home</a></li>
                       <li><a href="interno.php?pg=quemsomos.php">Quem Somos</a></li>
                       <li><a href="interno.php?pg=condicoes.php">Como Comprar</a></li>
                       <li><a href="interno.php?pg=parceiros.php">Parceiros</a></li>  
                       <li><a href="interno.php?pg=noticias.php">Notícias</a></li>                           	
                       <li><a href="interno.php?pg=contato.php">Contato</a></li>
                   </ul>
                </div> <!-- Fim Div Header Topo Logo -->
                
           	 	<div id="header_img_noticias"> <!-- Inicio Header Imagens Noticias -->
                     <div id="header_img_noticias_1"> <!-- Inicio Header Imagens Noticias 1 -->
                         <ul>
                             <li><a href="index.php?pg=anuncie.php">CADASTRE-SE GRÁTIS</a> </li>                                
                  			 <li><a href="index.php?pg=necessidade.php">INFORME O QUE VOCÊ PRECISA</a></li>
                        </ul>                         
                        
                	<form name="busca_comum" action="index.php?pg=produto.php"  enctype="multipart/form-data" method="POST">
                   		<label>
                			<span> BUSCAR POR LOTE: </span>
    	                  	<input type="text" onBlur="if (this.value == '') {this.value = 'Informe o Lote que procura...';}" 
									   onfocus="if (this.value == 'Informe o Lote que procura...') {this.value = '';}" 
										maxlength="100" size="20" value="Informe o Lote que procura..." name="produto" />
	    				  	<input type="submit" name="enviar" value="" class="btn"/>
                            
           		 		</label>
	            	</form>
                    </div>       <!-- FIM Header Imagens Noticias -->
            	</div> <!-- Fim Header Imagens Noticias -->   
            </div><!-- Fim Div Header_topo-->	
</div> <!-- Fim Div header -->   
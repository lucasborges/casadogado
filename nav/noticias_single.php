   <div id="conteudo"> <!-- Inicio Div Conteudo -->
        	<div id="conteudo_esq"> <!-- Inicio Div Conteudo Esquerdo -->
            
            	<div id="conteudo_esq_categ"> <!-- Inicio Div Conteudo Esquerdo Categoria-->
                	<span> Categorias </span>
                	<div id="conteudo_esq_categ_dentro"> <!-- Inicio Div Conteudo Esquerdo Categoria Dentro-->
                    	 <ul>
               	   			<li><a href="index.php?pg=categoria.php&categoria=Bufalos">Bubalinos</a> </li>
                   			<li><a href="index.php?pg=categoria.php&categoria=Cães">Caninos</a></li>
                            <li><a href="index.php?pg=categoria.php&categoria=Bufalos">Diversos</a> </li>                                
                   			<li><a href="index.php?pg=categoria.php&categoria=Cavalos">Eqüinos</a></li>
                            <li><a href="index.php?pg=categoria.php&categoria=Gado de Corte">Gado de Corte</a> </li>
                   			<li><a href="index.php?pg=categoria.php&categoria=Gado de Elite">Gado de Elite</a></li>
                            <li><a href="index.php?pg=categoria.php&categoria=Gado de Leite">Gado de Leite</a> </li>
                   			<li><a href="index.php?pg=categoria.php&categoria=Mulas">Muares</a></li>                            
                   			<li><a href="index.php?pg=categoria.php&categoria=Propriedade">Propriedade Rural</a></li>
                            <li><a href="index.php?pg=categoria.php&categoria=Touros">Touros</a> </li>    
                   			<li><a href="index.php?pg=categoria.php&categoria=Veículo">Veículos</a></li>
             			</ul>
                    </div> <!-- FIM Div Conteudo Esquerdo Categoria Dentro-->
                </div>  <!-- FIM Div Conteudo Esquerdo Categoria-->
                
                <div id="conteudo_esq_parc"> <!-- Inicio Div Conteudo Parceiros -->
                	<span> Parceiros </span>
                	<div id="conteudo_esq_parc_dentro"> <!-- Inicio Div Conteudo Parceiros Dentro -->
    		                <img src="images/cri_premiacoes.png" />
	                        <img src="images/premix_premiacoes.png"/>
                    </div> <!-- FIM Div Conteudo Parceiros Dentro -->
                </div> <!-- FIM Div Conteudo Parceiros -->
                
                
                <div id="conteudo_esq_news"> <!-- Inicio Div Conteudo Esquerdo News-->
                	<span> Newsletter </span>
                	<div id="conteudo_esq_news_dentro"> <!-- Inicio Div Conteudo Esquerdo News Dentro-->
                    	<span> Receba novidades em seu e-mail:</span>
                        <form name="busca_comum" action="" method="post">
                    			  <input type="text" onblur="if (this.value == '') {this.value = 'Nome';}" 
									   				onfocus="if (this.value == 'Nome') {this.value = '';}" 
													maxlength="100" value="Nome" name="keywords" />
                                <input type="text" class="inpt" onblur="if (this.value == '') {this.value = 'E-mail';}" 
									   				onfocus="if (this.value == 'E-mail') {this.value = '';}" 
													maxlength="100" value="E-mail" name="keywords" />
                                
                              
                                <input type="submit" name="Cadastrar" value="" class="btn"/>                           			               
	            		</form>
                   	</div>  <!-- FIM Div Conteudo Esquerdo News Dentro-->   
                </div> <!-- FIM Div Conteudo Esquerdo News-->
                
                <div id="conteudo_esq_fb"> <!-- Inicio Div Conteudo Esquerdo Facebook -->
                </div> <!-- Fim Div Conteudo Esquerdo Facebook -->                
            </div><!-- FIM Div Conteudo Esquerdo -->
            
             
            <div id="conteudo_dir"> <!-- Inicio Div Conteudo Direito-->
            	  
            <?php
				$anunciosID = $_GET['editarAnuncio']; 
				$sql_buscaNoticias = 'SELECT * FROM portal_anuncios WHERE anunciosID = :anunciosID';
			   				   
			   try{
				   $query_buscaNoticias = $conecta->prepare($sql_buscaNoticias);
				   $query_buscaNoticias->bindValue(':anunciosID',$anunciosID,PDO::PARAM_STR);
				   $query_buscaNoticias->execute();
				   $resultado_buscaNoticias = $query_buscaNoticias->fetchAll(PDO::FETCH_ASSOC);
				}catch(PDOexception $errorBuscaAtivos){
					echo 'Erro buscar anuncios ativos!';
				}
				
				foreach($resultado_buscaNoticias as $resNoticias){
					$anunciosID 		= $resNoticias['anunciosID'];
					$anuncios_titulo	= $resNoticias['anuncios_titulo'];
					$anuncios_msg 		= $resNoticias['anuncios_msg'];
					$i++;
					if($i % 2 == 0){
						$cor = 'style="background:#F4F4F4;"';										
					} else {
						$cor = 'style="background:#CECEBF"';
					}
				}
		?>
             <div class="noticias">
   					<span>Anuncio ID:</span>
                    <h1><?php echo $anunciosID ?></h1>
                             
                    <span>Titulo do anúncio:</span>
                    <h1><?php echo $anuncios_titulo ?></h1>
                                        
                    <span>Mensagem: <strong </strong></span>
                    <h1> <?php echo $anuncios_msg ?></h1>
             </div> <!-- FIM DIV NOTICIAS-->
            	 
            </div> <!-- Fim Div Conteudo Direito-->
          
        </div><!-- FIM Div Conteudo -->
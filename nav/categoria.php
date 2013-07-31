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
    		                <!--<img src="images/cri_premiacoes.png" />-->
	                        <!--<img src="images/premix_premiacoes.png"/>-->
                            <img src="images/premix_premiacoes1.jpg"/>
	                        <img src="images/premix_premiacoes1.jpg"/>
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
                	<div class="fb-like-box" data-href="https://www.facebook.com/casadogado.com.br" data-width="230" data-height="390" data-show-faces="true" data-stream="false" data-show-border="false" data-header="true"></div>
                </div> <!-- Fim Div Conteudo Esquerdo Facebook -->                
            </div><!-- FIM Div Conteudo Esquerdo -->
            
            <div id="conteudo_dir"> <!-- Inicio Div Conteudo Direito-->
            	<h7> Categoria </h7>   
                  <table width="100%" border="0" cellpadding="4" cellspacing="4" style="float:left;">                    
                    <tr  style="color:#336600;font-variant:small-caps;font:14px 'Trebuchet MS', Arial, Helvetica, sans-serif;">
                        <td align="center" bgcolor="#E9E9E9"><strong>Ilustração</strong></td>
                        <td align="center" bgcolor="#E9E9E9"><strong>Tipo de Gado</strong></td>
                        <td align="center" bgcolor="#E9E9E9"><strong>Sexo</strong></td>
                        <td align="center" bgcolor="#E9E9E9"><strong>Quantidade</strong></td>
                        <td align="center" bgcolor="#E9E9E9"><strong>Idade</strong></td>
                        <td align="center" bgcolor="#E9E9E9"><strong>Cidade</strong></td>
                        <td align="center" bgcolor="#E9E9E9"><strong>Acessar</strong></td>
                    </tr>
                               
					<?php 
					// funcoes/single_funcoes
					get_produtoCategoria();
					?>       
                  
                   <h7>Você poderá se interessar também por</h7>
                <!-- Inicio Lista Dois -->
                <ul class="lista_dois">
	               <?php portal_homePostFooter();?>
                </ul>  
                <!-- Fim Lista Dois -->    
                  <label> <a href="#"> VER MAIS OFERTAS >> </a></label>
            </div> <!-- Fim Div Conteudo Direito-->
</div><!-- FIM Div Conteudo -->
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
                 <div class="fb-like-box" data-href="https://www.facebook.com/casadogado.com.br" data-width="230" data-height="390" data-show-faces="true" data-stream="false" data-show-border="false" data-header="true"></div>
                </div> <!-- Fim Div Conteudo Esquerdo Facebook -->                
            </div><!-- FIM Div Conteudo Esquerdo -->
            
             
            <div id="conteudo_dir"> <!-- Inicio Div Conteudo Direito-->
            	
            	 <?php get_produtoTitulo();//Vem da pasta Funcoes/single funcoes?>
                
                 <ul class="lista">
                     <?php get_produtoInfo();?>   
           		</ul> <!--fim Lista-->
                
                 <ul class="lista_um">
                 	 <!-- total de 5 imagens -->
                     <?php get_produtoImagens();?>   
           		</ul> <!--fim Lista Um-->
                
                <div id="conteudo_dir_formulario">
                	<form name="busca_comum" action="" method="post">
                         <input type="submit" name="Cadastrar" value="" class="btn"/>   
                         <?php get_produtoPreco();?>   
                         <!--<h2><span>R$ 4.820,00 ou R$ 4.500,00<br/></span> Compre o lote e pague em até 12 x no cartão ou com desconto à vista.</h2>-->
	            	</form>     
                </div>
                
                <div id="conteudo_dir_formulario_interesse">
	                <h1>Tenho interesse neste lote</h1>
                    <h2>Caso tenha interesse no lote e gostaria de receber maiores detalhes, preencha o formulário. <br/> Teremos o maior prazer em	
                     atendê-lo!</h2>
                     
<?php
		if(isset($_POST['cadastrar_interesse'])){
					$clienteId				=  strip_tags(trim($_POST['idDoCliente']));
					$contatoNome 			= strip_tags(trim($_POST['nome']));
					$contatoEmail 			= strip_tags(trim($_POST['email']));
					$contatoCidade			= strip_tags(trim($_POST['cidade']));
					$contatoEstado	 		= strip_tags(trim($_POST['estado']));
					$contatoTelefone 		= strip_tags(trim($_POST['telefone']));
					$contatoMensagem	 	= strip_tags(trim($_POST['mensagem']));
					$contatoData			= date('Y-m-d H:i:s');
					$contatoStatus			= 'pendente';
							
					$sql_contatoSite = 'Insert into portal_interesses (	clienteId,
																		interesse_clienteNome,
																		interesse_clienteEmail,
																		interesse_clienteCidade,
																		interesse_clienteEstado,
																		interesse_clienteTelefone,
																		interesse_clienteDetalhes,
																		interesse_clienteData,
																		interesse_clienteStatus)
															values (	:clienteId,
																		:contatoNome,
																		:contatoEmail,
																		:contatoCidade,
																		:contatoEstado,
																		:contatoTelefone,
																		:contatoMensagem,
																		:contatoData,
																		:contatoStatus
															)';
															
				try {
					$query_cadastraContato = $conecta->prepare($sql_contatoSite);
					$query_cadastraContato-> bindValue(':clienteId',$clienteId,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoNome',$contatoNome,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoEmail',$contatoEmail,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoCidade',$contatoCidade,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoEstado',$contatoEstado,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoTelefone',$contatoTelefone,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoMensagem',$contatoMensagem,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoData',$contatoData,PDO::PARAM_STR);
					$query_cadastraContato-> bindValue(':contatoStatus',$contatoStatus,PDO::PARAM_STR);
					$query_cadastraContato->execute();
					$res = '<div class="enviado" style="color:blue;" >Seu e-mail foi enviado com sucesso!<br />Responderemos em breve!</div>';
				}catch(PDOexception $erro_cadastraMail){
					$res ='<div class="enviado_err">Erro ao enviar seu e-mail! <br/>favor tente mais tarde ou nos informe pelo contato@portaldogado.com.br!</div>' .$erro_cadastraMail;
				}
		}?>
             
                   
      <form name="cadastrar_interesse" id="cadastrar_interesse" action="" method="post" enctype="multipart/form-data">
      <?php echo  $res;?>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
           <tr>
              <td colspan="2" class="texto">Nome:<br/>
                  <input name="nome" type="text" class="formularios" id="nome" style="width:344px;" maxlength="100" />
              </td>
               
              <td colspan="1" class="texto"> Email: <br />
               	    <input name="email" type="text" class="formularios" id="email" style="width:255px;" maxlength="50" />
              </td>
           </tr>
            
            <tr>
            	   <td class="texto" style="width:20px;">Cidade:<br />
                    	<input name="cidade" type="text" class="formularios" id="cidade" style="width:100px;" maxlength="50" />
                   </td>
                   
                  
               <td class="texto" align="left"> <h8>Estado:</h8><br />
                   <select name="estado" id="estado" onchange="atualiza(this.value,1);" style="width:150px;" size='1' class='formularios'>
            		<option value="" selected="selected">SELECIONE</option>
            			<option value='AC'>Acre</option>
                        <option value='AL'>Alagoas</option>
                        <option value='AP'>Amapá</option>
                        <option value='AM'>Amazonas</option>
                        <option value='BA'>Bahia</option>
                        <option value='CE'>Ceará</option>
                        <option value='DF'>Distrito Federal</option>
                        <option value='ES'>Espírito Santo</option>
                        <option value='GO'>Goiás</option>
                        <option value='MA'>Maranhão</option>
                        <option value='MT'>Mato Grosso</option>
                        <option value='MS'>Mato Grosso do Sul</option>
                        <option value='MG'>Minas Gerais</option>
                        <option value='PA'>Pará</option>
                        <option value='PB'>Paraíba</option>
                        <option value='PR'>Paraná</option>
                        <option value='PE'>Pernambuco</option>
                        <option value='PI'>Piauí</option>
                        <option value='RJ'>Rio de Janeiro</option>
                        <option value='RN'>Rio Grande do Norte</option>
                        <option value='RS'>Rio Grande do Sul</option>
                        <option value='RO'>Rondônia</option>
                        <option value='RR'>Roraima</option>
                        <option value='SC'>Santa Catarina</option>
                        <option value='SP'>São Paulo</option>
                        <option value='SE'>Sergipe</option>
                        <option value='TO'>Tocantins</option>
                  </select>
                </td>
					
           
                  <td class="texto">Telefone:<br />
             	       <input name="telefone" type="text" class="formularios" id="telefone" style="width:255px;" onkeypress=	
                                 	"mascara(this,telefone)" maxlength="14" />
                </td>
             
              </tr>
                      
               
               <tr>
               		<td colspan="3" class="texto">Detalhes: <br />
                    	   <span class="conteudo_offline_txt_textonormal" style="margin-bottom:8px;">
                           <textarea name="mensagem" id="mensagem" style="width:660px; height:70px;" class="formularios"></textarea>                                                      </span>
                    </td>
               </tr>
                
                <tr>
                   <td colspan="3">
                  <input type="hidden" name="idDoCliente" value="<?php get_produtoClienteId();?>" />
                  <input type="submit" class="botao_envia" name="cadastrar_interesse" id="cadastrar_interesse" value="" style="cursor:pointer;" />
                   </td>
               </tr>
            </table>           
      	</form>    
               </div>

                <h7>Você poderá se interessar também por</h7>
                <!-- Inicio Lista Dois -->
                <ul class="lista_dois">
                    <?php get_produtoFooter();?>     
                </ul>  
                <!-- Fim Lista Dois -->    
                  <label> <a href="#"> VER MAIS OFERTAS >> </a></label>  
            </div> <!-- Fim Div Conteudo Direito-->
          
        </div><!-- FIM Div Conteudo -->
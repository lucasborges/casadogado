<?php include_once("sistema/restrito_all.php");?>
<?php include_once("sistema/validar_user.php");?>
<?php include_once("header.php");?>
        <div id="local"> <!-- Inicio div local-->
    	   <div class="caminho"> Onde Estou: Portal do Gado &raquo;Painel de Controle &raquo;Cadastrar Produto </div>
 	       <div class="welcome"> Olá <?php echo $clienteNome ?>| Hoje <?php echo date('d/m/Y H:i').h ?> | <a href="deslogar.php">Deslogar</a></div>
        </div> <!-- fim div local-->
        
        <div id="content"><!-- inicio div content-->
            
			<?php include_once("menu.php")?>      
            
        	<div id="content_conteudo"><!-- inicio div content conteudo-->       
				<?php include_once("sistema/carregando.php")?>
                <span style="font:16px 'Trebuchet MS', Arial, Helvetica, sans-serif;color:#346700;" > <strong>1: Informações</strong> | 2: Imagens </span>
   	<form name="cadastraProduto" id="cadastraProduto" action="painel.php?exe=cliente/cadastro_1" method="post" enctype="multipart/form-data">
          	<label>
              	<span> Titulo do anúncio:</span>
                <input type="text" name="titulo" size="80" />
            </label>   
             <br />
            <label>
           		<span> 1º Imagem de Exibição: <strong style="color:#900">Obrigatório, deve ser uma imagem válida.</strong></span>
                <input type="file" name="img"/>
            </label> 
             <br  />
           <label>
           		<span> Video de Exibição: <strong style="color:#900">Obrigatório, deve ser um video válido.</strong></span>
                	<input type="hidden" name="MAX_FILE_SIZE" value="2097152000000" />
                  <input type="file" name="video"/>
            </label>   
             <br  />
                	<label>
                    	<span> Tipo: </span>
                        <select name="tipo" id="tipo" onchange="" style="width:150px;" size='1' class=''>
            				<option value="" selected="selected">SELECIONE</option>                    
                        	<option value='Bufalos'>Bufalos</option>
                        	<option value='Cães'>Cães</option>
                        	<option value='Cavalos'>Cavalos</option>
                        	<option value='Gado de Corte'>Gado de Corte</option>
                        	<option value='Gado de Leite'>Gado de Leite</option>
                            <option value='Gado de Elite'>Gado de Elite</option>
                            <option value='Mulas'>Mulas</option>
                            <option value='Propriedade'>Propriedade Rural</option>
                            <option value='Touros'>Touros</option>
                            <option value='Veículo'>Veículo</option>
                         </select>
                     </label>   
                     
                     <label>
                    	<span> Sexo:</span>
                       	<select name="sexo" id="sexo" onchange="atualiza(this.value,1);" style="width:150px;" size='1' class='formularios'>
            				<option value="" selected="selected">SELECIONE</option>
            				<option value='Macho'>Macho</option>
                        	<option value='Femea'>Femea</option>
                		</select>
                     </label>   
                     
					<label>
                    	<span> Idade: (Ex: 18 meses)</span>
                        <input type="text" name="idade" size="40" />
                     </label>   
                     
                     <label>
                    	<span> Quantidade cabeças:</span>
                        <input type="text" name="qtd" size="40" />
                     </label>   
                     
                     
                     <label>
                    	<span> Cidade </span>
                    	<input type="text"  name="cidade" />
                     </label>   
                  
                	<label> 
                     <span> Estado:</span>
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
                  </label>   

                	<label>
                    	<span> Valor à vista: (Para R$150,00 informe 150,00)</span>
                        <input type="text" name="valorVista" size="40"/>
                     </label>   


                	<label>
                    	<span> Valor à Prazo: (Se aplicável, para R$150,00 informe 150,00) </span>
                        <input type="text" name="valorPrazo" size="40" />
                     </label>   

					<label>
                    	<span> Descrição:</span>
                        <textarea rows="5" cols="100" name="descricao"> </textarea>
                     </label>   	
                     
                     <input type="submit" name="executar" id="executar" value="Próximo Passo"  style="float:right; margin-right:200px"/>
                </form>

<?php 
	$produtoTitulo 		= strip_tags(trim($_POST['titulo']));
	$produtoTipo 		= strip_tags(trim($_POST['tipo']));
	$produtoIdade 		= strip_tags(trim($_POST['idade']));
	$produtoValorVista 	= strip_tags(trim($_POST['valorVista']));
	$produtoValorPrazo 	= strip_tags(trim($_POST['valorPrazo']));
	$produtoDescricao 	= strip_tags(trim($_POST['descricao']));
	$produtoSexo		= strip_tags(trim($_POST['sexo']));
	$produtoQtd			= strip_tags(trim($_POST['qtd']));
	$produtoCidade		= strip_tags(trim($_POST['cidade']));
	$produtoEstado		= strip_tags(trim($_POST['estado']));
	
?>


            </div><!-- fim div content conteudo-->
            
        </div> <!-- fim div content -->
		<?php include_once("footer.php")?> 
</body>
</html>
<div id="pagina">
	    
     <div class="anuncie">
     <h2>Cadastre-se e anuncie:</h2>

    <p>O Sistema de anúncios do Portal do Gado é totalmente automatizado. Você se cadastra e terá acesso a um painel de controle como área de membros onde você poderá!</p>

     <p>
     &raquo; Cadastrar Animais!<br />
     &raquo; Cadastrar Veículos! <br />
     &raquo; Editar seus Anúncios!<br />
     &raquo; Efetuar pagamentos!<br />
     &raquo; Alterar seus dados!<br />
     &raquo; e muito mais....</p>

     <p>Cadastra-se agora e comece a anunciar seus animais no maior portal de anúncios da web!</p>

     <p><strong>Duvidas? <a href="index.php?pg=contato.php"> Clique aqui!</a></strong></p>
     </div><!--fecha anuncies-->
    
    
    <form name="cadastrar_cliente" id="cadastrar_cliente" method="post" action="index.php?pg=anuncie_ok.php" enctype="multipart/form-data">
    	<fieldset> <legend> CADASTRA-SE E ANUNCIE!</legend>
            <label>
                <span> Nome Completo: </span>
                <input type="text" name="nome" />
            </label>
            
             <label>
                <span> CPF:</span>
                <input type="text" name="cpf" />
            </label>	
            
            <label>
                <span> Email: </span>
                <input type="text" name="email" />
            </label>
             <label>
                <span> Operadora Celular: </span>
                <select name="operadora" id="operadora" onchange="" style="width:150px;" size='1' class=''>
            		<option value="" selected="selected">SELECIONE</option>                    
                        <option value='CLARO'>CLARO</option>
                        <option value='CTBC'>CTBC</option>
                        <option value='OI'>OI</option>
                        <option value='TIM'>TIM</option>
                        <option value='VIVO'>VIVO</option>
                  </select>
            </label>
            
            <label>
                <span> Telefone </span>
                <input type="text" name="telefone" />
            </label>
           
    
            <label>
                <span> Senha: </span>
                <input type="password" name="senha" />
            </label>
            
            <label>
                <span> Digite a senha novamente:</span>
                <input type="password" name="senha_novamente" />
            </label>
            
            <input type="submit" name="cadastrar_cliente" id="cadastrar_cliente" value="" class="btn" />
        </fieldset>
    </form>
    
    
</div> <!-- Fecha Pagina -->


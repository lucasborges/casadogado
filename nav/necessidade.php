<div id="pagina">
	<div class="anuncie">
    
    <h2>Portal do Gado ajudando você!</h2>

    <p>O Portal do Gado tem o prazer em ajudar nossos clientes a encontrar o que procuram. Caso não encontre me nosso site o que procura 		
    	favor nos informar que localizamos para você, através de nossos parceiros!</p>
    <br/>    <br/>  
     <p><strong>Duvidas? <a href="interno.php?pg=contato.php">Clique aqui!</a></strong></p>
     
    <br/>
     </div><!--fecha anuncies-->
    
    
    <form name="cadastrar_necessidade" id="cadastrar_necessidade" method="post" action="" enctype="multipart/form-data">
    	<fieldset> <legend> INFORME O QUE VOCÊ PRECISA!</legend>
            <label>
                <span> Nome: </span>
                <input type="text" name="nome"</label>
            </label>
            
            <label>
                <span> Email: </span>
                <input type="text" name="email"</label>
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
                <span> Telefone: </span>
                <input type="text" name="telefone"</label>
            </label>
            <label>
                <span> Mensagem: </span>
           		<textarea name="mensagem" id="mensagem" style="width:500px; height:90px;" ></textarea>
           </label>
            
            <input type="submit" name="enviar" value="" class="btnEnviar"/>
        </fieldset>
    </form>
    
    
</div> <!-- Fecha Pagina -->


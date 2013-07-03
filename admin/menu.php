	<div id="content_menu"><!-- inicio div content menu-->

	<?php
		if($clienteUsuarioNivel == 'cliente'){?>
           	<ul>
               	<li><a href="painel.php?exe=home/home"> &raquo;&nbsp;Inicio</a></li>
                <li><a href="painel.php?exe=user/perfil"> &raquo;&nbsp;Editar Perfil</a></li>
               	<li class="titulo">Meus Anúncios:</li>
                <li><a href="painel.php?exe=cliente/cadastro"> &raquo;&nbsp;Criar Anúncios </a></li>
                <li><a href="painel.php?exe=produto-nav/ativos"> &raquo;&nbsp;Anúncios Ativos </a></li>
                <li><a href="painel.php?exe=produto-nav/pendentes"> &raquo;&nbsp;Anúncios Pendentes</a></li>
                <li><a href="painel.php?exe=produto-nav/vendidos"> &raquo;&nbsp;Anúnicos Vendidos</a></li>
            </ul>
           <!-- <ul>  
                <li class="titulo">Minhas Mensagens:</li>
                <li><a href="#">&raquo;&nbsp;Caixa de Entrada</a></li>
                <li><a href="#">&raquo;&nbsp;Meus E-mails</a></li>
                <li><a href="#">&raquo;&nbsp;Lista de Endereços</a></li>                    
            </ul>
            -->
    </div><!-- fim div content menu--> 
 <?php
 }elseif ($clienteUsuarioNivel == 'admin'){?> 
           	<ul>
               	<li><a href="painel.php?exe=home/home"> &raquo;&nbsp;Inicio</a></li>
               	<li class="titulo">Anunciantes:</li>
                <li><a href="painel.php?exe=admin-produtos/pendentes"> &raquo;&nbsp;Anúcios Pendentes</a></li>
                <li><a href="painel.php?exe=admin-produtos/todos"> &raquo;&nbsp;Editar Anúncio</a></li>
                <li><a href="painel.php?exe=admin-produtos/todos_clientes"> &raquo;&nbsp;Editar Cliente</a></li>
                <li><a href="#"> &raquo;&nbsp;Alterar Dados </a></li>
            </ul>
            <ul>
            <li class="titulo">Notícias:</li>
             <li><a href="painel.php?exe=adminNoticias/noticia"> &raquo;&nbsp;Criar Notícias</a></li>
              <li><a href="painel.php?exe=adminNoticias/lista_noticias"> &raquo;&nbsp;Listar Noticias</a></li>
            </ul>
            <ul>  
                <li class="titulo">Mensagens:</li>
                <li><a href="#">&raquo;&nbsp;Suporte ao Cliente</a></li>
                <li><a href="#">&raquo;&nbsp;Tickets fechados</a></li>
                <li><a href="painel.php?exe=adminInbox/inbox">&raquo;&nbsp;Mensages do Site</a></li>                    
                <li><a href="painel.php?exe=adminInbox/completos">&raquo;&nbsp;E-mails Respondidos</a></li>  
            </ul>
            <ul>  
                <li class="titulo">Msg. Interesse:</li>
                <li><a href="painel.php?exe=adminInboxInteresse/inbox">&raquo;&nbsp;Mensages do Site</a></li>                    
                <li><a href="painel.php?exe=adminInboxInteresse/completos">&raquo;&nbsp;E-mails Respondidos</a></li>  
            </ul>
		</div><!-- fim div content menu-->  
                
 <?php } else { 
 	include("deslogar.php");
 }     ?>          
                
          
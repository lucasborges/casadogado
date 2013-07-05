<div id="pagina">
    	<div class="noticias">
<?php
				$anunciosID = $_GET['editarAnuncio']; 
				$sql_buscaNoticias = 'SELECT * FROM portal_anuncios ORDER BY anunciosID DESC';
			   				   
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
					$anuncios_data		= $resNoticias['anuncios_dt'];
					$i++;
					if($i % 2 == 0){
						$cor = 'style="background:#F4F4F4;"';										
					} else {
						$cor = 'style="background:#CECEBF"';
					}?>
                    <h1><?php echo $anuncios_titulo;?></h1>                    
                    <h2>Postado em: <?php echo date('d/m/Y',strtotime($anuncios_data)) ?></h2>
                    <hr />                                        
                    <br />
                    <p> <?php echo $anuncios_msg;?></p>
                    <br />
<?php }?>
             </div> <!-- FIM DIV NOTICIAS-->
</div> <!-- Fecha Pagina -->


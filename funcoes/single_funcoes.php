<?php
	function get_produtoTitulo(){	
	
		include"Connections/config.php";
		
		if(isset($_GET['produto'])){
				$produtoId = $_GET['produto'];
			} else {
				$produtoId = $_POST['produto'];
			}
		
						
		$sql = 'SELECT * FROM portal_produto where produtoID = :produtoId';
		
		try{
			$query = $conecta->prepare($sql);
			$query->bindValue(':produtoId',$produtoId,PDO::PARAM_STR);
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOexception $errorSql){
			echo 'Erro ao selecionar anuncios' .$errorSql;
		}
		$produtoTitulo = '';		
		foreach($resultado as $res){			
			$produtoTitulo	= $res['produtoTitulo'];			
			echo '<h7>'.$produtoTitulo.'</h7>';
		}
		
		if ($produtoTitulo == ''){
			echo '<h8> Lote não encontrado.</h8>';
		}
		
	}
?>




<?php
	function get_produtoInfo(){	
	
		include"Connections/config.php";
		
		if(isset($_GET['produto'])){
				$produtoId = $_GET['produto'];
			} else {
				$produtoId = $_POST['produto'];
			}
						
		$sql = 'SELECT * FROM portal_produto where produtoID = :produtoId';
		
		try{
			$query = $conecta->prepare($sql);
			$query->bindValue(':produtoId',$produtoId,PDO::PARAM_STR);
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOexception $errorSql){
			echo 'Erro ao selecionar anuncios' .$errorSql;
		}
		
		$produtoID = '';
		foreach($resultado as $res){	
			$produtoID		= $res['produtoID'];		
			$produtoImagem	= $res['produtoImg'];
			$produtoVideo	= $res['produtoVideo'];
			$produtoTipo 	= $res['produtoTipo'];
			$produtoIdade	= $res['produtoIdade'];
			$produtoQtd		= $res['produtoQuantidade'];
			$produtoSexo 	= $res['produtoSexo'];
			$produtoCidade	= $res['produtoCidade'];
			$produtoEstado	= $res['produtoEstado'];
			$produtoValorVista 	= $res['produtoValorAvista'];
			$produtoValorPrazo 	= $res['produtoValorPrazo'];
			$produtoVisitas		= $res['produtoVisitas'];
			$imovelSomaVisitas	= $produtoVisitas + 1;
			
			$sql = 'UPDATE portal_produto set produtoVisitas = :produtoVisitas where produtoID = :produtoId';
		
			try{ 	
				$query = $conecta->prepare($sql);
				$query->bindValue(':produtoVisitas', $imovelSomaVisitas,PDO::PARAM_STR);
				$query->bindValue(':produtoId',$produtoId,PDO::PARAM_STR);
				$query->execute();
			}catch(PDOexception $errorSql){
				echo 'Erro ao atua anuncios' .$errorSql;
			}
			
			
//echo '<li>';
//echo '<img src="timthumb.php?src=midias/'.$produtoImagem.'&h=270&w=400&zc=1" alt="'.$produtoTitulo.'" title="'.$produtoTitulo.'" border="0"/>';
//echo '</li>';
		if ($produtoID != ''){			
			echo '<li>';	
			echo '<div id="container">Loading the player ...</div>';
			echo '<script type="text/javascript">';
			echo 'jwplayer("container").setup(';
			echo '{';
			echo 'flashplayer: "js/jwplayer/player.swf",';
			echo 'file: "videos/'.$produtoVideo.'",';
			echo 'height: 270,';
			echo 'width: 400,';
			echo '});';
			echo '</script>';
			echo '</li>';
				
			echo '<li>';
			echo '<h3><strong>Lote Nº:</strong> '.$produtoID.'</h3>';
			echo '<h3><strong>Tipo:</strong> '.$produtoTipo.'</h3>';
			echo '<h3><strong>Idade:</strong>  '.$produtoIdade.'</h2>';
			echo '<h3><strong>Sexo:</strong>  '.$produtoSexo.'</h2>';
			echo '<h3><strong>Quantidade:</strong>  '.$produtoQtd.'</h2>';		
			echo '<h3><strong>Cidade:</strong> '.$produtoCidade.' - '.$produtoEstado.'</h2>';
			echo '<h3><strong>Valor à Vista:</strong> '.$produtoValorVista.'</h2>';
			echo '<h3><strong>Valor à Prazo:</strong> '.$produtoValorPrazo.'</h2>';
			echo '<h3 style="color:;text-decoration:underline;"><strong>Visitado '.$imovelSomaVisitas.' vezes</strong> </h2>';
			echo '</li>';
		}
		}
	}
?>

<?php
	function get_produtoImagens(){	
		include"Connections/config.php";
		
		if(isset($_GET['produto'])){
				$produtoId = $_GET['produto'];
			} else {
				$produtoId = $_POST['produto'];
			}
						
		$sql = 'SELECT * FROM portal_midias where produtoId = :produtoId';
		
		try{
			$query = $conecta->prepare($sql);
			$query->bindValue(':produtoId',$produtoId,PDO::PARAM_STR);
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOexception $errorSql){
			echo 'Erro ao selecionar anuncios' .$errorSql;
		}
		
		foreach($resultado as $res){			
			$produtoImagem	= $res['produtoMidia'];
					
			echo '<li>';
			echo '<a href="midias/'.$produtoImagem.'" title="Portal do Gado - Foto Galeria" rel="shadowbox"><img src="timthumb.php?src=midias/'.$produtoImagem.'&h=90&w=120&zc=1" alt="'.$produtoTitulo.'" title="'.$produtoTitulo.'" border="0"/></a>';
			echo '</li>';
		}
	}
?>

<?php
	function get_produtoPreco(){	
	
		include"Connections/config.php";
		
		if(isset($_GET['produto'])){
				$produtoId = $_GET['produto'];
			} else {
				$produtoId = $_POST['produto'];
			}
						
		$sql = 'SELECT * FROM portal_produto where produtoID = :produtoId';
		
		try{
			$query = $conecta->prepare($sql);
			$query->bindValue(':produtoId',$produtoId,PDO::PARAM_STR);
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOexception $errorSql){
			echo 'Erro ao selecionar anuncios' .$errorSql;
		}
		
			
		foreach($resultado as $res){			
			$produtoValorVista 	= $res['produtoValorAvista'];
			$produtoValorPrazo 	= $res['produtoValorPrazo'];
			//echo '<h2><span>Valor à Vista: R$'. $produtoValorVista .' <br/> Valor à Prazo: R$'.$produtoValorPrazo.'</h2>';
		}
	}
?>
 			
<?php
	function get_produtoFooter(){	
	
		include"Connections/config.php";
		
		
		if(isset($_GET['produto'])){
				$produtoId = $_GET['produto'];
				$produtoTipo = $_GET['categoria'];
			} else {
				$produtoId = $_POST['produto'];
				$produtoTipo = "Gado de Corte";
			}
		
		$sql = "SELECT * FROM portal_produto where produtoStatus = 'ativos' and  produtoTipo = :produtoTipo ORDER BY RAND() LIMIT 3";
		
		try{
			$query = $conecta->prepare($sql);
			$query->bindValue(':produtoTipo',$produtoTipo,PDO::PARAM_STR);
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOexception $errorSql){
			echo 'Erro ao selecionar anuncios';
		}
		
		foreach($resultado as $res){
			$produtoTipo 	= $res['produtoTipo'];
			$produtoSexo 	= $res['produtoSexo'];
			$produtoIdade	= $res['produtoIdade'];
			$produtoCidade	= $res['produtoCidade'];
			$produtoEstado	= $res['produtoEstado'];
			$produtoImagem	= $res['produtoImg'];
			$produtoTitulo	= $res['produtoTitulo'];
			$produtoId		= $res['produtoID'];
			echo '<li>';
			echo '<span style="float:left;"><a href="midias/'.$produtoImagem.'" title="Portal do Gado - Foto Galeria" rel="shadowbox"><img src="timthumb.php?src=midias/'.$produtoImagem.'&h=90&w=120&zc=1" alt="'.$produtoTitulo.'" title="'.$produtoTitulo.'" border="0"/> </a></span>';	
			echo '<h2>'.$produtoTipo.'</h2>  <br/>';
			echo '<h3>'.$produtoCidade.' - '.$produtoEstado.'</h3>';
			echo '<a href="interno.php?pg=produto.php&produto='.$produtoId.'&categoria='.$produtoTipo.'"><img src="images/oferta_btn.png" alt="" title= "" border="0"/></a>';
			echo '</li>';
		}
	}
?>

<?php
	function get_produtoClienteId(){	
	
		include"Connections/config.php";
		
		if(isset($_GET['produto'])){
				$produtoId = $_GET['produto'];
				$produtoTipo = $_GET['categoria'];
			} else {
				$produtoId = $_POST['produto'];
				$produtoTipo = "Gado de Corte";
			}
		
		$sql = "SELECT * FROM portal_produto where produtoStatus = 'ativos' and  produtoID = :produtoId";
		
		try{
			$query = $conecta->prepare($sql);
			$query->bindValue(':produtoId',$produtoId,PDO::PARAM_STR);
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOexception $errorSql){
			echo 'Erro ao selecionar anuncios';
		}
		
		foreach($resultado as $res){
			$produtoClienteId = $res['clienteID'];
			echo $produtoClienteId;
			
		}
	}
?>

<?php
	function portal_homePostFooter(){	
	
		include"Connections/config.php";
		$sql = "SELECT * FROM portal_produto where produtoStatus = 'ativos' ORDER BY RAND() LIMIT 6";
		
		try{
			$query = $conecta->prepare($sql);
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOexception $errorSql){
			echo 'Erro ao selecionar anuncios';
		}
		
		foreach($resultado as $res){
			$produtoTipo 	= $res['produtoTipo'];
			$produtoSexo 	= $res['produtoSexo'];
			$produtoIdade	= $res['produtoIdade'];
			$produtoCidade	= $res['produtoCidade'];
			$produtoEstado	= $res['produtoEstado'];
			$produtoImagem	= $res['produtoImg'];
			$produtoTitulo	= $res['produtoTitulo'];
			$produtoId		= $res['produtoID'];
			echo '<li>';					
			echo '<span style="float:left;"><a href="midias/'.$produtoImagem.'" title="Portal do Gado - Foto Galeria" rel="shadowbox"><img src="timthumb.php?src=midias/'.$produtoImagem.'&h=90&w=120&zc=1" alt="'.$produtoTitulo.'" title="'.$produtoTitulo.'" border="0"/> </a></span>';	
			echo '<h2>'.$produtoTipo.'</h2>  <br/>';
			echo '<h3>'.$produtoCidade.' - '.$produtoEstado.'</h3>';
			echo '<a href="interno.php?pg=produto.php&produto='.$produtoId.'&categoria='.$produtoTipo.'"><img src="images/oferta_btn.png" alt="" title= "" border="0"/></a> ';
			echo '</li>';
		}
	}
?>


<?php
	function get_produtoCategoria(){
		include"Connections/config.php";
		
		$pag = "$_GET[pag]";
		if($pag >= '1'){
			 $pag = $pag;
		}else{
			 $pag = '1';
		}
							
		$maximo = '10'; //RESULTADOS POR PÁGINA
		$inicio = ($pag * $maximo) - $maximo;
		$categoria = $_GET['categoria'];
		$sql = 'SELECT * FROM portal_produto where produtoTipo = :categoria ORDER BY produtoID desc limit '.$inicio.','.$maximo;
		
		try{
			$query = $conecta->prepare($sql);
			$query->bindValue(':categoria',$categoria,PDO::PARAM_STR);
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOexception $errorSql){
			echo 'Erro ao selecionar anuncios' .$errorSql;
		}
		
		foreach($resultado as $res){
			$produtoTipo 	= $res['produtoTipo'];
			$produtoSexo 	= $res['produtoSexo'];
			$produtoIdade	= $res['produtoIdade'];
			$produtoCidade	= $res['produtoCidade'];
			$produtoEstado	= $res['produtoEstado'];
			$produtoImagem	= $res['produtoImg'];
			$produtoId		= $res['produtoID'];
			$produtoQtd		= $res['produtoQuantidade'];
			
			echo '<h7>'.$produtoTitulo.'</h7>';
			echo '<tr>';
				echo '<td align="center" bgcolor="#fff"><h2>
				<a href="midias/'.$produtoImagem.'" title="Portal do Gado - Foto Galeria" rel="shadowbox">
				<img src="timthumb.php?src=midias/'.$produtoImagem.'&h=50&w=100&zc=1" alt="'.$produtoTitulo.'" title="'.$produtoTitulo.'" border="0"/></a></td>';				
				echo '<td align="center" bgcolor="#fff"><h2>'. $produtoTipo .'</h2></td>';
				echo '<td align="center" bgcolor="#fff"><h2>'. $produtoSexo .'</h2></td>';
				echo '<td align="center" bgcolor="#fff"><h2>'. $produtoQtd .'</h2></td>';
				echo '<td align="center" bgcolor="#fff"><h2>'. $produtoIdade .'</h2></td>';
				echo '<td align="center" bgcolor="#fff"><h2>'. $produtoCidade .' - ' .$produtoEstado . '</h2></td>';
				echo '<td align="center" bgcolor="#fff" width="100"><a href="index.php?pg=produto.php&produto='.$produtoId.'&categoria='.$produtoTipo.'">Veja Mais</a></td>';
			echo '</tr>';	  
			echo '<tr> </tr>';
			echo '<tr> </tr>';
		}
		echo '</table>';
		
		
		$sql_res = "SELECT * FROM portal_produto where produtoTipo = :categoria ORDER BY produtoID desc";

	try{
			$query = $conecta->prepare($sql_res);
			$query->bindValue(':categoria',$categoria,PDO::PARAM_STR);
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			
		}catch(PDOexception $errorSql){
			echo 'Erro ao selecionar anuncios' .$errorSql;
		}
		
		$total = sizeof($resultado); // Quantidade de registros pra paginação
		$paginas = ceil($total/$maximo);
		$links = '5'; //QUANTIDADE DE LINKS NO PAGINATOR
		if($total > $maximo){
			echo "<div class='paginator'><a href=\"index.php?pg=categoria.php&categoria=$categoria&amp;pag=1\">Primeira Página</a>&nbsp;&nbsp;&nbsp;</div>";

	for ($i = $pag-$links; $i <= $pag-1; $i++){
		if ($i <= 0){
		}else{
			echo"<div class='paginator'><a href=\"index.php?pg=categoria.php&categoria=$categoria&amp;pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;</div>";
		}
	}
	
	echo"<div class='paginator'> $pag &nbsp;&nbsp;&nbsp;</div>";

	for($i = $pag +1; $i <= $pag+$links; $i++){
		if($i > $paginas){
		}else{
			echo "<div class='paginator'><a href=\"index.php?pg=categoria.php&categoria=$categoria&amp;pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;</div>";
		}
	}
echo "<div class='paginator'><a href=\"index.php?pg=categoria.php&categoria=$categoria&amp;pag=$paginas\">Última página</a>&nbsp;&nbsp;&nbsp;</div>";
			}

	}
?>
<?php
	function get_produtoTitulo(){	
	
		include"Connections/config.php";
		
		$produtoId = $_GET['produto'];
						
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
			$produtoTitulo	= $res['produtoTitulo'];
			
			echo '<h7>'.$produtoTitulo.'</h7>';
		}
	}
?>




<?php
	function get_produtoInfo(){	
	
		include"Connections/config.php";
		
		$produtoId = $_GET['produto'];
						
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
					
		echo '<li>';	
		echo '<div id="container">Loading the player ...</div>';
		echo '<script type="text/javascript">';
		echo 'jwplayer("container").setup(';
		echo '{';
		echo 'flashplayer: "js/jwplayer/player.swf",';
		echo 'file: "videos/'.$produtoVideo.'",';
		echo 'height: 270,';
		echo 'width: 400,';
		echo 'skin: "/skins/modieus/modieus.zip"';
		echo '});';
		echo '</script>';
		echo '</li>';
			
		echo '<li>';
		echo '<h3><strong>Tipo:</strong> '.$produtoTipo.'</h3>';
		echo '<h3><strong>Idade:</strong>  '.$produtoIdade.'</h2>';
		echo '<h3><strong>Sexo:</strong>  '.$produtoSexo.'</h2>';
		echo '<h3><strong>Quantidade:</strong>  '.$produtoQtd.'</h2>';		
		echo '<h3><strong>Cidade:</strong> '.$produtoCidade.' - '.$produtoEstado.'</h2>';
		echo '<h3 style="color:;text-decoration:underline;"><strong>Visitado '.$imovelSomaVisitas.' vezes</strong> </h2>';			
		echo '</li>';
		}
	}
?>

<?php
	function get_produtoImagens(){	
	
		include"Connections/config.php";
		
		$produtoId = $_GET['produto'];
						
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
		
		$produtoId = $_GET['produto'];
						
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
			echo '<h2><span>R$'. $produtoValorVista .' ou R$'.$produtoValorPrazo.'<br/></span> Compre o lote e pague em até 12 x no cartão ou com desconto à vista.</h2>';
		}
	}
?>
 			
<?php
	function get_produtoFooter(){	
	
		include"Connections/config.php";
		
		$produtoTipo = $_GET['categoria'];
		$produtoId   = $_GET['produto']; 
		
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
		
		$produtoTipo = $_GET['categoria'];
		$produtoId   = $_GET['produto']; 
		
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
	function get_produtoCategoria(){	
	
		include"Connections/config.php";
		
		$categoria = $_GET['categoria'];
						
		$sql = 'SELECT * FROM portal_produto where produtoTipo = :categoria ORDER BY produtoID desc LIMIT 10';
		
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

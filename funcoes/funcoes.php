<?php
function portal_headerImg(){	

include"Connections/config.php";
		$sql = "SELECT * FROM portal_produto where produtoStatus = 'ativos' ORDER BY RAND() LIMIT 5";
		
		try{
			$query = $conecta->prepare($sql);
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOexception $errorSql){
			echo 'Erro ao selecionar noticias;';
		}
		
		foreach($resultado as $res){
			$produtoTipo 	= $res['produtoTipo'];
			$produtoSexo 	= $res['produtoSexo'];
			$produtoIdade	= $res['produtoIdade'];
			$produtoCidade	= $res['produtoCidade'];
			$produtoEstado	= $res['produtoEstado'];
			$produtoSexo	= $res['produtoSexo'];
			$produtoImagem	= $res['produtoImg'];
			$produtoTitulo	= $res['produtoTitulo'];
			$produtoId		= $res['produtoID'];
			
		echo '<li>';
		echo '<a href="interno.php?pg=produto.php&produto='.$produtoId.'&categoria='.$produtoTipo.'"><img src="timthumb.php?src=midias/'.$produtoImagem.'&h=280&w=690&zc=1" alt="'.$produtoTitulo.'" title="'.$produtoTitulo.'" border="0"/></a>';	    
		echo '</li>';
	}
	
}?>

<?php
function portal_headerNoticias(){	

include"Connections/config.php";
		$sql = "SELECT * FROM portal_anuncios ORDER BY anunciosID desc limit 3";
		
		try{
			$query = $conecta->prepare($sql);
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOexception $errorSql){
			echo 'Erro ao selecionar noticias;';
		}
		
		foreach($resultado as $res){
			$anuncioTitulo 	= $res['anuncios_titulo'];
			$anuncioData	= $res['anuncios_dt'];
			$anuncioID		= $res['anunciosID'];
			
		echo '<li>';
		echo '<h1>'. date('d/m/Y',strtotime($anuncioData)) .'</h1>';
		echo '<h2><a href="interno.php?pg=noticias_single.php&editarAnuncio='.$anuncioID.'">'. $anuncioTitulo .'</a></h2>';
		echo '</li>';
	}
}
?>
<?php

	function portal_homePosts(){	
	
		include"Connections/config.php";
		$sql = "SELECT * FROM portal_produto where produtoStatus = 'ativos' ORDER BY produtoID desc limit 3";
		
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
			$produtoSexo	= $res['produtoSexo'];
			$produtoImagem	= $res['produtoImg'];
			$produtoTitulo	= $res['produtoTitulo'];
			$produtoId		= $res['produtoID'];
			echo '<li>';
			echo '<a href="midias/'.$produtoImagem.'" title="Portal do Gado - Foto Galeria" rel="shadowbox"><img src="timthumb.php?src=midias/'.$produtoImagem.'&h=90&w=120&zc=1" alt="'.$produtoTitulo.'" title="'.$produtoTitulo.'" border="0"/></a>';		
			echo '<h2>'.$produtoTipo.'</h2>';
			echo '<h3><strong>Sexo: </strong>'.$produtoSexo.'</h3>';
			echo '<h3><strong>Idade: </strong>'.$produtoIdade.'</h3>';
			echo '<h3>'.$produtoCidade.' - '.$produtoEstado.'</h3>';
			echo '<h4> <a href="interno.php?pg=produto.php&produto='.$produtoId.'&categoria='.$produtoTipo.'">Veja mais</a></h4>';
			echo '</li>';
		}
		
	}

?>

<?php

	function portal_homePosts2(){	
	
		include"Connections/config.php";
		$sql = "SELECT * FROM portal_produto where produtoStatus = 'ativos' ORDER BY produtoID desc limit 3,3";
		
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
			echo '<a href="midias/'.$produtoImagem.'" title="Portal do Gado - Foto Galeria" rel="shadowbox"><img src="timthumb.php?src=midias/'.$produtoImagem.'&h=90&w=120&zc=1" alt="'.$produtoTitulo.'" title="'.$produtoTitulo.'" border="0"/></a>';	
			echo '<h2>'.$produtoTipo.'</h2>';
			echo '<h3><strong>Sexo: </strong>'.$produtoSexo.'</h3>';
			echo '<h3><strong>Idade: </strong>'.$produtoIdade.'</h3>';
			echo '<h3>'.$produtoCidade.' - '.$produtoEstado.'</h3>';
			echo '<h4> <a href="interno.php?pg=produto.php&produto='.$produtoId.'&categoria='.$produtoTipo.'">Veja mais</a></h4>';
			echo '</li>';
		}
		
	}
?>

<?php

	function portal_homePosts3(){	
	
		include"Connections/config.php";
		$sql = "SELECT * FROM portal_produto where produtoStatus = 'ativos' ORDER BY produtoID desc limit 6,3";
		
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
			echo '<a href="midias/'.$produtoImagem.'" title="Portal do Gado - Foto Galeria" rel="shadowbox"><img src="timthumb.php?src=midias/'.$produtoImagem.'&h=90&w=120&zc=1" alt="'.$produtoTitulo.'" title="'.$produtoTitulo.'" border="0"/></a>';	
			echo '<h2>'.$produtoTipo.'</h2>';
			echo '<h3><strong>Sexo: </strong>'.$produtoSexo.'</h3>';
			echo '<h3><strong>Idade: </strong>'.$produtoIdade.'</h3>';
			echo '<h3>'.$produtoCidade.' - '.$produtoEstado.'</h3>';
			echo '<h4> <a href="interno.php?pg=produto.php&produto='.$produtoId.'&categoria='.$produtoTipo.'">Veja mais</a></h4>';
			echo '</li>';
		}
		
	}
?>

<?php
	function portal_homePostFooter(){	
	
		include"Connections/config.php";
		$sql = "SELECT * FROM portal_produto where produtoStatus = 'ativos' ORDER BY RAND() LIMIT 5";
		
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



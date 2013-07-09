<!-- JS -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery_validate.js"></script>
<script type="text/javascript" src="js/validate_func.js"></script>
<script type="text/javascript" src="js/filtro.js"></script>
<script type="text/javascript" src="js/cycle.js"></script>
<script type="text/javascript" src="js/shadowbox_js/shadowbox.js"></script>
<script type="text/javascript" src="js/jwplayer/jwplayer.js"></script>
<link rel="stylesheet" type="text/css" href="js/shadowbox_js/shadowbox.css">

<script type="text/javascript">
Shadowbox.init({
    language: 'pt',
    players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv'],
});

$(function(){		
		$('#header_img_noticias_2 ul').cycle({
			fx:'fade',
			speed:1000,
			timeout:3000
		})
		
	})

</script>
<!-- PHP -->
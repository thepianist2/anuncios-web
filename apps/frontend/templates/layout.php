<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="es-ES">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Merienda&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <?php include_stylesheets() ?> 
    <?php include_javascripts() ?>
    <script type="text/javascript">
	$(document).ready(function() {  
		$('a.link').click(function () {  
			$('#wrapper').scrollTo($(this).attr('href'), 800);
			setPosition($(this).attr('href'), '#cloud1', '0px', '400px', '800px', '1200px')
			setPosition($(this).attr('href'), '#cloud2', '0px', '800px', '1600px', '2400px')
			$('a.link').removeClass('selected');  
			$(this).addClass('selected');
			return false;  
		});  
	});
	function setPosition(check, div, p1, p2, p3, p4) {
	if(check==='#box1')
		{
			$(div).scrollTo(p1, 800);
                        $('#buscar-anuncio').activity({segments: 12, width: 8, space: 6, length: 13, color: '#252525', speed: 2.5});
                 $("#buscar-anuncio").load('<?php  echo url_for('default/index') ?>',{},function() {
                 });                       
		}
	else if(check==='#box2')
		{
			$(div).scrollTo(p2, 800);
                        $('#publicar-anuncio').activity({segments: 12, width: 8, space: 6, length: 13, color: '#252525', speed: 2.5});
                $("#publicar-anuncio").load('<?php  echo url_for('default/new') ?>',{},function() {
                    $('#publicar-anuncio').activity(false);
                 });
		}
	else if(check==='#box3')
		{
			$(div).scrollTo(p3, 800);
                        $('#gestionar-anuncios').activity({segments: 12, width: 8, space: 6, length: 13, color: '#252525', speed: 2.5});
                $("#gestionar-anuncios").load('<?php  echo url_for('default/new') ?>',{},function() {
                    $('#gestionar-anuncios').activity(false);
                 });                        
		}
	else
		{
			$(div).scrollTo(p4, 800);
		}
	};
        
        
        

	</script>
   
  </head>
  <body>
	<div id="cloud1" class="clouds">
    	<div id="clouds-small"></div>
    </div><!-- end clouds -->
    <div id="cloud2" class="clouds">
        <div id="clouds-big"></div>
    </div><!-- end clouds -->
	<div id="header">
    	<ul id="menu">          
            <li class="caja" id="box1" ><a id="box1" href="#box1" class="link">Buscar Anuncio</a></li>
          <li class="caja" id="box2" ><a id="box2" href="#box2" class="link">Publicar un anuncio</a></li>
            <li class="caja" id="box3" ><a id="box3" href="#box3" class="link">Gestionar Anuncios</a></li>
            <li class="caja" id="box4" ><a id="box4" href="#box4" class="link">Condiciones de uso</a></li>
            <li class="caja" id="box5" ><a id="box5" href="#box5" class="link">Política de privacidad</a></li>
      </ul>
</div><!-- end header -->
	<div id="wrapper">
    	<ul id="mask">
        	<li id="box1" class="box">
                    <?php include_partial('bloque/bloqueCabecera'); ?> 
                <div id="buscar-anuncio" class="content"><?php echo $sf_content ?></div>
            </li><!-- end box1 -->
            <li id="box2" class="box">
                <?php include_partial('bloque/bloqueCabecera'); ?> 
                <div id="publicar-anuncio" class="content"></div>
            </li><!-- end box2 -->
            <li id="box3" class="box">
                <?php include_partial('bloque/bloqueCabecera'); ?> 
                <div id="gestionar-anuncios" class="content">                
                </div>
            </li><!-- end box3 -->
        </ul><!-- end mask -->
    </div><!-- end wrapper -->
<!--      <div id="contenedor">

      </br></br>
      
       </div>-->
    <?php include_partial('bloque/bloqueMensaje'); ?> 
    
          <?php $ano=date('Y') ?>
          <br></br>
<div id="info_site"><img class="logo" src="" alt=""> <strong>© <?php echo $ano ?> Allel software </strong>
<ul class="avisos">
<li><a >Aviso legal</a></li>
<li><a >Política de privacidad</a></li>
</ul>
</div>
      
  </body>
</html>
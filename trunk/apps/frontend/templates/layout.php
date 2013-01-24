<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="es-ES">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Merienda&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
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
		}
	else if(check==='#box2')
		{
			$(div).scrollTo(p2, 800);
		}
	else if(check==='#box3')
		{
			$(div).scrollTo(p3, 800);
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
       	  <li><a href="#box1" class="link">Buscar Anuncio</a></li>
            <li><a href="#box2" class="link">Gestionar Anuncios</a></li>
            <li><a href="#box3" class="link">Publicar un anuncio</a></li>
            <li><a href="#box4" class="link">Box 4</a></li>
      </ul>
</div><!-- end header -->
	<div id="wrapper">
    	<ul id="mask">
        	<li id="box1" class="box">
            	<a name="box1"></a>
                          <div id="cabecera-principal">
            <h2 id="letra-titulo">Busca todos tus anuncios aquí</h2><br><br>
                    <a  href="<?php echo url_for('default/new') ?>"><img height="60" class="iconos-cabecera" style="margin-left: 85px;"  title="Gestionar anuncios" alt="Gestionar anuncios" src="/images/frontend/gestionar.png"></a> 
                <a href="<?php echo url_for('default/new') ?>"><img height="60" class="iconos-cabecera"  title="nuevo anuncio" alt="nuevo anuncio" src="/images/frontend/publicar-anuncio.png"></a> 
          <a  href="<?php echo url_for('default/index') ?>"><img height="60" class="iconos-cabecera"  title="Ir a buscar Anuncios" alt="Ir a buscar Anuncios" src="/images/frontend/Preview.png"></a> 
                                <div id="cabecera">
              
              <a href="<?php echo url_for('homepage') ?>"><img height="118" src="/images/frontend/portada.png"></img></a>
          </div>
                                
          </div>
                <div class="content"><?php echo $sf_content ?></div>
            </li><!-- end box1 -->
            <li id="box2" class="box">
            	<a name="box2"></a>
                <div class="content"><div class="inner">Box 2</div></div>
            </li><!-- end box2 -->
            <li id="box3" class="box">
            	<a name="box3"></a>
                <div class="content"><div class="inner">Box 3</div></div>
            </li><!-- end box3 -->
            <li id="box4" class="box">
            	<a name="box4"></a>
                <div class="content"><div class="inner">Box 4</div></div>
            </li><!-- end box4 -->
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

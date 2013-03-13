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
                        $('#buscar-anuncio').html("");
                        $('#buscar-anuncio').activity({segments: 12, width: 8, space: 6, length: 13, color: '#252525', speed: 2.5});
                 $("#buscar-anuncio").load('<?php  echo url_for('default/index') ?>',{},function() {
                     $('#buscar-anuncio').activity(false);
                     window.history.pushState(null, 'Buscar Anuncio', '<?php  echo url_for('default/index') ?>');
                 });      
                 
		}
	else if(check==='#box2')
		{
			$(div).scrollTo(p2, 800);
                        $('#publicar-anuncio').html("");
                        $('#publicar-anuncio').activity({segments: 12, width: 8, space: 6, length: 13, color: '#252525', speed: 2.5});
                $("#publicar-anuncio").load('<?php  echo url_for('default/new') ?>',{},function() { 
                        $('#publicar-anuncio').activity(false);
                        window.history.pushState(null, 'Publicar Anuncio', '<?php  echo url_for('default/new') ?>'); 
                 }); 
		}
	else if(check==='#box3')
		{
			$(div).scrollTo(p3, 800);
                        $('#gestionar-anuncios').html("");
                        $('#gestionar-anuncios').activity({segments: 12, width: 8, space: 6, length: 13, color: '#252525', speed: 2.5});
                        $('#gestionar-anuncios').activity(false);
                        $('a.link').removeClass('selected');  
			$('#box3').addClass('selected');
		}
	else if(check==='#box4')
		{
			$(div).scrollTo(p4, 800);
                        $('#condiciones-uso').html("");
                        $('#condiciones-uso').activity({segments: 12, width: 8, space: 6, length: 13, color: '#252525', speed: 2.5});
                $("#condiciones-uso").load('<?php  echo url_for('contenido/mostrar') ?>',{'id':1},function() {
                    $('#condiciones-uso').activity(false);
                    window.history.pushState(null, 'Condiciones de uso y política de privacidad', '<?php  echo url_for('contenido/mostrar?id=1') ?>');
                 });                              
		}           
	};
        
        
        

	</script>
   
  </head>
  <body>
	<div id="cloud1" class="clouds">
<!--    	<div id="clouds-small"></div>-->
    </div><!-- end clouds -->
    <div id="cloud2" class="clouds">
<!--        <div id="clouds-big"></div>-->
    </div><!-- end clouds -->
	<div id="header">
    	<ul id="menu">          
            <li class="caja" id="box1" ><a id="box1" href="#box1" class="link">Buscar Anuncio</a></li>
          <li class="caja" id="box2" ><a id="box2" href="<?php echo url_for('default/new') ?>" class="link">Publicar un anuncio</a></li>
          <?php if($sf_user->isAuthenticated()){ ?>
            <li class="caja" id="box3" ><a id="box3" href="<?php  echo url_for('tusAnuncios/index') ?>" class="link">Gestionar Anuncios</a></li>
           <?php }else{ ?>
            <li class="caja" id="box3" ><a id="box3" href="<?php echo url_for('@sf_guard_signin') ?>" class="link">Gestionar Anuncios</a></li>
            <?php } ?>
            <li class="caja" id="box4" ><a id="box4" href="<?php  echo url_for('contenido/mostrar?id=1') ?>" class="link">Condiciones de uso y Política de privacidad</a></li>
            <li class="caja" id="box5" ><a id="box5" href="<?php echo url_for('contacto/new') ?>" class="link">Contactar</a></li>
            <?php if($sf_user->isAuthenticated()){ ?>
            <li class="caja" id="box6" ><a id="box6" href="<?php echo url_for('usuario/edit') ?>" class="link">Usuario</a></li>
            <li class="caja" id="box7" ><a id="box7" href="<?php echo url_for('sf_guard_signout') ?>" class="link">Salir</a></li>
            <?php } ?>
      </ul>
</div><!-- end header -->
	<div id="wrapper">
            <div id="ver" style="display: none;"></div>
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
            <li id="box4" class="box">
                <?php include_partial('bloque/bloqueCabecera'); ?> 
                <div id="condiciones-uso" class="content">                
                </div>
            </li><!-- end box4 -->                         
        </ul><!-- end mask -->

<script type="text/javascript"><!--
google_ad_client = "ca-pub-9136506847276398";
/* 728abajo */
google_ad_slot = "8915613885";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

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
<a href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=desarrollo.tusanunciosweb.es','SiteLock','width=600,height=600,left=160,top=170');"><img alt="Homepage-Sicherheit" title="1&1 SiteLock" src="//shield.sitelock.com/shield/desarrollo.tusanunciosweb.es"/></a>
</div>
      
  </body>
</html>


<script type="text/javascript">


          $('#box3r').click(function() {
        var id = $(this).attr('id');
        dialog = $.ajax({
            type: 'GET',
            url: '<?php echo url_for('sf_guard_signin') ?>',
            async: false
        }).responseText;
        $('#ver').html(dialog);
        $("#ver").dialog({
            resizable: true,
            width: 800,
            modal: true,
            show: { effect: 'drop', direction: "up" },
            title: "<?php echo 'Iniciar sesión'; ?>"
        });
    }); 


</script>
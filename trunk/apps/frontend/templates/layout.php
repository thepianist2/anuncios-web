<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="es-ES">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <?php include_stylesheets() ?> 
    <?php include_javascripts() ?>

   
  </head>
  <body>
      <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--	<div id="cloud1" class="clouds">
    	<div id="clouds-small" ></div>
    </div> end clouds -->
<!--    <div id="cloud2" class="clouds">-->
<!--        <div id="clouds-big"></div>-->
<!--    </div> end clouds -->
	<div id="header">
    	<ul id="menu">          
            <li class="caja" id="box1" ><a id="box1" href="<?php echo url_for('default/index') ?>" class="link">Buscar Anuncio</a></li>
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
                <div id="buscar-anuncio" class="content">

            <div id="skydcha" style="position: absolute;margin-left: 0px;right: -140px;top: 0px;">
         <script type="text/javascript"><!--
google_ad_client = "ca-pub-9136506847276398";
/* skydcha */
google_ad_slot = "7237391080";
google_ad_width = 120;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>       
                
                
            </div>
            <div id="skyizda" style="position: absolute;margin-left: 0px;left: -140px;top: 0px;">
                <script type="text/javascript"><!--
google_ad_client = "ca-pub-9136506847276398";
/* skyizda */
google_ad_slot = "8714124287";
google_ad_width = 120;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
            </div>
             
                     </br> </br> </br>
                    <?php echo $sf_content ?></div>
            </li><!-- end box1 -->
                                   
        </ul><!-- end mask -->
        </br> </br> </br>
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
          <div id="info_site"><strong>© <?php echo $ano ?> Allel software </strong>
<ul class="avisos">
    <li><a href="<?php  echo url_for('contenido/mostrar?id=1') ?>">Aviso legal</a></li>
    <li><a href="<?php  echo url_for('contenido/mostrar?id=1') ?>">Política de privacidad</a></li>
</ul>
<a href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=desarrollo.tusanunciosweb.es','SiteLock','width=600,height=600,left=160,top=170');"><img alt="Homepage-Sicherheit" title="1&1 SiteLock" src="//shield.sitelock.com/shield/desarrollo.tusanunciosweb.es"/></a>
</div>
      
  </body>
</html>



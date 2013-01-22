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
   
  </head>
  <body>
      <div id="contenedor">
          <div id="cabecera-principal">
            <h2 id="letra-titulo">Busca todos tus anuncios aquí</h2><br>
                <a class="nuevo-anuncio" href="<?php echo url_for('default/new') ?>"><img height="80" style="margin-left: 115px;"  title="nuevo anuncio" alt="nuevo anuncio" src="/images/frontend/publicar-anuncio.png"><br><br>Publicar Anuncio</a> 
          <div id="cabecera">
              
              <a href="<?php echo url_for('homepage') ?>"><img height="118" src="/images/frontend/portada.png"></img></a>
          </div>
                                
          </div>
      </br></br>
      
      
    <?php include_partial('bloque/bloqueMensaje'); ?> 
    <?php echo $sf_content ?>
          <?php $ano=date('Y') ?>
          <br></br>
<div id="info_site"><img class="logo" src="" alt=""> <strong>© <?php echo $ano ?> Allel software </strong>
<ul class="avisos">
<li><a >Aviso legal</a></li>
<li><a >Política de privacidad</a></li>
</ul>
</div>
       </div>
  </body>
</html>

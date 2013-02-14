<?php if($sf_user->isAuthenticated()){ ?>
<script type="text/javascript">
$(document).ready(function(){
  $("#navmenu-h li,#navmenu-v li").hover(
    function() { $(this).addClass("iehover"); },
    function() { $(this).removeClass("iehover"); }
  );
});
</script>
<ul id="navmenu-v">
        <li><a href="<?php echo url_for('default/index'); ?>">Inicio</a></li>
        <li><a href="<?php echo url_for('default/index'); ?>">Anuncios +</a>
          <ul>
            <li><a href="<?php echo url_for('comentario/indexTodos'); ?>">Comentarios anuncios</a></li>  
          </ul>
        </li>
        <li><a href="<?php echo url_for('categoriaAnuncio/index'); ?>">Categorías Anuncios</a></li>
        <li><a href="<?php echo url_for('provinciaAnuncio/index'); ?>">Provincias</a></li>
        <li><a href="<?php echo url_for('usuario/index'); ?>">Usuarios</a></li>
        <li><a href="<?php echo url_for('sf_media_browser/index'); ?>">Libreria de archivos</a></li>
        <li><a href="<?php echo url_for('contenido/index') ?>">Contenido web +</a>
            <ul>
                <li><a href="<?php echo url_for('categoriaContenido/index'); ?>">Categorías</a></li>
            </ul>
        </li>
        <li><a href="<?php echo url_for('contacto/index'); ?>">Contactos</a></li>
        <li><a href="<?php echo url_for('configuracion/index'); ?>">Configuración</a></li>
        <li><a href="<?php echo url_for('sf_guard_signout') ?>">Salir</a></li>
      </ul>

<?php } ?>
<?php use_helper('Date') ?>
<h1>Solicitudes de contacto a Anuncios </h1>
<div id="buscador">
<?php include_partial('contactoAnuncio/buscador', array('query' => $query)); ?>
</div>
<br>
<div  id="numero-elementos">
<?php echo "Hay un total de ".count($contacto_anuncios)." elementos" ?>
</div>
<br></br>
<?php  include_component('bloque', 'bloquePaginador', array('pager' => $contacto_anuncios, 'action' => $action)) ?>
<br></br>
<div class="enlaces-centro">
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nuevo', 'contactoAnuncio/new', array('title' => 'Nuevo')) ?>
</div>
<br></br>
<table class="listado contenido">
  <thead>
    <tr>
      <th>Título Anuncio</th>
      <th>Nombre</th>
      <th>Email</th>
      <th>Teléfono</th>
      <th>Creado en</th>
      <th colspan="2"><?php echo 'Acciones'?></th>            
    </tr>
  </thead>
  <tbody>
      <?php $i = 1 ?>  
    <?php foreach ($contacto_anuncios as $contacto_anuncio): ?>
      <tr id="<?php echo $contacto_anuncio->id ?>" class="<?php echo ($i % 2 == 0 ? 'par' : 'impar') ?>">
      <td><a  target="_blank" href="<?php echo url_for('default/show?id='.$contacto_anuncio->getAnuncio()->id) ?>"><?php echo $contacto_anuncio->getAnuncio()->getTitulo(); ?></a></td>
      <td><?php echo $contacto_anuncio->getNombre() ?></td>
      <td><?php echo $contacto_anuncio->getEmail() ?></td>
      <td><?php echo $contacto_anuncio->getTelefono() ?></td>
      <td><?php echo format_date($contacto_anuncio->getCreatedAt(), 'r') ?></td>
      <td class="accionListado"><a class="ver" id="<?php echo $contacto_anuncio->id ?>" href="javascript:void()"><img  title="Vista previa" alt="Vista previa" src="/images/iconos/vistaPrevia.png"></img></a></td>
      <td class="accionListado"><a href="javascript:void()" onclick="javascript:eliminar('<?php echo url_for('contactoAnuncio/delete?id='.$contacto_anuncio->id) ?>',<?php echo $contacto_anuncio->id ?>)"><img src="/images/iconos/borrar.png"></img></a></td>  

      </tr>
    <?php $i = $i + 1; ?>
    <?php endforeach; ?>
  </tbody>
</table>
<br></br>
<div class="enlaces-centro">
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nuevo', 'contactoAnuncio/new', array('title' => 'Nuevo')) ?>
</div>
<br></br>
<?php  include_component('bloque', 'bloquePaginador', array('pager' => $contacto_anuncios, 'action' => $action)) ?>
<br></br>

<div id="ajax-favoritos"></div>
<div id="eliminar" style="display: none;"></div>
<div id="ver" style="display: none;"></div>
<script type="text/javascript">


          $('.ver').click(function() {
        var id = $(this).attr('id');
        dialog = $.ajax({
            type: 'GET',
            url: '<?php echo url_for('contactoAnuncio/show?id=') ?>'+id,
            async: false
        }).responseText;
        $('#ver').html(dialog);
        $("#ver").dialog({
            resizable: true,
            width: 800,
            modal: true,
            show: { effect: 'drop', direction: "up" },
            title: "<?php echo 'Solicitud de contactoAnuncio'; ?>"
        });
    }); 









function switchPremium(url,imagen,id_inmueble)
{
//    if($('#imagen_fav_'+id_inmueble).attr('src') == imagen) {
//        if (confirm("¿Desea realizar este cambio?")) {
            $('#ajax-favoritos').load(url,{},function() {
                $('#imagen_fav_'+id_inmueble).attr('src',imagen);
                $('#icono_favorito_'+id_inmueble).attr('onmouseover','');
                $('#icono_favorito_'+id_inmueble).attr('onmouseout','');
                $('#imagen_fav_'+id_inmueble).attr('title','');
                $('#imagen_fav_'+id_inmueble).attr('alt','');
                //para lo contrario activar desactivar
//                 setTimeout("refrescar()",1500)
//                $().toastmessage('showSuccessToast', "Cambio realizado");
    window.location.reload();
            });
//        }      
//    }
}


function refrescar(){
    window.location.reload();
}

function switchLogado(url,imagen,id_inmueble)
{
//    if($('#imagen_fav_'+id_inmueble).attr('src') == imagen) {
//        if (confirm("¿Desea realizar este cambio?")) {
            $('#ajax-favoritos').load(url,{},function() {
                $('#imagen_logado_'+id_inmueble).attr('src',imagen);
                $('#icono_logado_'+id_inmueble).attr('onmouseover','');
                $('#icono_logado_'+id_inmueble).attr('onmouseout','');
                $('#imagen_logado_'+id_inmueble).attr('title','');
                $('#imagen_logado_'+id_inmueble).attr('alt','');
                //para lo contrario activar desactivar
//                 setTimeout("refrescar()",1500)
//                $().toastmessage('showSuccessToast', "Cambio realizado");
    window.location.reload();
            });
//        }      
//    }
}

function switchActivo(url,imagen,id_inmueble)
{
//    if($('#imagen_fav_'+id_inmueble).attr('src') == imagen) {
//        if (confirm("¿Desea realizar este cambio?")) {
            $('#ajax-favoritos').load(url,{},function() {
                $('#imagen_activo_'+id_inmueble).attr('src',imagen);
                $('#icono_activo_'+id_inmueble).attr('onmouseover','');
                $('#icono_activo_'+id_inmueble).attr('onmouseout','');
                $('#imagen_activo_'+id_inmueble).attr('title','');
                $('#imagen_activo_'+id_inmueble).attr('alt','');
//                //para lo contrario activar desactivar
//                 setTimeout("refrescar()",1500)
//                $().toastmessage('showSuccessToast', "Cambio realizado");
    window.location.reload();
            });
//        }      
//    }
}


            function eliminar(url,idImagen){
                if (confirm("¿Está seguro?")) {
           $('#eliminar').load(url,{},function() {  
//               $('#'+idImagen).hide("slow");
                //para lo contrario activar desactivar
                window.location.reload();
               $().toastmessage('showSuccessToast', "Solicitud de contacto a Anuncio eliminada");
               
              
        }); 
        
   }
 }


</script>
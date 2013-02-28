<?php use_helper('Date') ?>
<h1>Solicitudes de Denuncias a Anuncios </h1>
<div id="buscador">
<?php include_partial('denunciaAnuncio/buscador', array('query' => $query)); ?>
</div>
<br>
<div  id="numero-elementos">
<?php echo "Hay un total de ".count($denuncia_anuncios)." elementos" ?>
</div>
<br></br>
<?php  include_component('bloque', 'bloquePaginador', array('pager' => $denuncia_anuncios, 'action' => $action)) ?>
<br></br>
<div class="enlaces-centro">
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nuevo', 'denunciaAnuncio/new', array('title' => 'Nuevo')) ?>
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
      <th colspan="3"><?php echo 'Acciones'?></th>            
    </tr>
  </thead>
  <tbody>
      <?php $i = 1 ?>  
    <?php foreach ($denuncia_anuncios as $denuncia_anuncio): ?>
      <tr id="<?php echo $denuncia_anuncio->id ?>" class="<?php echo ($i % 2 == 0 ? 'par' : 'impar') ?>">
      <td><a  target="_blank" href="<?php echo url_for('default/show?id='.$denuncia_anuncio->getAnuncio()->id) ?>"><?php echo $denuncia_anuncio->getAnuncio()->getTitulo(); ?></a></td>
      <td><?php echo $denuncia_anuncio->getNombre() ?></td>
      <td><?php echo $denuncia_anuncio->getEmail() ?></td>
      <td><?php echo $denuncia_anuncio->getTelefono() ?></td>
      <td><?php echo format_date($denuncia_anuncio->getCreatedAt(), 'r') ?></td>
      <td class="accionListado"><a href="<?php echo url_for('denunciaAnuncio/responder?id='.$denuncia_anuncio->id) ?>"><img title="Responder denuncia" alt="Responder denuncia" src="/images/iconos/mensajeNuevo.png"></img></a></td>
      <td class="accionListado"><a class="ver" id="<?php echo $denuncia_anuncio->id ?>" href="javascript:void()"><img  title="Vista previa" alt="Vista previa" src="/images/iconos/vistaPrevia.png"></img></a></td>
     <?php  if($denuncia_anuncio->solucionado){ ?>
      <td class="accionListado"><a href="javascript:void()" title="Marcar como no resuelto" alt="Marcar como no resuelto" onclick="javascript:eliminar('<?php echo url_for('denunciaAnuncio/delete?id='.$denuncia_anuncio->id) ?>',<?php echo $denuncia_anuncio->id ?>)"><img src="/images/iconos/tick.png"></img></a></td>  
    <?php }else{ ?>
       <td class="accionListado"><a href="javascript:void()" title="Marcar como resuelto" alt="Marcar como resuelto" onclick="javascript:eliminar('<?php echo url_for('denunciaAnuncio/delete?id='.$denuncia_anuncio->id) ?>',<?php echo $denuncia_anuncio->id ?>)"><img src="/images/iconos/no-tick.png"></img></a></td>  
     
      <?php } ?>
      </tr>
    <?php $i = $i + 1; ?>
    <?php endforeach; ?>
  </tbody>
</table>
<br></br>
<div class="enlaces-centro">
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nuevo', 'denunciaAnuncio/new', array('title' => 'Nuevo')) ?>
</div>
<br></br>
<?php  include_component('bloque', 'bloquePaginador', array('pager' => $denuncia_anuncios, 'action' => $action)) ?>
<br></br>

<div id="ajax-favoritos"></div>
<div id="eliminar" style="display: none;"></div>
<div id="ver" style="display: none;"></div>
<script type="text/javascript">


          $('.ver').click(function() {
        var id = $(this).attr('id');
        dialog = $.ajax({
            type: 'GET',
            url: '<?php echo url_for('denunciaAnuncio/show?id=') ?>'+id,
            async: false
        }).responseText;
        $('#ver').html(dialog);
        $("#ver").dialog({
            resizable: true,
            width: 800,
            modal: true,
            show: { effect: 'drop', direction: "up" },
            title: "<?php echo 'Solicitud de denunciaAnuncio'; ?>"
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
               $().toastmessage('showSuccessToast', "Solicitud de denuncia a Anuncio solucionada");
               
              
        }); 
        
   }
 }


</script>
<?php use_helper('Date') ?>
<h1>Provincias</h1>
<br></br>
<?php  include_component('bloque', 'bloquePaginador', array('pager' => $provincia_anuncios, 'action' => $action)) ?>
<br></br>
<div class="enlaces-centro">
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nueva', 'provinciaAnuncio/new', array('title' => 'Nuevo')) ?>
</div>
<br></br>
<table class="listado contenido">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Creado en</th>    
      <th colspan="2"><?php echo 'Acciones'?></th>  
    </tr>
  </thead>
  <tbody>
      <?php $i = 1 ?>  
    <?php foreach ($provincia_anuncios as $provincia_anuncio): ?>
      <tr id="<?php echo $provincia_anuncio->id ?>" class="<?php echo ($i % 2 == 0 ? 'par' : 'impar') ?>">
      <td><?php echo $provincia_anuncio->getTexto() ?></td>
      <td><?php echo format_date($provincia_anuncio->getCreatedAt(), 'p') ?></td>
      <td class="accionListado"><a class="ver" id="<?php echo $provincia_anuncio->id ?>" href="javascript:void()"><img  title="Vista previa" alt="Vista previa" src="/images/iconos/vistaPrevia.png"></img></a></td>      
      <td class="accionListado"><?php echo link_to(image_tag('iconos/editar.png', array('alt' => 'Editar Provincia', 'title' => 'Editar Provincia')), 'provinciaAnuncio/edit?id='.$provincia_anuncio->id) ?>                 
    </tr>
    <?php $i = $i + 1; ?>
    <?php endforeach; ?>
  </tbody>
</table>
<br></br>
<div class="enlaces-centro">
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nueva', 'provinciaAnuncio/new', array('title' => 'Nuevo')) ?>
</div>
<br></br>
<?php  include_component('bloque', 'bloquePaginador', array('pager' => $provincia_anuncios, 'action' => $action)) ?>
<br></br>

<div id="ajax-favoritos"></div>
<div id="eliminar" style="display: none;"></div>
<div id="ver" style="display: none;"></div>
<script type="text/javascript">


          $('.ver').click(function() {
        var id = $(this).attr('id');
        dialog = $.ajax({
            type: 'GET',
            url: '<?php echo url_for('provinciaAnuncio/show?id=') ?>'+id,
            async: false
        }).responseText;
        $('#ver').html(dialog);
        $("#ver").dialog({
            resizable: true,
            width: 800,
            modal: true,
            show: { effect: 'drop', direction: "up" },
            title: "<?php echo 'Provincia'; ?>"
        });
    }); 


function refrescar(){
    window.location.reload();
}



            function eliminar(url,idImagen){
                if (confirm("¿Desea eliminar esto?")) {
           $('#eliminar').load(url,{},function() {  
               $('#'+idImagen).hide("slow");
                //para lo contrario activar desactivar
//                window.location.reload();
               $().toastmessage('showSuccessToast', "Provincia Eliminada");
               
              
        }); 
        
   }
 }


</script>

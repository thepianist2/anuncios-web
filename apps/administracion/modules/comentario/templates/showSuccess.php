<?php use_helper('Date') ?>
<div>
    <div style="background-color: greenyellow;">
    <?php echo "Creado en: ". format_date($comentario->getCreatedAt(), 'p') ?></br>
    <?php echo "Última modificación: ". format_date($comentario->getUpdatedAt(), 'p') ?>    </br>   
    
    <label>Activa: </label>    <?php echo $comentario->getActivo() ? image_tag('iconos/tick.png') : image_tag('iconos/cross.png') ?>
    <label>Anuncio: </label>    <?php echo $comentario->getAnuncio()->getTitulo() ?> </br>  
    <label>Correo: </label>    <?php echo $comentario->getCorreo() ?> </br> 
    <label>Teléfono: </label>    <?php echo $comentario->getTelefono() ?> </br> 
    </div>
    <div>

       <?php echo nl2br(html_entity_decode($comentario->getTexto(), ENT_COMPAT , 'UTF-8')); ?>

    </div>
    
</div>


<div class="enlaces-centro">
<a href="<?php echo url_for('comentario/edit?id='.$comentario->getId()) ?>">Editar</a>
</div>
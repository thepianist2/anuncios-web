<?php use_helper('Date') ?>
<div>
    <div style="background-color: greenyellow;">
    <?php echo "Creado en: ". format_date($contacto_anuncio->getCreatedAt(), 'r') ?></br>
    <?php echo "Última modificación: ". format_date($contacto_anuncio->getUpdatedAt(), 'r') ?>    </br>   
        <label>Nombre: </label>    <?php echo $contacto_anuncio->getNombre() ?></br>
        <label>Email: </label>    <?php echo $contacto_anuncio->getEmail() ?></br>
        <label>Teléfono: </label>    <?php echo $contacto_anuncio->getTelefono() ?></br>

    </div>
    </br>

        <label>Mensaje: </label> <?php echo nl2br(html_entity_decode($contacto_anuncio->getMensaje(), ENT_COMPAT , 'UTF-8')); ?></br>

</div>


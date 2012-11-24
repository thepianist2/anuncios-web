<?php use_helper('Date') ?>
<div>
    <div style="background-color: greenyellow;">
    <?php echo "Creado en: ". format_date($provincia_anuncio->getCreatedAt(), 'r') ?></br>
    <?php echo "Última modificación: ". format_date($provincia_anuncio->getUpdatedAt(), 'r') ?>    </br>   

    </div>
    </br>
        <label>Nombre de la provincia: </label>    <?php echo $provincia_anuncio->getTexto() ?></br>
</div>


<div class="enlaces-centro">
<a href="<?php echo url_for('provinciaAnuncio/edit?id='.$provincia_anuncio->getId()) ?>">Editar</a>
</div>
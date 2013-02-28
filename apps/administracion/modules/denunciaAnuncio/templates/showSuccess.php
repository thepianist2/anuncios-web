<?php use_helper('Date') ?>
<div>
    <div style="background-color: greenyellow;">
    <?php echo "Creado en: ". format_date($denuncia_anuncio->getCreatedAt(), 'r') ?></br>
    <?php echo "Última modificación: ". format_date($denuncia_anuncio->getUpdatedAt(), 'r') ?>    </br>   
        <label>Nombre de denuncia Anuncio: </label>    <?php echo $denuncia_anuncio->getNombre() ?></br>
        <label>Email del denuncia Anuncio: </label>    <?php echo $denuncia_anuncio->getEmail() ?></br>
        <label>Teléfono del denuncia Anuncio: </label>    <?php echo $denuncia_anuncio->getTelefono() ?></br>
        <?php if($denuncia_anuncio->getEmpresa()){ ?>
        <label>Empresa del denuncia Anuncio: </label>    <?php echo $denuncia_anuncio->getEmpresa() ?></br>
                <?php if($denuncia_anuncio->getDocumento()){ ?>
       <div style="text-align: center;"><a target="_blank" href="<?php echo '/uploads/documentos/'.$denuncia_anuncio->getDocumento(); ?>">Enlace a documento</a></div>     
        <?php } ?>
        <?php } ?>
    </div>
    </br>

        <label>Razón de la denuncia: </label> <?php echo nl2br(html_entity_decode($denuncia_anuncio->getRazonAnuncio(), ENT_COMPAT , 'UTF-8')); ?></br>

</div>


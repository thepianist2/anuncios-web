<h3 class="description">Nombre:</h3><?php echo $anuncio->getNombre(); ?>    </br> </br>

<?php if($anuncio->getTelefono()){ ?>
<h3 class="description">Teléfono:</h3><?php echo $anuncio->getTelefono(); ?>    </br> </br>
<?php } ?>
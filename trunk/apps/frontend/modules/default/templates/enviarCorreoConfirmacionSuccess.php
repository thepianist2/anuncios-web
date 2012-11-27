
<?php if($error==false){ ?>

<div id="envio-confirmacion">
    <?php echo 'Se ha enviado un correo a la dirección que introdujiste durante el registro.' ?><br />
    <?php echo 'Si no lo recibes, comprueba que no esté en la carpeta de correo basura o envianos un correo a contacto@tusanunciosweb.es y lo resolveremos' ?>
</div>

<?php }else{ ?>
<div id="envio-confirmacion">
    <?php echo 'Error al enviar correo' ?><br />
</div>
<?php } ?>

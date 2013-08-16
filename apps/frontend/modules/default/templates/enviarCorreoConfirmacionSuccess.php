<?php if($error==false){ ?>

<div id="envio-confirmacion">
    <br></br><br></br><br></br>
    <p style="font-size: 20px;">
        Tu correo ya está registrado, pero de todas formas...
        Se ha enviado un correo a la dirección que introdujiste durante el registro para activar tu anuncio<br />
        Si no lo recibes, comprueba que no esté en la carpeta de correo basura o envianos un correo a contacto@tusanunciosweb.es con el título del anuncio, teléfono y lo reenviaremos.
    </p>
    <br></br><br></br><br></br>
</div>

<?php }else{ ?>
<div id="envio-confirmacion">
    <br></br><br></br><br>
    <p style="font-size: 20px;">
        Error al enviar correo<br />
        Envianos un correo a contacto@tusanunciosweb.es con el título del anuncio, teléfono y lo reenviaremos.
    </p>
    <br></br><br></br><br>
</div>
<?php } ?>

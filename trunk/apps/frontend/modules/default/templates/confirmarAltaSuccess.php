       <h1>Enhorabuena! Tu anuncio se ha dado de alta!</h1>




       <p>Para iniciar sesión y gestionar tus anuncios haz click en el link de abajo, e inicia sesión con los datos enviados a tu correo.</p></br>

     <?php if(!$sf_user->isAuthenticated()){ ?>
   <a id="box3" href="<?php echo url_for('@sf_guard_signin') ?>" class="link">Iniciar Sesión</a>
            <?php } ?>
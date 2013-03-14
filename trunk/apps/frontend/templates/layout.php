<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="es-ES">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Merienda&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <?php include_stylesheets() ?> 
    <?php include_javascripts() ?>
    <script type="text/javascript">
	$(document).ready(function() {  
		$('a.link').click(function () {  
			$('#wrapper').scrollTo($(this).attr('href'), 800);
			setPosition($(this).attr('href'), '#cloud1', '0px', '400px', '800px', '1200px')
			setPosition($(this).attr('href'), '#cloud2', '0px', '800px', '1600px', '2400px')
			$('a.link').removeClass('selected');  
			$(this).addClass('selected');
			return false;  
		});  
	});
	function setPosition(check, div, p1, p2, p3, p4) {
	if(check==='#box1')
		{
			$(div).scrollTo(p1, 800);
                        $('#buscar-anuncio').html("");
                        $('#buscar-anuncio').activity({segments: 12, width: 8, space: 6, length: 13, color: '#252525', speed: 2.5});
                 $("#buscar-anuncio").load('<?php  echo url_for('default/index') ?>',{},function() {
                     $('#buscar-anuncio').activity(false);
                     window.history.pushState(null, 'Buscar Anuncio', '<?php  echo url_for('default/index') ?>');
                 });      
                 
		}
	else if(check==='#box2')
		{
			$(div).scrollTo(p2, 800);
                        $('#publicar-anuncio').html("");
                        $('#publicar-anuncio').activity({segments: 12, width: 8, space: 6, length: 13, color: '#252525', speed: 2.5});
                $("#publicar-anuncio").load('<?php  echo url_for('default/new') ?>',{},function() { 
                        $('#publicar-anuncio').activity(false);
                        window.history.pushState(null, 'Publicar Anuncio', '<?php  echo url_for('default/new') ?>'); 
                 }); 
		}
	else if(check==='#box3')
		{
			$(div).scrollTo(p3, 800);
                        $('#gestionar-anuncios').html("");
                        $('#gestionar-anuncios').activity({segments: 12, width: 8, space: 6, length: 13, color: '#252525', speed: 2.5});
                        $('#gestionar-anuncios').activity(false);
                        $('a.link').removeClass('selected');  
			$('#box3').addClass('selected');
		}
	else if(check==='#box4')
		{
			$(div).scrollTo(p4, 800);
                        $('#condiciones-uso').html("");
                        $('#condiciones-uso').activity({segments: 12, width: 8, space: 6, length: 13, color: '#252525', speed: 2.5});
                $("#condiciones-uso").load('<?php  echo url_for('contenido/mostrar') ?>',{'id':1},function() {
                    $('#condiciones-uso').activity(false);
                    window.history.pushState(null, 'Condiciones de uso y política de privacidad', '<?php  echo url_for('contenido/mostrar?id=1') ?>');
                 });                              
		}           
	};
        
        
        

	</script>
   
  </head>
  <body>
	<div id="cloud1" class="clouds">
    	<div id="clouds-small" ></div>
    </div><!-- end clouds -->
<!--    <div id="cloud2" class="clouds">-->
<!--        <div id="clouds-big"></div>-->
<!--    </div> end clouds -->
	<div id="header">
    	<ul id="menu">          
            <li class="caja" id="box1" ><a id="box1" href="#box1" class="link">Buscar Anuncio</a></li>
          <li class="caja" id="box2" ><a id="box2" href="<?php echo url_for('default/new') ?>" class="link">Publicar un anuncio</a></li>
          <?php if($sf_user->isAuthenticated()){ ?>
            <li class="caja" id="box3" ><a id="box3" href="<?php  echo url_for('tusAnuncios/index') ?>" class="link">Gestionar Anuncios</a></li>
           <?php }else{ ?>
            <li class="caja" id="box3" ><a id="box3" href="<?php echo url_for('@sf_guard_signin') ?>" class="link">Gestionar Anuncios</a></li>
            <?php } ?>
            <li class="caja" id="box4" ><a id="box4" href="<?php  echo url_for('contenido/mostrar?id=1') ?>" class="link">Condiciones de uso y Política de privacidad</a></li>
            <li class="caja" id="box5" ><a id="box5" href="<?php echo url_for('contacto/new') ?>" class="link">Contactar</a></li>
            <?php if($sf_user->isAuthenticated()){ ?>
            <li class="caja" id="box6" ><a id="box6" href="<?php echo url_for('usuario/edit') ?>" class="link">Usuario</a></li>
            <li class="caja" id="box7" ><a id="box7" href="<?php echo url_for('sf_guard_signout') ?>" class="link">Salir</a></li>
            <?php } ?>
      </ul>
</div><!-- end header -->
	<div id="wrapper">
                         <?php $useragent=$_SERVER['HTTP_USER_AGENT'];
if(!preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
 ?>
            <div id="skydcha" style="position: absolute;margin-left: 0px;right: 20px;top: 288px;">
         <script type="text/javascript"><!--
google_ad_client = "ca-pub-9136506847276398";
/* skydcha */
google_ad_slot = "7237391080";
google_ad_width = 120;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>       
                
                
            </div>
            <div id="skyizda" style="position: absolute;margin-left: 0px;left: 20px;top: 288px;">
                <script type="text/javascript"><!--
google_ad_client = "ca-pub-9136506847276398";
/* skyizda */
google_ad_slot = "8714124287";
google_ad_width = 120;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
            </div>
            <?php } ?>  
            <div id="ver" style="display: none;"></div>
    	<ul id="mask">
        	<li id="box1" class="box">
                    <?php include_partial('bloque/bloqueCabecera'); ?> 
                <div id="buscar-anuncio" class="content"><?php echo $sf_content ?></div>
            </li><!-- end box1 -->
            <li id="box2" class="box">
                <?php include_partial('bloque/bloqueCabecera'); ?> 
                <div id="publicar-anuncio" class="content"></div>
            </li><!-- end box2 -->
            <li id="box3" class="box">
                <?php include_partial('bloque/bloqueCabecera'); ?> 
                <div id="gestionar-anuncios" class="content">                
                </div>
            </li><!-- end box3 -->
            <li id="box4" class="box">
                <?php include_partial('bloque/bloqueCabecera'); ?> 
                <div id="condiciones-uso" class="content">                
                </div>
            </li><!-- end box4 -->                         
        </ul><!-- end mask -->

<script type="text/javascript"><!--
google_ad_client = "ca-pub-9136506847276398";
/* 728abajo */
google_ad_slot = "8915613885";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

    </div><!-- end wrapper -->
<!--      <div id="contenedor">

      </br></br>
      
       </div>-->
    <?php include_partial('bloque/bloqueMensaje'); ?> 
    
          <?php $ano=date('Y') ?>
          <br></br>
<div id="info_site"><strong>© <?php echo $ano ?> Allel software </strong>
<ul class="avisos">
    <li><a href="<?php  echo url_for('contenido/mostrar?id=1') ?>">Aviso legal</a></li>
    <li><a href="<?php  echo url_for('contenido/mostrar?id=1') ?>">Política de privacidad</a></li>
</ul>
<a href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=desarrollo.tusanunciosweb.es','SiteLock','width=600,height=600,left=160,top=170');"><img alt="Homepage-Sicherheit" title="1&1 SiteLock" src="//shield.sitelock.com/shield/desarrollo.tusanunciosweb.es"/></a>
</div>
      
  </body>
</html>


<script type="text/javascript">


          $('#box3r').click(function() {
        var id = $(this).attr('id');
        dialog = $.ajax({
            type: 'GET',
            url: '<?php echo url_for('sf_guard_signin') ?>',
            async: false
        }).responseText;
        $('#ver').html(dialog);
        $("#ver").dialog({
            resizable: true,
            width: 800,
            modal: true,
            show: { effect: 'drop', direction: "up" },
            title: "<?php echo 'Iniciar sesión'; ?>"
        });
    }); 


</script>
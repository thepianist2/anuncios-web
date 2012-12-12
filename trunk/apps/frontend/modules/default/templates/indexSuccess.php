<?php use_helper('Date') ?>
<div id="buscador">
<?php include_partial('default/buscador', array('query' => $query, 'categoriaF'=>$categoriaF, 'provinciaF'=>$provinciaF, 'provincias'=>$provincias, 'categorias'=>$categorias,'ofertaDemandaF'=>$ofertaDemandaF,'selectOrder'=>$selectOrder)); ?>
</div>
<br>
<h1>Todos los anuncios</h1>
<br><br>
<ul class="list_ads_table">
    <?php $i = 1 ; ?>
    <?php foreach ($anuncios as $anuncio): ?>

    <ul id="<?php echo $anuncio->id ?>"  class="basicList list_ads_row" style="position: relative; background-color: <?php echo ($i % 2 == 0 ? '#3ADF00' : '#FE9A2E') ?>; cursor: pointer;">
		<li class="date" style="width:90px;">
	
		<?php echo $anuncio->getTitulo() ?>

		</li>

		<li class="image">
		<?php  $foto= $anuncio->getFotografiaAnuncio();?>
			
			<div class="thumbnail_container">

                                    <?php if(count($foto)>0){ ?>
                                    <div style="height: 70px; width: 60px;">
                                        <img  width="80"   class="lazy" src="<?php echo '/uploads/'.$foto[0]->getFotografia() ?>" alt="<?php echo $anuncio->getTitulo() ?>" title="<?php echo $anuncio->getTitulo() ?>" border="0" style="display: inline-block;">
						</div>
                                                            <?php }else{ ?>
                                    <div style="height: 70px; width: 60px;">
                                                       <img class="lazy" src="<?php echo '/images/no-foto.png' ?>" alt="<?php echo $anuncio->getTitulo() ?>" title="<?php echo $anuncio->getTitulo() ?>" border="0" style="display: inline-block;"> 
                                    </div>                                        
        <?php } ?>
			</div>
		</li>
		<li class="subject">
			<p class="subjectTop">
			<p class="subjectPrice">
				<br>
				<?php echo number_format($anuncio->getPrecio(), 1, ',', '.').'€' ?>
				</p>
			</p>
                        </li>
                        <li class="image">  
                    	   <p class="subjectTitle">
			                     <?php $hoy=date('Y-m-d'); ?>
			<!-- poner ayer o hoy -->
                        <?php if($hoy==date('Y-m-d', strtotime($anuncio->getCreatedAt()))){ ?>
                               Hoy<br><?php echo format_date($anuncio->getCreatedAt(), 'r') ?>
                               <?php }else{ ?>
                               <br><?php echo format_date($anuncio->getCreatedAt(), 'r') ?>
                               <?php } ?>
                            </p>
                         </li>
                        <li class="category">
			 <p class="categoryLink">	
				<?php echo $anuncio->getCategoriaAnuncio()->getTexto() ?>
			 </p>	
                        </li>
			<li class="zone">
					<?php echo $anuncio->getProvinciaAnuncio()->getTexto() ?>
                        </li>
			<li class="user_type_label">
				<?php echo $anuncio->getTipo() ?>
			</li>
	</ul>    
 
    
<div id="<?php echo "fila".$anuncio->id ?>" style="display: none; width:997px;  background-color: <?php echo ($i % 2 == 0 ? '#3ADF00' : '#FE9A2E') ?>;"></div>
 <?php $i = $i + 1; ?>
    <?php endforeach; ?>
    </ul>

<div id="ver" style="display: none;"></div>
  <script type="text/javascript">
//          $('.basicList').click(function() {
//        var id = $(this).attr('id');
//        dialog = $.ajax({
//            type: 'GET',
//            url: '<?php // echo url_for('default/show?id=') ?>'+id,
//            async: false
//        }).responseText;
//        $('#ver').html(dialog);
//        $("#ver").dialog({
//            resizable: true,
//            width: 800,
//            modal: true,
//            show: { effect: 'drop', direction: "up" },
//            title: "<?php // echo 'Anuncio'; ?>"
//        });
//    }); 
    
    

        
        
 
              $('.basicList').click(function() {
                  var id = $(this).attr('id');
                $("#fila"+id).load('<?php  echo url_for('default/mostrar?id=') ?>'+id,{},function() {
            if ($("#fila"+id).is (':visible')){
                $("#fila"+id).hide("slow");
            }else{
                $("#fila"+id).show("slow");
            } 
            
               });
            }); 
</script>
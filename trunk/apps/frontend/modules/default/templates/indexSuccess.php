<?php use_helper('Date') ?>
<div id="buscador">
<?php include_partial('default/buscador', array('query' => $query, 'categoriaF'=>$categoriaF, 'provinciaF'=>$provinciaF, 'provincias'=>$provincias, 'categorias'=>$categorias,'ofertaDemandaF'=>$ofertaDemandaF,'selectOrder'=>$selectOrder, 'soloImagen'=>$soloImagen)); ?>
</div>
<!--<br>-->
<!--<h1>Todos los anuncios</h1>-->
<!--<br>-->
<div  id="numero-elementos">
<?php echo "Hay un total de ".count($anuncios)." elementos" ?>
</div>
<br>
<?php  include_component('bloque', 'bloquePaginador', array('pager' => $anuncios, 'action' => $action, 'query' => $query, 'categoriaF'=>$categoriaF, 'provinciaF'=>$provinciaF, 'provincias'=>$provincias, 'categorias'=>$categorias,'ofertaDemandaF'=>$ofertaDemandaF,'selectOrder'=>$selectOrder, 'soloImagen'=>$soloImagen)) ?>
<br></br>
<ul class="list_ads_table">
    <?php $i = 1 ; ?>
    <?php foreach ($anuncios as $anuncio): ?>

    <ul id="<?php echo $anuncio->id ?>"  class="basicList list_ads_row" style="position: relative; background-color: <?php echo ($i % 2 == 0 ? '#CEECF5' : '#E0F2F7') ?>; cursor: pointer;">


		<li class="image">
		<?php  $foto= $anuncio->getFotografiaAnuncio();?>
			
			<div class="thumbnail_container">

                                    <?php if(count($foto)>0){ ?>
                                    <div style="height: 70px; width: 60px;">
                                        <img style="border: 1px solid #CCC;"  width="80"   class="lazy" src="<?php echo '/uploads/'.$foto[0]->getFotografia() ?>" alt="<?php echo $anuncio->getTitulo() ?>" title="<?php echo $anuncio->getTitulo() ?>" border="0" style="display: inline-block;">
						</div>
                                                            <?php }else{ ?>
                                    <div style="height: 70px; width: 60px;">
                                                       <img style="border: 1px solid #CCC;" width="80" class="lazy" src="<?php echo '/images/no-foto.png' ?>" alt="<?php echo $anuncio->getTitulo() ?>" title="<?php echo $anuncio->getTitulo() ?>" border="0" style="display: inline-block;"> 
                                    </div>                                        
        <?php } ?>
			</div>
		</li>
                		<li class="date" style="width:90px;">
	
		<?php echo ucfirst($anuncio->getTitulo()); ?>

		</li>
		<li class="subject">
			<p class="subjectTop">
			<p class="subjectPrice">
				<br>
				<?php echo number_format($anuncio->getPrecio(), 0, ',', '.').' €' ?>
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
                             
                         <div style="height: 70px; width: 60px;">
                             <?php $categoria = str_replace('ó',"o",$anuncio->getCategoriaAnuncio()->getTexto());
                             $categoria = str_replace('ñ',"n",$categoria);
                             $categoria = str_replace('í',"i",$categoria);
                             $categoria = str_replace('á',"a",$categoria);
                             ?>
                            <img width="65" class="lazy" src="<?php echo '/images/frontend/'.$categoria.".png" ?>" alt="<?php echo $anuncio->getCategoriaAnuncio()->getTexto() ?>" title="<?php echo $anuncio->getCategoriaAnuncio()->getTexto() ?>" border="0" style="display: inline-block;"> 
                         </div>      
				
			 </p>	
                        </li>
                        <li class="user_type_label" style="text-align: center;">
				<?php echo $anuncio->getTipo() ?>
			</li>
			<li class="zone">
					<?php echo $anuncio->getProvinciaAnuncio()->getTexto() ?>
                        </li>

	</ul>    
 
    
<div id="<?php echo "fila".$anuncio->id ?>" style="display: none; width:995px; border-radius: 13px; -moz-border-radius: 35px; -webkit-border-radius: 20px;  background-color: <?php echo ($i % 2 == 0 ? '#CEECF5' : '#E0F2F7') ?>;"></div>
 <?php $i = $i + 1; ?>
    <?php endforeach; ?>
    </ul>

<div id="ver" style="display: none;"></div>


<br></br>
<?php  include_component('bloque', 'bloquePaginador', array('pager' => $anuncios, 'action' => $action, 'query' => $query, 'categoriaF'=>$categoriaF, 'provinciaF'=>$provinciaF, 'provincias'=>$provincias, 'categorias'=>$categorias,'ofertaDemandaF'=>$ofertaDemandaF,'selectOrder'=>$selectOrder, 'soloImagen'=>$soloImagen)) ?>
<br></br>
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
                
            if ($("#fila"+id).is (':visible')){
                $("#"+id).activity({segments: 10, width: 6,align: 'center', space: 6, length: 13, color: '#252525', speed: 2.5});
                $("#fila"+id).hide("slow");
                $("#"+id).activity(false);
            }else{
                $("#fila"+id).show("slow");
                $("#"+id).activity({segments: 10, width: 6,align: 'center', space: 6, length: 13, color: '#252525', speed: 2.5});
                $("#fila"+id).load('<?php  echo url_for('default/mostrar?id=') ?>'+id,{},function() {
                $("#"+id).activity(false);
                 });
            } 
            
              
            }); 
</script>
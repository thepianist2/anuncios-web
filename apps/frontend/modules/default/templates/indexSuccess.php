<?php use_helper('Date') ?>
<div id="buscador">
<?php include_partial('default/buscador', array('query' => $query, 'categoriaF'=>$categoriaF, 'provinciaF'=>$provinciaF, 'provincias'=>$provincias, 'categorias'=>$categorias,'ofertaDemandaF'=>$ofertaDemandaF,'selectOrder'=>$selectOrder)); ?>
</div>
<br><br>
<ul class="list_ads_table">
    <?php foreach ($anuncios as $anuncio): ?>

<ul class="basicList list_ads_row " style="position: relative; background-color: rgb(255, 255, 255); cursor: default;">
		<li class="date" style="width:90px;">
		 <a class="dateLink" href="<?php echo url_for('default/show?id='.$anuncio->getId()) ?>" title="<?php echo $anuncio->getTitulo() ?>">
		
			<!-- poner ayer o hoy -->
                               <br><?php echo format_date($anuncio->getCreatedAt(), 'r') ?>
                        
			</a>
		</li>





		<li class="image">
		<?php  $foto= $anuncio->getFotografiaAnuncio();?>
			
			<div class="thumbnail_container">
			 	<a href="<?php echo url_for('default/show?id='.$anuncio->getId()) ?>">
                                    <?php if(count($foto)>0){ ?>
                                    <div style="height: 100px; width: 100px;">
                                        <img  width="100"   class="lazy" src="<?php echo '/uploads/'.$foto[0]->getFotografia() ?>" alt="<?php echo $anuncio->getTitulo() ?>" title="<?php echo $anuncio->getTitulo() ?>" border="0" style="display: inline-block;">
						</div>
                                                            <?php }else{ ?>
                                                       <img class="lazy" src="<?php echo '/images/no-foto.png' ?>" alt="<?php echo $anuncio->getTitulo() ?>" title="<?php echo $anuncio->getTitulo() ?>" border="0" style="display: inline-block;"> 
                                                <?php } ?>
                                
                                </a>
					
				
			</div>
	        
		</li>


		<li class="subject">
			
			<p class="subjectTop">
			<a class="subjectTitle" href="<?php echo url_for('default/show?id='.$anuncio->getId()) ?>" title="<?php echo $anuncio->getTitulo() ?>">
			
			     	<?php echo $anuncio->getTitulo() ?>
			</a>
			<a class="subjectPrice" href="<?php echo url_for('default/show?id='.$anuncio->getId()) ?>" title="<?php echo $anuncio->getTitulo() ?>">
			
			
				
				<?php echo number_format($anuncio->getPrecio(), 1, ',', '.').'€' ?>
			
			
				</a>
			
			</p>
			
			

			
			
		</li>
		
		
		
		<li class="category">
			 <a class="categoryLink" href="<?php echo url_for('default/show?id='.$anuncio->getId()) ?>" title="<?php echo $anuncio->getTitulo() ?>">
			
				<?php echo $anuncio->getCategoriaAnuncio()->getTexto() ?>
				
				</a>	
		</li>
			
	
		
			<li class="zone">
			 <a href="<?php echo url_for('default/show?id='.$anuncio->getId()) ?>" title="<?php echo $anuncio->getTitulo() ?>">
			
			
					  
					<?php echo $anuncio->getProvinciaAnuncio()->getTexto() ?>
					
			
			</a>
		</li>
		 
		
			<li class="user_type_label">
				<?php echo $anuncio->getTipo() ?>
					
				
			</li>
		
	</ul>
    <?php endforeach; ?>
    </ul>
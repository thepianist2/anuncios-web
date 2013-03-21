<?php use_helper('Date') ?>
<br>
<br></br>
<h1 style="color: mediumblue;">Seleccione una categoría para buscar un anuncio</h1>
<br></br>
<table>
  <thead>
    <tr>
      <th></th>
      <?php $cont=0; ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($categorias as $categoriaAnuncio) { 
        $cont+=1;
        if($cont==1){
        ?>
      <tr>
             <td>                         
                             <?php $categoria = str_replace('ó',"o",$categoriaAnuncio->getTexto());
                             $categoria = str_replace('ñ',"n",$categoria);
                             $categoria = str_replace('í',"i",$categoria);
                             $categoria = str_replace('á',"a",$categoria);
                             ?>
          <a href="<?php echo url_for('default/buscar?categoriaF='.$categoriaAnuncio->id.'&selectOrder=rand()') ?>"><div style="height: 140px; width: 140px; margin-left:60px; margin-bottom: 50px;">
                            <img  id="secciones-imagen"  class="lazy" src="<?php echo '/images/frontend/'.$categoria.".png" ?>" alt="<?php echo $categoriaAnuncio->getTexto() ?>" title="<?php echo $categoriaAnuncio->getTexto() ?>" border="0" style="display: inline-block;"> 
                         </div>  </a> 
      </td>  
      
      <?php }else{ if($cont%5==0){ $cont=0; ?>
                                    <td>                         
                             <?php $categoria = str_replace('ó',"o",$categoriaAnuncio->getTexto());
                             $categoria = str_replace('ñ',"n",$categoria);
                             $categoria = str_replace('í',"i",$categoria);
                             $categoria = str_replace('á',"a",$categoria);
                             ?>
          <a href="<?php echo url_for('default/buscar?categoriaF='.$categoriaAnuncio->id.'&selectOrder=rand()') ?>"><div style="height: 140px; width: 140px; margin-bottom: 50px;">
                            <img  id="secciones-imagen" class="lazy" src="<?php echo '/images/frontend/'.$categoria.".png" ?>" alt="<?php echo $categoriaAnuncio->getTexto() ?>" title="<?php echo $categoriaAnuncio->getTexto() ?>" border="0" style="display: inline-block;"> 
                         </div>  </a> 
      </td>
      </tr>
      
      <?php }else{ ?>
                            <td>                         
                             <?php $categoria = str_replace('ó',"o",$categoriaAnuncio->getTexto());
                             $categoria = str_replace('ñ',"n",$categoria);
                             $categoria = str_replace('í',"i",$categoria);
                             $categoria = str_replace('á',"a",$categoria);
                             ?>
          <a href="<?php echo url_for('default/buscar?categoriaF='.$categoriaAnuncio->id.'&selectOrder=rand()') ?>"><div style="height: 140px; width: 140px; margin-bottom: 50px;">
                            <img  id="secciones-imagen" class="lazy" src="<?php echo '/images/frontend/'.$categoria.".png" ?>" alt="<?php echo $categoriaAnuncio->getTexto() ?>" title="<?php echo $categoriaAnuncio->getTexto() ?>" border="0" style="display: inline-block;"> 
                         </div>  </a> 
      </td>
      
      
    <?php  } } ?>
      
   <?php   }  ?>
    

   
  </tbody>
</table>
                             
<br></br>
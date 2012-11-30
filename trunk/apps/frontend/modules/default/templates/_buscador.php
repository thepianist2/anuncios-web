<script type="text/javascript">

    jQuery(window).load(function () {
  document.forms[0].query.focus();
  document.forms[0].query.selectionStart=jQuery("#campo_busqueda").get(0).value.length;

});
</script>

<form id="buscador" action="<?php echo url_for('default/buscar') ?>" method="post">
	<h2 id="letra-buscador">Busca todos tus anuncios aquí</h2>	<br>	
        Palabra
        <input  x-webkit-speech  size="18" type="text" name="query" value="<?php echo $query ?>" id="campo_busqueda" />
        Categoría
        <SELECT  class="select-buscador" NAME="categoriaF" SIZE="1" style="width: 160px; " onChange="javascript:abreSitio()">
            <OPTION class="option-buscador" VALUE="0" >Todas</OPTION>
                        <?php foreach ($categorias as $categoria) { ?>
                 <OPTION class="option-buscador" VALUE="<?php echo $categoria->id; ?>" <?php echo ($categoriaF == $categoria->id ? 'selected' : '')?>><?php echo $categoria->getTexto(); ?></OPTION>
                           <?php   } ?>
         </SELECT>  
         Provincia
         <SELECT class="select-buscador" NAME="provinciaF" SIZE="1" style="width: 160px; " onChange="javascript:abreSitio()">
                           <OPTION class="option-buscador" VALUE="0" >Todas</OPTION>
                        <?php foreach ($provincias as $provincia) { ?>
                      <OPTION class="option-buscador" VALUE="<?php echo $provincia->id; ?>" <?php echo ($provinciaF == $provincia->id ? 'selected' : '')?>><?php echo $provincia->getTexto(); ?></OPTION>
                           <?php   } ?>                 
         </SELECT> 
         Oferta/Demanda
         <SELECT class="select-buscador" NAME="ofertaDemandaF" SIZE="1" style="width: 70px; " onChange="javascript:abreSitio()">
                           <OPTION class="option-buscador" VALUE="0"  <?php echo ($ofertaDemandaF == 0 ? 'selected' : '')?>>Todas</OPTION>
                           <OPTION  class="option-buscador" VALUE="1"  <?php echo ($ofertaDemandaF == 1 ? 'selected' : '')?>>Oferta</OPTION>
                           <OPTION class="option-buscador" VALUE="2"  <?php echo ($ofertaDemandaF == 2 ? 'selected' : '')?>>Demanda</OPTION>          
         </SELECT>   <br><br>
         <h2 id="letra-ordenar">Ordenar la búsqueda</h2>
         
         <div id="capa-centrar">
         <SELECT class="select-order" NAME="selectOrder" SIZE="1" style="width: 200px; " onChange="javascript:abreSitio()">
                           <OPTION class="option-buscador" VALUE="0"  <?php echo ($selectOrder == 0 ? 'selected' : '')?>>Sin ordenar</OPTION>
                           <OPTION class="option-buscador" VALUE="1"  <?php echo ($selectOrder == 1 ? 'selected' : '')?>>Caros primero</OPTION>
                           <OPTION class="option-buscador" VALUE="2"  <?php echo ($selectOrder == 2 ? 'selected' : '')?>>Económicos primero</OPTION>
                           <OPTION class="option-buscador" VALUE="3"  <?php echo ($selectOrder == 3 ? 'selected' : '')?>>Antiguos primero</OPTION>   
                           <OPTION class="option-buscador" VALUE="4"  <?php echo ($selectOrder == 4 ? 'selected' : '')?>>Nuevos primero</OPTION>
                           <OPTION class="option-buscador" VALUE="5"  <?php echo ($selectOrder == 5 ? 'selected' : '')?>>Más vistos primero</OPTION>
                           <OPTION class="option-buscador" VALUE="6"  <?php echo ($selectOrder == 6 ? 'selected' : '')?>>Menos vistos primero</OPTION>
                           <OPTION class="option-buscador" VALUE="7"  <?php echo ($selectOrder == 7 ? 'selected' : '')?>>Más votados primero</OPTION>
                           <OPTION class="option-buscador" VALUE="8"  <?php echo ($selectOrder == 8 ? 'selected' : '')?>>Menos votados primero</OPTION>
         </SELECT>   
             
             
             <div id="capa-izquierda">
                 <br><br><br>
                 <input  class="boton" id="enviar-busqueda" type="image" src="/images/iconos/Zoom.png" value="Buscar" />
             </div>
             <div id="capa-derecha">
                 <br><br><br>
                 <a href="<?php echo url_for('default/new') ?>"><img src="/images/iconos/Text Bubble.png"></a>     
             </div>             
         </div>
</form>
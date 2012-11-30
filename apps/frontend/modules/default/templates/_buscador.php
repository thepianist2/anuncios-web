<script type="text/javascript">

    jQuery(window).load(function () {
  document.forms[0].query.focus();
  document.forms[0].query.selectionStart=jQuery("#campo_busqueda").get(0).value.length;

});
</script>

<form id="buscador" action="<?php echo url_for('default/buscar') ?>" method="post">
	<h2 id="letra-buscador">Busca todos tus anuncios aquí</h2>	<br>	
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
         
          Tipo anunciante
         <SELECT NAME="tipoAnuncianteF" SIZE="1" style="width: 70px; " onChange="javascript:abreSitio()">
                           <OPTION VALUE="0"  <?php echo ($tipoAnuncianteF == 0 ? 'selected' : '')?>>Caros primero</OPTION>
                           <OPTION VALUE="1"  <?php echo ($tipoAnuncianteF == 1 ? 'selected' : '')?>>Económicos primero</OPTION>
                           <OPTION VALUE="2"  <?php echo ($tipoAnuncianteF == 2 ? 'selected' : '')?>>Antiguos primero</OPTION>   
                           <OPTION VALUE="3"  <?php echo ($tipoAnuncianteF == 3 ? 'selected' : '')?>>Nuevos primero</OPTION>
                           <OPTION VALUE="3"  <?php echo ($tipoAnuncianteF == 4 ? 'selected' : '')?>>Más vistos primero</OPTION>
                           <OPTION VALUE="3"  <?php echo ($tipoAnuncianteF == 5 ? 'selected' : '')?>>Menos vistos primero</OPTION>
         </SELECT>    
         
         
  
</form>
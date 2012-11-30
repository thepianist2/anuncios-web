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
        <SELECT NAME="categoriaF" SIZE="1" style="width: 160px; " onChange="javascript:abreSitio()">
                 <OPTION VALUE="0" >Todas</OPTION>
                        <?php foreach ($categorias as $categoria) { ?>
                 <OPTION VALUE="<?php echo $categoria->id; ?>" <?php echo ($categoriaF == $categoria->id ? 'selected' : '')?>><?php echo $categoria->getTexto(); ?></OPTION>
                           <?php   } ?>
         </SELECT>  
         Provincia
         <SELECT NAME="provinciaF" SIZE="1" style="width: 160px; " onChange="javascript:abreSitio()">
                           <OPTION VALUE="0" >Todas</OPTION>
                        <?php foreach ($provincias as $provincia) { ?>
                      <OPTION VALUE="<?php echo $provincia->id; ?>" <?php echo ($provinciaF == $provincia->id ? 'selected' : '')?>><?php echo $provincia->getTexto(); ?></OPTION>
                           <?php   } ?>                 
         </SELECT> 
         Oferta/Demanda
         <SELECT NAME="ofertaDemandaF" SIZE="1" style="width: 70px; " onChange="javascript:abreSitio()">
                           <OPTION VALUE="0"  <?php echo ($ofertaDemandaF == 0 ? 'selected' : '')?>>Todas</OPTION>
                           <OPTION VALUE="1"  <?php echo ($ofertaDemandaF == 1 ? 'selected' : '')?>>Oferta</OPTION>
                           <OPTION VALUE="2"  <?php echo ($ofertaDemandaF == 2 ? 'selected' : '')?>>Demanda</OPTION>          
         </SELECT>   
         
          Tipo anunciante
         <SELECT NAME="tipoAnuncianteF" SIZE="1" style="width: 70px; " onChange="javascript:abreSitio()">
                           <OPTION VALUE="0"  <?php echo ($tipoAnuncianteF == 0 ? 'selected' : '')?>>Todos</OPTION>
                           <OPTION VALUE="1"  <?php echo ($tipoAnuncianteF == 1 ? 'selected' : '')?>>Particular</OPTION>
                           <OPTION VALUE="2"  <?php echo ($tipoAnuncianteF == 2 ? 'selected' : '')?>>Empresa</OPTION>          
         </SELECT>    
         
         
  
</form>
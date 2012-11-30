<script type="text/javascript">

    jQuery(window).load(function () {
  document.forms[0].query.focus();
  document.forms[0].query.selectionStart=jQuery("#campo_busqueda").get(0).value.length;

});
</script>

<form id="buscador" action="<?php echo url_for('default/buscar') ?>" method="post">
	<h2 id="letra-buscador">Busca tus anuncios aquí</h2>	<br>	
        <input  x-webkit-speech  size="25" type="text" name="query" value="<?php echo $query ?>" id="campo_busqueda" />
        <SELECT NAME="categoriaF" SIZE="1" style="width: 200px; " onChange="javascript:abreSitio()">
                 <OPTION VALUE="0" >Todas</OPTION>
                        <?php foreach ($categorias as $categoria) { ?>
                 <OPTION VALUE="<?php echo $categoria->id; ?>" <?php echo ($categoriaF == $categoria->id ? 'selected' : '')?>><?php echo $categoria->getTexto(); ?></OPTION>
                           <?php   } ?>
         </SELECT>   
         <SELECT NAME="provinciaF" SIZE="1" style="width: 200px; " onChange="javascript:abreSitio()">
                           <OPTION VALUE="0" >Todas</OPTION>
                        <?php foreach ($provincias as $provincia) { ?>
                      <OPTION VALUE="<?php echo $provincia->id; ?>" <?php echo ($provinciaF == $provincia->id ? 'selected' : '')?>><?php echo $provincia->getTexto(); ?></OPTION>
                           <?php   } ?>                 
         </SELECT> 
  
</form>
<script type="text/javascript">

    jQuery(window).load(function () {
  document.forms[0].query.focus();
  document.forms[0].query.selectionStart=jQuery("#campo_busqueda").get(0).value.length;

});
</script>

<br></br>
<form id="buscador" action="<?php echo url_for('default/buscar') ?>" method="post">
	<h2 class="titulo" style="margin-left:10px; margin-top:2px; margin-right:5px; float:left;">Buscador</h2>
            		
        <input  x-webkit-speech style="display: block;" size="25" type="text" name="query"
			value="<?php echo $query ?>"
			id="campo_busqueda" />
               <SELECT NAME="categoriaF" SIZE="1" style="width: 100px; " onChange="javascript:abreSitio()">
                   <OPTION VALUE="0" >Todas</OPTION>
   
        <?php foreach ($categorias as $categoria) { ?>
                      <OPTION VALUE="<?php echo $categoria->id; ?>" <?php echo ($categoriaF == $categoria->id ? 'selected' : '')?>><?php echo $categoria->getTexto(); ?></OPTION>
                           <?php   } ?>
                              

                </SELECT>
        
                       <SELECT NAME="provinciaF" SIZE="1" style="width: 100px; " onChange="javascript:abreSitio()">
                           <OPTION VALUE="0" >Todas</OPTION>
   
        <?php foreach ($provincias as $provincia) { ?>
                      <OPTION VALUE="<?php echo $provincia->id; ?>" <?php echo ($provinciaF == $provincia->id ? 'selected' : '')?>><?php echo $provincia->getTexto(); ?></OPTION>
                           <?php   } ?>
                              

                </SELECT>
        

        <br><br>    
</form>
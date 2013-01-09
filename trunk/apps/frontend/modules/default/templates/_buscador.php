<script type="text/javascript">

    jQuery(window).load(function () {
  document.forms[0].query.focus();
  document.forms[0].query.selectionStart=jQuery("#campo_busqueda").get(0).value.length;

});
</script>

<form id="buscador" action="<?php echo url_for('default/buscar') ?>" method="post">
	<br>	
        Palabra
        <input  x-webkit-speech  size="18" type="text" name="query" style="margin-left: 30px;" value="<?php echo $query ?>" id="campo_busqueda" />
        Provincia
         <SELECT class="select-buscador" NAME="provinciaF" SIZE="1" style="width: 160px; " onChange="javascript:abreSitio()">
                           <OPTION class="option-buscador" VALUE="0" >Todas</OPTION>
                        <?php foreach ($provincias as $provincia) { ?>
                      <OPTION class="option-buscador" VALUE="<?php echo $provincia->id; ?>" <?php echo ($provinciaF == $provincia->id ? 'selected' : '')?>><?php echo $provincia->getTexto(); ?></OPTION>
                           <?php   } ?>                 
         </SELECT> 
        Categoría
        <SELECT  class="select-buscador" NAME="categoriaF" SIZE="1" style="width: 160px; " onChange="javascript:abreSitio()">
            <OPTION class="option-buscador" VALUE="0" >Todas</OPTION>
                        <?php foreach ($categorias as $categoria) { ?>
                 <OPTION class="option-buscador" VALUE="<?php echo $categoria->id; ?>" <?php echo ($categoriaF == $categoria->id ? 'selected' : '')?>><?php echo $categoria->getTexto(); ?></OPTION>
                           <?php   } ?>
         </SELECT>  
         Ofrece/Necesita
         <SELECT class="select-buscador" NAME="ofertaDemandaF" SIZE="1" style="width: 120px; " onChange="javascript:abreSitio()">
                          <OPTION  class="option-buscador" VALUE="todos"  <?php echo ($ofertaDemandaF == "todos" ? 'selected' : '')?>>Todos</OPTION>
                           <OPTION  class="option-buscador" VALUE="vende"  <?php echo ($ofertaDemandaF == "vende" ? 'selected' : '')?>>Vende/Ofrece</OPTION>
                           <OPTION class="option-buscador" VALUE="compra"  <?php echo ($ofertaDemandaF == "compra" ? 'selected' : '')?>>Compra/Necesita</OPTION>          
         </SELECT>   <br><br>
         <h2 id="letra-ordenar">Ordenar la búsqueda</h2>
         
         <div id="capa-centrar">
         <SELECT class="select-order" NAME="selectOrder" SIZE="1" style="width: 200px; " onChange="javascript:abreSitio()">
                           <OPTION class="option-buscador" VALUE="rand()"  <?php echo ($selectOrder == "rand()" ? 'selected' : '')?>>Sin ordenar</OPTION>
                           <OPTION class="option-buscador" VALUE="a.precio DESC"  <?php echo ($selectOrder == "a.precio DESC" ? 'selected' : '')?>>Económicos primero</OPTION>
                           <OPTION class="option-buscador" VALUE="a.precio ASC"  <?php echo ($selectOrder == "a.precio ASC" ? 'selected' : '')?>>Caros primero</OPTION>
                           <OPTION class="option-buscador" VALUE="a.created_at DESC"  <?php echo ($selectOrder == "a.created_at DESC" ? 'selected' : '')?>>Antiguos primero</OPTION>   
                           <OPTION class="option-buscador" VALUE="a.created_at ASC"  <?php echo ($selectOrder == "a.created_at ASC" ? 'selected' : '')?>>Nuevos primero</OPTION>
                           <OPTION class="option-buscador" VALUE="a.visitas DESC"  <?php echo ($selectOrder == "a.visitas DESC" ? 'selected' : '')?>>Más vistos primero</OPTION>
                           <OPTION class="option-buscador" VALUE="a.visitas ASC"  <?php echo ($selectOrder == "a.visitas ASC" ? 'selected' : '')?>>Menos vistos primero</OPTION>
                           <OPTION class="option-buscador" VALUE="a.votopositivo DESC"  <?php echo ($selectOrder == "a.votopositivo DESC" ? 'selected' : '')?>>Más votados primero</OPTION>
                           <OPTION class="option-buscador" VALUE="a.votopositivo ASC"  <?php echo ($selectOrder == "a.votopositivo ASC" ? 'selected' : '')?>>Menos votados primero</OPTION>
         </SELECT>   
             
             
             <div id="capa-izquierda">
                 <br><br><br>
                 <input title="buscar" alt="buscar" class="boton" id="enviar-busqueda" type="image" src="/images/iconos/Zoom.png" value="Buscar" />
             </div>
             <div id="capa-derecha">
                 <br><br><br>
                 <a href="<?php echo url_for('default/new') ?>"><img  title="nuevo anuncio" alt="nuevo anuncio" src="/images/iconos/Text Bubble.png"></a>     
             </div>             
         </div>
</form>
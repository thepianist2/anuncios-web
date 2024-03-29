<script type="text/javascript">

    jQuery(window).load(function () {
  document.forms[0].query.focus();
  document.forms[0].query.selectionStart=jQuery("#campo_busqueda").get(0).value.length;

});
</script>
<a class="ocultar-buscador" id="ocultar-buscador" href="javascript:void()" title="Ocultar buscador" style="text-decoration: none; color: black; float: left;">  ▲ </a>
    <a class="ocultar-buscador" id="ocultar-buscador" href="javascript:void()" title="Ocultar buscador" style="text-decoration: none; color: black;">  ▲ </a>
    <a class="ocultar-buscador" id="ocultar-buscador" href="javascript:void()" title="Ocultar buscador" style="text-decoration: none; color: black; float:right;">  ▲ </a>
    <br><br><br>
<form name="buscador" id="buscador" action="<?php echo url_for('default/buscar') ?>" method="get">

	<br>	
        Palabra
        <input  x-webkit-speech  size="18" type="text" name="query" autocomplete="on" style="margin-left: 30px;" value="<?php echo $query ?>" id="campo_busqueda" />
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
         <input style="margin-left: 380px;" type="checkbox" <?php echo ($soloImagen == 'on' ? 'checked' : '')?> name="soloImagen" id="soloImagen">  Solo anuncios con Imágenes
         <br><br>
         <h2 id="letra-ordenar">Ordenar la búsqueda</h2>
         
         <div id="capa-centrar">
         <SELECT class="select-order" NAME="selectOrder" SIZE="1" style="width: 200px; " onChange="javascript:abreSitioOrder()">
                            <OPTION class="option-buscador" VALUE="rand()"  <?php echo ($selectOrder == "rand()" ? 'selected' : '')?>>Sin ordenar</OPTION>
                           <OPTION class="option-buscador" VALUE="a.titulo ASC"  <?php echo ($selectOrder == "a.titulo ASC" ? 'selected' : '')?>>Orden alfabético (A-Z)</OPTION>
                           <OPTION class="option-buscador" VALUE="a.titulo DESC"  <?php echo ($selectOrder == "a.titulo DESC" ? 'selected' : '')?>>Orden alfabético (Z-A)</OPTION>
                           <OPTION class="option-buscador" VALUE="a.precio DESC"  <?php echo ($selectOrder == "a.precio DESC" ? 'selected' : '')?>>Caros primero</OPTION>
                           <OPTION class="option-buscador" VALUE="a.precio ASC"  <?php echo ($selectOrder == "a.precio ASC" ? 'selected' : '')?>>Económicos primero</OPTION>
                           <OPTION class="option-buscador" VALUE="a.created_at ASC"  <?php echo ($selectOrder == "a.created_at ASC" ? 'selected' : '')?>>Antiguos primero</OPTION>   
                           <OPTION class="option-buscador" VALUE="a.created_at DESC"  <?php echo ($selectOrder == "a.created_at DESC" ? 'selected' : '')?>>Nuevos primero</OPTION>
                           <OPTION class="option-buscador" VALUE="a.visitas DESC"  <?php echo ($selectOrder == "a.visitas DESC" ? 'selected' : '')?>>Más vistos primero</OPTION>
                           <OPTION class="option-buscador" VALUE="a.visitas ASC"  <?php echo ($selectOrder == "a.visitas ASC" ? 'selected' : '')?>>Menos vistos primero</OPTION>
                           <OPTION class="option-buscador" VALUE="a.votopositivo DESC"  <?php echo ($selectOrder == "a.votopositivo DESC" ? 'selected' : '')?>>Más votados primero</OPTION>
                           <OPTION class="option-buscador" VALUE="a.votopositivo ASC"  <?php echo ($selectOrder == "a.votopositivo ASC" ? 'selected' : '')?>>Menos votados primero</OPTION>
         </SELECT>   
             
             
             <div id="capa-izquierda" onClick="javascript:abreSitioOrder()">
                 <br><br><br>

             </div>
             <div id="capa-derecha">
                 <br><br><br>
                                  <input title="buscar" alt="buscar" class="boton" id="enviar-busqueda" type="image" src="/images/iconos/Zoom.png" value="Buscar" /><br><br>
<!--                 <p style="cursor: pointer;">Buscar</p>-->

<!--                 <a class="nuevo-anuncio" href="<?php // echo url_for('default/new') ?>"><img  title="nuevo anuncio" alt="nuevo anuncio" src="/images/iconos/Text Bubble.png"><br><br>Nuevo Anuncio</a>     -->
             </div>             
         </div>
</form>

<script  type="text/javascript">

    
    function abreSitioOrder(){
document.buscador.submit();
}         


     jQuery(document).ready(function(){
   $("#campo_busqueda").autocomplete({
      source:"<?php echo url_for('default/anuncios') ?>", 
      minLength:'1'
   });
 });


$('#ocultar-buscador').live('click', function(e){

if ($("#buscador").is (':visible')){
    $("#buscador").slideUp();
$('.ocultar-buscador').text('▼');
$('.ocultar-buscador').title('Mostrar buscador');
    
}else{
       $("#buscador").slideDown();
$('.ocultar-buscador').text('▲'); 
$('.ocultar-buscador').title('Ocultar buscador');
}

});


</script>
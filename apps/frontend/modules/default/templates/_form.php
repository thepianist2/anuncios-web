<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<script type="text/javascript">
    //cargamos el mapa
$(document).ready(function() {
    load_map();
});

var initialLocation;
var browserSupportFlag =  new Boolean();
//contador para array de marcadores
var k=0;  
//variable mapa
var map;
//array para guardar las direcciones que se marcan en el checkbox, y recorrerlas poniendo un marcador.
var direcciones = new Array();
//variable para guardar todos los marcadores
var marcadores = new Array();
 //funcion para cargar el mapa
function load_map() {
     //coordenadas de inicio de mapa       
//    var myLatlng = new google.maps.LatLng(40.396764,-3.713379);
    //opciones para el nuevo mapa.
    var myOptions = {
        //opcion de zoom al iniciar el mapa
        zoom: 4,
        //opcion que nos dice las coordenadas del centro del mapa
//        center: myLatlng,
        //opcion que nos dice que tipo de mapa será, aspecto estan, ROADMAP, SATELLITE, HYBRID, TERRAIN
        mapTypeId: google.maps.MapTypeId.HYBRID
    };
    //se carga el mapa en el id del div, con las opciones
    map = new google.maps.Map($("#map_canvas").get(0), myOptions);
    //mapa 45 grados
//    map.setTilt(45);
    // Try W3C Geolocation (Preferred)
  if(navigator.geolocation) {
    browserSupportFlag = true;
    navigator.geolocation.getCurrentPosition(function(position) {
      initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
      map.setCenter(initialLocation);
    }, function() {
      handleNoGeolocation(browserSupportFlag);
    });
  // Try Google Gears Geolocation
  } else if (google.gears) {
    browserSupportFlag = true;
    var geo = google.gears.factory.create('beta.geolocation');
    geo.getCurrentPosition(function(position) {
      initialLocation = new google.maps.LatLng(position.latitude,position.longitude);
      map.setCenter(initialLocation);
    }, function() {
      handleNoGeoLocation(browserSupportFlag);
    });
  // Browser doesn't support Geolocation
  } else {
    browserSupportFlag = false;
    handleNoGeolocation(browserSupportFlag);
  }
  
  function handleNoGeolocation(errorFlag) {
    if (errorFlag == true) {
      load_mapSinUbicacion();
      initialLocation = newyork;
    } else {
      load_mapSinUbicacion();
      initialLocation = siberia;
    }
    map.setCenter(initialLocation);
  }

}


function load_mapSinUbicacion() {
     //coordenadas de inicio de mapa       
    var myLatlng = new google.maps.LatLng(40.396764,-3.713379);
    //opciones para el nuevo mapa.
    var myOptions = {
        //opcion de zoom al iniciar el mapa
        zoom: 4,
        //opcion que nos dice las coordenadas del centro del mapa
        center: myLatlng,
        //opcion que nos dice que tipo de mapa será, aspecto estan, ROADMAP, SATELLITE, HYBRID, TERRAIN
        mapTypeId: google.maps.MapTypeId.HYBRID
    };
    //se carga el mapa en el id del div, con las opciones
    map = new google.maps.Map($("#map_canvas").get(0), myOptions);
    //mapa 45 grados
//    map.setTilt(45);
}

$('#search').live('click', function() {
    if($('#anuncio_idProvinciaAnuncio').val()!=""){
    var provincia=$("#anuncio_idProvinciaAnuncio option:selected").html();
    load_map();
    // Obtenemos la dirección y la asignamos a una variable
    var address = $('#anuncio_localidad').val() +","+provincia;
    // Creamos el Objeto Geocoder
    var geocoder = new google.maps.Geocoder();
    // Hacemos la petición indicando la dirección e invocamos la función
    // geocodeResult enviando todo el resultado obtenido
    geocoder.geocode({ 'address': address}, geocodeResult);
}
else
{
$().toastmessage('showWarningToast', "Primero selecciona la provincia");
}
});

 
function geocodeResult(results, status) {
    // Verificamos el estatus
    if (status == 'OK') {

        // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
        map.fitBounds(results[0].geometry.viewport);

        //crea un marcador y lo guarda en el mapa, le pasamos las coordenadas, y la direccion formateada
        crearMarcador(results[0].geometry.location,results[0].formatted_address);
    
    }
//else {
//        // En caso de no haber resultados o que haya ocurrido un error
//        // lanzamos un mensaje con el error
//        alert("Geocoding no tuvo éxito debido a: " + status);
//    }
}
//esta funcion se encarga de crear un marcador y añadirlo al mapa
function crearMarcador(localizacion,direccion) {
    
             // Creamos un marcador y lo posicionamos en el mapa
     var marcador = new google.maps.Marker({
         //indica la posicion donde se crea el marcador, con coordenadas
        position: localizacion,
        //indica a que mapa pertenece este marcador
        map: map,
        //indica el texto que se ve al hacercar el ratón al marcador
        title: direccion,
        //indica el icono del marcador hotel home administration
        icon: 'http://google-maps-icons.googlecode.com/files/tickmark1.png'
        });
        
        $('#piso_direccion').val(direccion);
        $('#piso_coordenadaX').val(localizacion.lat());
        $('#piso_coordenadaY').val(localizacion.lng());
        //evento click para el marcador
        google.maps.event.addListener(marcador, 'click', function() {
          //hacerca el zoom a 19 en el mapa
          map.setZoom(19);
          //centra al mapa en la posicion del marcador
          map.setCenter(marcador.getPosition());
        });
        
}

</script>
<form action="<?php echo url_for('default/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('default/index') ?>">Volver</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'default/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Está seguro?')) ?>
          <?php endif; ?>
            <div style="text-align: right;">
          <input type="submit" value="Segundo paso →→" />
          </div>
        </td>
      </tr>
    </tfoot>
    <tbody>
        <?php echo $form->renderGlobalErrors() ?>
        <?php  echo $form['_csrf_token'] ?>
        <?php  echo $form[$form->getCSRFFieldName()]->render() ?>
              <tr>
                <th><?php echo $form['titulo']->renderLabel() ?></th>
                <td>
                  <?php echo $form['titulo']->renderError() ?>
                  <?php echo $form['titulo'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['descripcion']->renderLabel() ?></th>
                <td>
                  <?php echo $form['descripcion']->renderError() ?>
                  <?php echo $form['descripcion'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['precio']->renderLabel() ?></th>
                <td>
                  <?php echo $form['precio']->renderError() ?>
                  <?php echo $form['precio'] ?>
                </td>
            </tr>     
            <tr>
                <th><?php echo $form['fechaInicio']->renderLabel() ?></th>
                <td>
                  <?php echo $form['fechaInicio']->renderError() ?>
                  <?php echo $form['fechaInicio'] ?>
                </td>
            </tr>   
            <tr>
                <th><?php echo $form['fechaFin']->renderLabel() ?></th>
                <td>
                  <?php echo $form['fechaFin']->renderError() ?>
                  <?php echo $form['fechaFin'] ?>
                </td>
            </tr>               
            <tr>
                <th><?php echo $form['idCategoriaAnuncio']->renderLabel() ?></th>
                <td>
                  <?php echo $form['idCategoriaAnuncio']->renderError() ?>
                  <?php echo $form['idCategoriaAnuncio'] ?>
                </td>
            </tr>         
            <tr>
                <th><?php echo $form['idProvinciaAnuncio']->renderLabel() ?></th>
                <td>
                  <?php echo $form['idProvinciaAnuncio']->renderError() ?>
                  <?php echo $form['idProvinciaAnuncio'] ?>
                </td>
            </tr>      
            <tr>
                <th><?php echo $form['localidad']->renderLabel() ?></th>
                <td>
                  <?php echo $form['localidad']->renderError() ?>
                  <?php echo $form['localidad'] ?>
                    <input style="color: red;" type="button" id="search" value="Validar Localidad" /><br/>
                </td>
            </tr>     
                    
        
      <tr>
          <th><label>Visualización del mapa</label></th>
        <td>
<div id='map_canvas' style="width:400px; height:400px;"></div><br></br>

        </td>
      </tr>
            <tr>
                <th><?php echo $form['codigoPostal']->renderLabel() ?></th>
                <td>
                  <?php echo $form['codigoPostal']->renderError() ?>
                  <?php echo $form['codigoPostal'] ?>
                </td>
            </tr>         
           <tr>
                <th><?php echo $form['tipoAnuncio']->renderLabel() ?></th>
                <td>
                  <?php echo $form['tipoAnuncio']->renderError() ?>
                  <?php echo $form['tipoAnuncio'] ?>
                </td>
            </tr>    
           <tr>
                <th><?php echo $form['enlaceVideo']->renderLabel() ?></th>
                <td>
                  <?php echo $form['enlaceVideo']->renderError() ?>
                  <?php echo $form['enlaceVideo'] ?>
                </td>
            </tr>  
           <tr>
                <th><?php echo $form['nombre']->renderLabel() ?></th>
                <td>
                  <?php echo $form['nombre']->renderError() ?>
                  <?php echo $form['nombre'] ?>
                </td>
            </tr>    
           <tr>
                <th><?php echo $form['correo']->renderLabel() ?></th>
                <td>
                  <?php echo $form['correo']->renderError() ?>
                  <?php echo $form['correo'] ?>
                </td>
            </tr>
           <tr>
                <th><?php echo $form['telefono']->renderLabel() ?></th>
                <td>
                  <?php echo $form['telefono']->renderError() ?>
                  <?php echo $form['telefono'] ?>
                </td>
            </tr>   
           <tr>
                <th><?php echo $form['tipo']->renderLabel() ?></th>
                <td>
                  <?php echo $form['tipo']->renderError() ?>
                  <?php echo $form['tipo'] ?>
                </td>
            </tr>               

        

    </tbody>
  </table>
</form>
<script type="text/javascript">
    jQuery(function($){
   $.datepicker.regional['es'] = {
      closeText: 'Cerrar',
      prevText: '<Ant',
      nextText: 'Sig>',
      currentText: 'Hoy',
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
      dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
      dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
      dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
      weekHeader: 'Sm',
      firstDay: 1,
      minDate: 0,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ''};
   $.datepicker.setDefaults($.datepicker.regional['es']);
});
    

    
    
    $(document).ready(function() {
       $('#anuncio_fechaInicio').datepicker();
       $('#anuncio_fechaFin').datepicker();
       
       
           $('#anuncio_titulo').blur(function() {
       var titulo=$('#anuncio_titulo').val();
       if(titulo.length<=0){
           $().toastmessage('showWarningToast', "El título no puede estar vacío");
       }
       if(titulo.length>=35){
           $().toastmessage('showWarningToast', "El título debe ser mas corto máximo 35 caracteres.");
       }
     });
 
 
 
 
 
 
 
    });
</script>

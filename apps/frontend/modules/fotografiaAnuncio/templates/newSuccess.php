<h1>Sube las fotografias de tu anuncio</h1>
</br></br></br></br>
<script type="text/javascript" src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>
<script type="text/javascript">
// Convert divs to queue widgets when the DOM is ready
$(function() {
	$("#uploader").plupload({
		// General settings
		runtimes : 'gears,flash,silverlight,browserplus,html5',
		url : '<?php echo url_for('fotografiaAnuncio/upload?idAnuncio='.$idAnuncio); ?>',
		max_file_size : '10mb',
		chunk_size : '1mb',
		unique_names : true,

		// Resize images on clientside if we can
		resize : {width : 520, height : 345, quality : 90},

		// Specify what files to browse for
		filters : [
			{title : "Image files", extensions : "jpg,gif,png"},
		],

		// Flash settings
		flash_swf_url : '/plupload/js/plupload.flash.swf',

		// Silverlight settings
		silverlight_xap_url : '/plupload/js/plupload.silverlight.xap'
	});

	// Client side form validation
	$('form').submit(function(e) {
        var uploader = $('#uploader').plupload('getUploader');

        // Files in queue upload them first
        if (uploader.files.length > 0) {
            // When all files are uploaded submit form
            uploader.bind('StateChanged', function() {
                if (uploader.files.length === (uploader.total.uploaded + uploader.total.failed)) {
                    $('form')[0].submit();
                }
            });
                
            uploader.start();
        } else
            alert('You must at least upload one file.');

        return false;
    });
});
</script>

        <table>
           <tr>
                <th></th>
                <td>
                    <div id="uploader">
                        <p>Su navegador no dispone de Flash, Silverlight, Gears, BrowserPlus o soporte HTML5.</p>
                    </div>
                </td>
            </tr>   
            
              </table>

<a href="<?php echo url_for('fotografiaAnuncio/terminar?idAnuncio='.$idAnuncio) ?>">
<input  name="terminar" class="terminar" id="terminar"  type="image" src="<?php echo '/images/frontend/comentar.png'; ?>"><br>Comentar
</a>

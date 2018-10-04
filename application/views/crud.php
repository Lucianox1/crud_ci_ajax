<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*formaction="<?php base_url();?>ctr_frutas/guardar"*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crud con codeigniter</title>
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
</head>
<body>
	<div>
		<form method="POST">
			<input type="text" placeholder="Nombre" name="txtnombre" id="txtnombre">
			<input type="text" placeholder="Color" name="txtcolor" id="txtcolor">
			<button id="btnguardar" name="btnguardar" >Guardar</button>
		</form>
	</div>
	<div id="div_tabla" name="div_tabla">
		<p id="parrafo_mensaje">hola</p>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnguardar').click(function(e){
			e.preventDefault();
			var nombre = $('#txtnombre').val();
			var color = $('#txtcolor').val();

			$.ajax({
				url: '<?php base_url();?>ctr_frutas/guardar',
				type: 'POST',
				dataType: 'default',
				data: {'nombre': nombre,'color': color},
				success: function (data) { 
					$('#parrafo_mensaje').text(data);
				},
        		error: function (jqXHR, textStatus, errorThrown) { 
        			
        			$('#parrafo_mensaje').text(jqXHR.responseText);
        		}
			});
			
		});
	});
</script>
</html>
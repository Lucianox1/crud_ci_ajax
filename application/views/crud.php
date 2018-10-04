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
			<button id="btnguardar" name="btnguardar" type="submit" >Guardar</button>
		</form>
	</div>
	<div id="div_tabla" name="div_tabla">
		
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnguardar').click(function(){
			var nombre = $('#txtnombre').val();
			var color = $('#txtcolor').val();

			$.ajax({
				url: '<?php base_url();?>ctr_frutas/guardar',
				type: 'POST',
				dataType: 'default',
				data: {'nombre': nombre,'color':color},
				success: function (data) { 
					alert("funciono");
				},
        		error: function (jqXHR, textStatus, errorThrown) { 
        			console.log(jqXHR);
        		}
			});
			
		});
	});
</script>
</html>
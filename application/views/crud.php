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
			<button id="btncargar" name="btncargar" >Cargar</button>
			<button id="btnguardar" name="btnguardar" >Guardar</button>
			<button id="btnmodificar" name="btnmodificar" >Modificar</button>
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
					
				},
        		error: function (jqXHR, textStatus, errorThrown) { 
        			
        			$('#parrafo_mensaje').text(jqXHR.responseText);
        		}
			});
		  cargar();

		});

		$('#btncargar').click(function(e){
			e.preventDefault();
			cargar();
		});

		$('html').on("click",'.btn_eliminar',function(){
			
			var id = this.id;

			$.ajax({
				url: '<?php base_url();?>ctr_frutas/eliminar',
				type: 'POST',
				dataType: 'default',
				data: {'id': id},
				success: function (data) { 
					
				},
        		error: function (jqXHR, textStatus, errorThrown) { 
        			$('#parrafo_mensaje').text(jqXHR.responseText);
        		}
			});
			cargar();
		});

		$('#btnmodificar').click(function(){
			var nombre = $('#txtnombre').val();
			var color = $('#txtcolor').val();
			$.ajax({
				url: '<?php base_url();?>ctr_frutas/modificar',
				type: 'POST',
				dataType: 'default',
				data: {'id': 38, 'nombre': nombre,'color': color},
				success: function (data) { 
					$('#parrafo_mensaje').text(data);
				},
        		error: function (jqXHR, textStatus, errorThrown) { 
        			
        			$('#parrafo_mensaje').text(jqXHR.responseText);
        		}
			});
			cargar();
		});

		function cargar(){
			$.ajax({
				url: '<?php base_url();?>ctr_frutas/cargar_todo',
				type: 'POST',
				success: function (data) { 
					$('#div_tabla').empty();
					tabla = "<table><tr><th>Nombre</th><th>Color</th><th></th></tr>";
					$.each(JSON.parse(data),function(index, obj) {
						//console.log(obj.nombre);
						tabla += "<tr><td>"+obj.nombre+"</td><td>"+obj.color+"</td><td><button class='btn_eliminar' id="+obj.id+" >eliminar</button></td></tr>";
					});
					tabla += "</table>";
					$('#div_tabla').append(tabla);
				},
        		error: function (jqXHR, textStatus, errorThrown) { 
        			$('#parrafo_mensaje').text(jqXHR.responseText);
        		}
			});
		}
	});
</script>
</html>
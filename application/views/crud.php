<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*formaction="<?php base_url();?>ctr_frutas/guardar"*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crud con codeigniter</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body class="container">
	<div>
		<form method="POST">
			<input type="text" placeholder="Nombre" name="txtnombre" id="txtnombre">
			<input type="text" placeholder="Color" name="txtcolor" id="txtcolor">
			<button id="btncargar" name="btncargar" class="btn btn-primary">Cargar</button>
			<button id="btnguardar" name="btnguardar" class="btn btn-primary">Guardar</button>

		</form>
	</div>
	<div id="div_tabla" name="div_tabla">
		<p id="parrafo_mensaje">hola</p>
		
	</div>

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
<script type="text/javascript">
	var id_fruta = null;

	$(document).ready(function(){
	

		$('#btnguardar').click(function(e){
			e.preventDefault();
			var nombre = $('#txtnombre').val();
			var color = $('#txtcolor').val();
			//alert(id_fruta);
			$.ajax({
				url: '<?php base_url();?>ctr_frutas/guardar',
				type: 'POST',
				dataType: 'default',
				data: {'nombre': nombre,'color': color, 'idf': id_fruta},
				success: function (data) {
					
				},
        		error: function (jqXHR, textStatus, errorThrown) { 
        			$('#parrafo_mensaje').text(jqXHR.responseText);
        		},
        		complete : function (xhr, status){
        			id_fruta = null;
        			cargar();

        		}
			});
		  
		});

		$('#btncargar').click(function(e){
			e.preventDefault();
			cargar();
		});

		$('html').on("click",'.btn_eliminar',function(e){
			e.preventDefault();
			var id = this.id;
			//setTimeout(cargar(),500);
			$.ajax({
				url: '<?php base_url();?>ctr_frutas/eliminar',
				type: 'POST',
				dataType: 'default',
				data: {'id': id},
				success: function (data) { 
				},
        		error: function (jqXHR, textStatus, errorThrown) { 
        			$('#parrafo_mensaje').text(jqXHR.responseText);
        		},
        		complete : function (xhr, status){
        			cargar();
        		}
			});
		});

		$('html').on("click",".btnmodificar",function(e){
			e.preventDefault();
			$('#txtnombre').val($(this).parents("tr").find("td").eq(0).text());
			$('#txtcolor').val($(this).parents("tr").find("td").eq(1).text());
			id_fruta = this.id;
			
		});



		function cargar(){

			$('#txtnombre').val('');
			$('#txtcolor').val('');

			$.ajax({
				url: '<?php base_url();?>ctr_frutas/cargar_todo',
				type: 'POST',
				success: function (data) {
					var tabla = ""; 
					$('#div_tabla').empty();
					tabla = "<table class'table'><thead class='thead-light'><tr scope='col'><thscope='col'>Nombre</th><th scope='col'>Color</th><th scope='col'></th></tr></thead>";
					$.each(JSON.parse(data),function(index, obj) {
						//console.log(obj.nombre);
						tabla += "<tr><th scope='row'>1</th><td>"+obj.nombre+"</td><td>"+obj.color+"</td><td><button class='btn_eliminar btn btn-danger' id="+obj.id+" >eliminar</button><button class='btnmodificar btn btn-success' id="+obj.id+" >modificar</button></td></tr>";
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
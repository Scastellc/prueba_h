<!DOCTYPE html>
<html>
<head>
	<title>Prueba Hotelinking</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
	<?php 
		include_once "funciones.php";
	?>
</head>
<body>
	<h4 style="text-align:center; margin-top: 5%;">¿Que desea hacer?</h4>
	<div class="container" style="text-align: center; margin-top: 5%;">						   
    	<input type='button' name="verCodigos" id="verCodigos" value='Ver Codigos' onclick = "location = 'listaCodes.php'" class="btn btn-success" />							   
    	<input type='button' name="crearCodigos" id="crearCodigos" value='Crear Codigo' onclick="generarCode()" class="btn btn-warning"/>	
	</div>


	<?php  		
		usuario();
		if (isset($_POST['guardar'])) {		
			guardar();
		}else{
			
			GuardarCode();
		}
		
		function GuardarCode(){
		
	?>
	<div>
		<form action="" method="POST" id="formuEnviar">			
		</form>
	</div>

	<?php  		
		}		
	?>

</body>
	<script type="text/javascript">

		// Creara los elementos ocultos, y mostrara un codigo que devuelve el php
		function generarCode() {
			
			var form = document.getElementById('formuEnviar');
			
			var elem_p = document.createElement('p');
			var code = document.createTextNode("<?php crearCode();?>");
			elem_p.appendChild(code);
			elem_p.setAttribute("style", "text-align:center; margin-top: 2%;");
			form.appendChild(elem_p); 	
			
			var elem_input = document.createElement('input');
			elem_input.setAttribute("type", "hidden");
			elem_input.setAttribute("name", "code"); 
			elem_input.setAttribute("value", elem_p.innerText);  
			form.appendChild(elem_input); 	

			var elem_button = document.createElement('input');
			elem_button.setAttribute("value", "Guardar");
			elem_button.setAttribute("type", "submit");
			elem_button.setAttribute("name", "guardar");
			elem_button.setAttribute("style", "margin-left:45%; margin-top: 2%;");
			elem_button.setAttribute("class", "btn btn-dark");
			form.appendChild(elem_button);

			var boton = document.getElementById('crearCodigos');
			boton.setAttribute("disabled", true);
		}

	</script>
</html>
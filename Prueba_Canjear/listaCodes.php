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
	<?php  		
		usuario();
		if (isset($_POST['canjeo'])) {		
			canjear();
		}else{
			
			ListarCodes();
		}
		
		function ListarCodes(){
		
	?>
	<form action="" method="POST">
		<table class="table">				  	
		  	<thead>						  		
		    	<th>Codigos</th>
		    	<th>Canjeado</th>
		    	<th>¿Canjear?</th>
		  	</thead>
		  	<tbody>
			<?php
				verCodes();	
			?>
			<tr>
				<td></td>
				<td><input type="button" value="Volver" onclick = "location = 'code.php'" class="btn btn-info"></td>
				<td><input type='button' name='canjeo' id="canjeo" value="canjear" onclick="guardarValores()" class="btn btn-danger"></td>
			</tr>
			<input type='hidden' id="oculto" name="oculto">
			</tbody>
		</table>
		
	</form>
	<?php
		}
	?>
	
</body>
	<script type="text/javascript">
		
		// Esta funcion sirve para almacenar los codigos que queremos canjear
		function guardarValores(){
			
			var chk = document.getElementsByName("check");
			
			var inp = document.getElementById("canjeo");
			var inpOculto = document.getElementById("oculto");
					
			var enviar = "";
			for (var i = 0; i < chk.length; i++) {
				
				if (chk[i].checked) {
					if (enviar == "") {
						enviar = chk[i].value;
					}else{
						enviar = enviar + "###" + chk[i].value;
					}					
				}				
			}

			if (enviar != "") {
				inpOculto.setAttribute("value", enviar);
				inp.setAttribute("type", "submit");
			}
		}

	</script>
</html>
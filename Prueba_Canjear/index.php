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
	<h1 style="text-align:center; margin-top: 10%;">Bienvenidos a mi prueba</h1>
	
	<?php 
	//<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" ></script>
		if (isset($_POST['enviar'])) {		
			formu();
		}else if (isset($_POST['login'])) {
			login();
		}else{
			
			formulario();
		}
		
		function formulario(){
		
	?>		
	    <div class="container" style="margin-top: 10%;">	    	
	    	<div style="float:left; margin-left: 5%;" >
				<h2>¡Registrate!</h2>
				<form action="" method="POST">
					<div>
					 	<div>
		                	<div>
								<label>Login: </label><br>
								<div>
		            				<span><i aria-hidden="true"></i></span>
		            				<input type="text" name="userF" pattern="^([a-z]+[0-9]{0,2}){5,12}$" title="Minimo 5 letras, y dos num opcional" placeholder=" Introduzca Login" required><br>
		            			</div>
							</div>
							<div>
								<label>Password:</label><br>
								<div>
		            				<span><i aria-hidden="true"></i></span>
									<input type="password" name="password1" id="pass1" title="Entre 2 y 16 digitos, minimo una mayuscula y un numero" placeholder=" Introduzca Password" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{2,16}$" required><br>
								</div>
							</div>
							<div>
								<label>Repite password:</label><br>
								<div>
		            				<span><i aria-hidden="true"></i></span>
		            				<input type="password" name="passF" id="pass2" title="Entre 2 y 16 digitos, minimo una mayuscula y un numero" placeholder=" Introduzca Password" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{2,16}$" required onblur="pass()"><br>
		            			</div>
							</div>
							<br>
							<div>						   
		                    	<input type='submit' name="enviar" id="enviar" value='Enviar' class="btn btn-primary"/>	
							</div>
						</div>
					</div>
				</form>
		    </div>
		    <div style="float:right; margin-right:15%; ">
				<h2>¡Logueate!</h2>
				<form action="" method="POST">
					<div>
					 	<div>
		                	<div>
								<label>Login:</label><br>
								<div>
		            				<span><i aria-hidden="true"></i></span>
		            				<input type="text" name="userL" pattern="^([a-z]+[0-9]{0,2}){5,12}$" title="Minimo 5 letras, y dos num opcional" placeholder=" Introduzca Login" required><br>
		            			</div>
							</div>
							<div>
								<label>Password:</label><br>
								<div>
		            				<span><i aria-hidden="true"></i></span>
									<input type="password" name="passL" title="Entre 2 y 16 digitos, minimo una mayuscula y un numero" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{2,16}$" placeholder=" Introduzca Password" required><br>
								</div>
							</div>
							<br>
							<div>						   
		                    	<input type='submit' name="login" id="login" value='Enviar' class="btn btn-info"/>	
							</div>
						</div>
					</div>
				</form>
		    </div>
		</div>
	<?php  
		}
	?>

</body>
	<script type="text/javascript">

		// Comprueba el password y el repite password sean iguales
		function pass() {
			
			var pass1 = document.getElementById('pass1');
			var pass2 = document.getElementById('pass2');

			// Comparamos el pass1 con el pass2
			if (pass1.value != pass2.value){
				alert("Las contraseñas han de ser iguales");
				pass1.value = "";
				pass2.value = "";	
			}
		}
		</script>
</html>
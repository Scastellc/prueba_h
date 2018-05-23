<?php
	session_start();

	// Uso esta funcion para saber que usuario esta logueado, y para controlar que no puedan entrar en otras paginas sin login
	function usuario(){		
		if (empty($_SESSION['cliente'])) {	
			echo "<script type='text/javascript'>window.location.assign('index.php')</script>";
		}
	}

	// Funcion para conectar a la base de datos
	function conexion(){
		$bd = new mysqli("localhost", "root", "", "hotelinking");
		$bd -> set_charset("utf8");
		
		// En caso de que la conexion no funcione. 
		if (!$bd) {
			echo "Error al conectarse con la BD";
			exit();
		}
		return $bd;
	}

	// Funcion para mandar la query a la base de datos
	function sentencia($conex, $sent){
		// Hacemos la consulta
		$result = $conex -> query($sent);

		if (!$result) {
			echo "Error en al ejecutar la consulta";
		}

		return $result;
	}

	// Funcion para cerrar la conexion
	function closeBd($bd){
		$bd -> close();
	}


	//Con esta funcion inserto un usuario a la bd

	function formu(){
		$login = $_POST['userF'];
		$pass1 = $_POST['passF'];

		// Pasamos la contraseña a md5
		$passEn = md5($pass1);

		$bd = conexion();
		$consu = "SELECT login FROM Usuario WHERE login = '" . $login . "'";
		$result = sentencia($bd, $consu);	
		
		// Contamos el numero de filas que devuelve
		$total = $result -> num_rows;

		// Si el numero es mayor a 0, ya existira ese login, por lo que no sera volcado a la BBDD
		if ($total > 0) {
			echo "<script type='text/javascript'>alert('El login ya existe');</script>";
			formulario();
			// Si el login no existe se hara el insert
		}else{
			$insertar = "INSERT INTO Usuario(login, pass) VALUES ('$login', '$passEn')"; 
			sentencia($bd, $insertar);			
			echo "<script type='text/javascript'>alert('Gracias por registrarte ". $nombre.". Ahora puedes loguearte');</script>";
			closeBd($bd);
			echo "<script type='text/javascript'>window.location.assign('index.php')</script>";
		}	
	}

	// Vamos a revisar que el usuario y la contraseña existen en la BBDD
	function login(){		
		$usu = $_POST['userL'];
		$pass = $_POST['passL'];

		$passEn = md5($pass);

		// Consultas
		$consUsu = "SELECT * FROM Usuario WHERE login = '" . $usu . "'";
		$consPass = "SELECT * FROM Usuario WHERE pass = '" . $passEn . "'";

		$bd = conexion();
		$resultUsu = sentencia($bd, $consUsu);		
		$resultPass = sentencia($bd, $consPass);

		// Contamos el numero de filas que devuelve cada consulta
		$totalUsu = $resultUsu -> num_rows;
		$totalPass = $resultPass -> num_rows;

		// Comprobamos que existe la contraseña y el login
		if ($totalUsu > 0 && $totalPass > 0) 
		{
			$_SESSION['cliente'] = $usu;
			echo "<script type='text/javascript'>window.location.assign('code.php')</script>";
		}else{
			echo "<script type='text/javascript'>alert('Usuario o contrañsea incorrectas');</script>";
			echo "<script type='text/javascript'>window.location.assign('index.php')</script>";
		}

	}	

	// Guardamos el codigo
	function guardar(){
		$bd = conexion();
		$code = $_POST['code'];

		$insert = "INSERT INTO codes(login, code) VALUES ('".$_SESSION['cliente']."','".$code."')";
		sentencia($bd, $insert);
		closeBd($bd);

		echo "<script type='text/javascript'>window.location.assign('code.php')</script>";
	}

	// Mostramos los codigos del usuario
	function verCodes(){
		$bd = conexion();
		$conCodes = "SELECT code, canjeado FROM codes WHERE login = '" . $_SESSION['cliente'] . "'";

		$result = sentencia($bd, $conCodes);

		$total = $result -> num_rows;

		if ($total > 0) {
			
			while ($fila = $result -> fetch_row()) {
		  		
		  		echo "<tr>";
					echo "<td>".$fila[0]."</td>";
					echo "<td>".$fila[1]."</td>";
					if ($fila[1] == "si") {
						echo "<td>Ya canjeado</td>";
					}else{
						echo "<td><input type='checkbox' name='check' value='".$fila[0]."'></td>";							
					}
						
				echo "</tr>";
			}
		}

		closeBd($bd);

	}

	// Crear un codigo unico mirando lo que hay en la bd
	function crearCode(){		
		$resul = '';
		$cadena = '1234567890abcdefghijklmnopqrstuvwxyz';
		$max = strlen($cadena)-1;

		// Hacemos un for de 25 caracteres, y vamos añadiendo uno a uno el caracter que sale de manera aleatoria
		for($i = 0; $i < 25; $i++){		
			$resul = $resul . '' . $cadena{mt_rand(0, $max)};			 	
		}		

		//Comprobamos que el codigo no exista en la BBDD
		$resultBD = comprobarCode($resul);
		
		if ($resultBD > 0) {
			crearCode();
		}

		// Pintamos el codigo
		echo $resul;
	}

	//Se conecta a la BBDD y mira que el codigo no se repita
	function comprobarCode($resul){
		$bd = conexion();
		$conCodes = "SELECT code FROM codes WHERE code = '" . $resul . "'";
		$result = sentencia($bd, $conCodes);
		$total = $result -> num_rows;
		closeBd($bd);
		return $total;
	}

	// Caneja los codigos 
	function canjear(){
		$bd = conexion();	

		//Recupero el hidden con los valores y lo spliteo
		$codes = $_POST['oculto'];
		$code = explode("###", $codes);
		
		// Realizamos un update por cada codigo que hemos recuperado
		foreach ($code as $key => $value) {
			$update = "UPDATE codes SET canjeado = 'si' WHERE login = '".$_SESSION['cliente']."' && code = '".$value."'";
			sentencia($bd, $update);
		}

		closeBd($bd);
		echo "<script type='text/javascript'>window.location.assign('listaCodes.php')</script>";
	}

?>
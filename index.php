<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Sistema De Asistencia Estudiantil</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/login.css" type="text/css" />
</head>
<body style="background: #34495e;">
<div class="login-form">
	<div class="login-face"><img src="img/login_img.png"></div>
	<section class="form">
		<form action="index.php" method="POST">
			<div class="input uname">
				<input type="text" id="username" placeholder="Usuario" required name="usuario" />
				<i class="fa fa-user"></i>
			</div>
			<div class="input pass">
				<input type="password" id="password" placeholder="Password" required name="password" />
				<i class="fa fa-lock"></i>
			</div>
			<div>
				<input type="submit" id="login" value="Ingresar" name="Ingresar" />
			</div>
		</form>
	</section>
</div>
<?php
	include_once('php/PhpLogin.php');
	function loginAdmin()
	{
		if ((isset($_POST['usuario'])) && (isset($_POST['password']))) {
			$obj = new Login();
			$obj->setUsuario(addslashes($_POST['usuario']));
			$obj->setPassword(addslashes($_POST['password']));
			$resultado=$obj->loginAdmin();
			$resultado2=$obj->loginProfesor();
			$resultado3=$obj->loginEstudiante();
			if ($reg=mysqli_fetch_assoc($resultado)) { /*$reg=mysqli_fetch_array*/
				header('location: interfaz/interfazAdmin.php');
				$cod_admin=$reg['id_admin'];
				$nick_admin=$reg['usuario_admin'];
				$_SESSION['cod_admin'] = $cod_admin;
				$_SESSION['nick_admin'] = $nick_admin;
				$_SESSION['loggedin_admin'] = true; /*VALIDACION SI REALIZO LA SESSION*/
			}

			else if ($reg=mysqli_fetch_assoc($resultado2)) { /*$reg=mysqli_fetch_array*/
				header('location: interfaz/interfazDocente.php');
				$cod_profesor=$reg['cod_profesor'];
				$nick_profesor=$reg['nick_profesor'];
				$nombre_profesor=$reg['nombre_profesor'];
				$_SESSION['cod_profesor'] = $cod_profesor;
				$_SESSION['nick_profesor'] = $nick_profesor;
				$_SESSION['nombre_profesor'] = $nombre_profesor;
				$_SESSION['loggedin_profesor'] = true; /*VALIDACION SI REALIZO LA SESSION*/
				

			}

			else if ($reg=mysqli_fetch_assoc($resultado3)) { /*$reg=mysqli_fetch_array*/
				header('location: interfaz/interfazEstudiante.php');
				$cod_estudiante=$reg['cod_estudiante'];
				$nick_estudiante=$reg['nick_estudiante'];
				$nombre_estudiante=$reg['nombre_estudiante'];
				$_SESSION['cod_estudiante'] = $cod_estudiante;
				$_SESSION['nick_estudiante'] = $nick_estudiante;
				$_SESSION['nombre_estudiante']=$nombre_estudiante;
				$_SESSION['loggedin_estudiante'] = true; /*VALIDACION SI REALIZO LA SESSION*/
			}

			else
			{
				echo '<script>
					alert ("Usuario No Registrado.....!!!");
					</script>';
			}
			
		}
		else
		{
			echo "Datos Vacios Insertar Por Favor....!!!";
		}
	}
	if (isset($_POST['Ingresar'])) {
	 	loginAdmin();
	 } 
?>
</body>
</html>
<?php
	session_start();
	$_SESSION['cod_estudiante'];
	$_SESSION['nick_estudiante'];
	$_SESSION['nombre_estudiante'];
	$_SESSION['loggedin_estudiante'] = true;

	if (isset($_SESSION['cod_estudiante']) && $_SESSION['loggedin_estudiante'] == true) 
	{

	} 
	else 
	{
   	echo "Esta pagina es solo para usuarios registrados.<br>";
   	echo "<br><a href='../index.php'>Login</a>";
	exit;
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Sistema De Asistencia Estudiantil</title>
<link rel="stylesheet" type="text/css" href="../css/normalize.css" />
<link rel="stylesheet" type="text/css" href="../css/demo.css" />
<link rel="stylesheet" type="text/css" href="../css/icons.css" />
<link rel="stylesheet" type="text/css" href="../css/component.css" />
<script src="../js/modernizr.custom.js"></script>
</head>
<body>
		<div class="containerMenu">
			<!-- Push Wrapper -->
			<div class="mp-pusher" id="mp-pusher">

				<!-- mp-menu -->
				<nav id="mp-menu" class="mp-menu">
					<div class="mp-level">
						<h2 class="icon icon-data">Administrador</h2>
						<ul>
							<li><a class="icon icon-pen" href="consultaExamenEstudiante.php">Examenes</a></li>
							<li><a class="icon icon-pen" href="consultaNotaEstudiante.php">Mis Notas</a></li>
						</ul>	
					</div>
				</nav>
				<!-- /mp-menu -->

				<div class="scroller"><!-- this is for emulating position fixed of the nav -->
					<div class="scroller-inner">
						<!-- Top Navigation -->
						<div class="codrops-top clearfix">
							<a class="codrops-icon codrops-icon-prev" href=""><span>BIENVENID@ <?php echo $_SESSION['nombre_estudiante']; ?></span></a>
							<span class="right"><a class="codrops-icon codrops-icon-drop" href="LogoutEstudiante.php"><span>SALIR</span></a></span>
						</div>
						<header class="codrops-header">
							<h1>Sistema De Asistencia Estudiantil<span>Universidad Autonoma Gabriel Rene Moreno</span></h1>
						</header>
						<div class="content clearfix">
							<div class="block block-40 clearfix">
								<p><a href="" id="trigger" class="menu-trigger"></a></p>
							</div>
						</div>
					</div><!-- /scroller-inner -->
				</div><!-- /scroller -->

			</div><!-- /pusher -->
		</div><!-- /container -->
<!--CONTENIDO-->


<!--CONTENIDO-->
<script src="../js/classie.js"></script>
<script src="../js/mlpushmenu.js"></script>
<script>
new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
</script>
</body>
</html>
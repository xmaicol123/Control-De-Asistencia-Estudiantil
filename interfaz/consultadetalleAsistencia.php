<?php
session_start();

		$_SESSION['nick_profesor'];
		$_SESSION['cod_profesor'];
		$_SESSION['nombre_profesor'];
		$_SESSION['loggedin_profesor'] = true;

	if (isset($_SESSION['cod_profesor']) && $_SESSION['loggedin_profesor'] == true) 
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
<link rel="stylesheet" type="text/css" href="../css/formAsistencia.css">
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
							<!--PREGUNTAS-->
							<li><a class="icon icon-pen" href="consultaMateriaDocente.php">Mis Materias</a></li>
							<!--reporte-->
							<li><a class="icon icon-note" href="reporteDocente.php">Reportes</a></li>	
						</ul>	
					</div>
				</nav>
				<!-- /mp-menu -->

				<div class="scroller"><!-- this is for emulating position fixed of the nav -->
					<div class="scroller-inner">
						<!-- Top Navigation -->
						<div class="codrops-top clearfix">
							<a class="codrops-icon codrops-icon-prev" href=""><span>BIENVENID@ <?php echo $_SESSION['nombre_profesor']; ?></span></a>
							<span class="right"><a class="codrops-icon codrops-icon-drop" href="LogoutProfesor.php"><span>SALIR</span></a></span>
						</div>
						<header class="codrops-header">
							<h1>Sistema De Asistencia Estudiantil<span>Universidad Autonoma Gabriel Rene Moreno</span></h1>
						</header>
						<!--CONTENIDO-->
						<center>
						<?php
						if ($_GET['setCodGrupo'] && $_GET['setFecha']) {
							
						?>
						<section>
							<form action="regAsistencia.php" method="POST">
								<table class="Asistencia">
									<input type="date" name="txt_fecha" class="fechaAsistencia" required="" value="<?php echo $_GET['setFecha'] ?>">
									<thead>
										<tr>
											<th>Nº</th>
											<th>Nombre Estudiante</th>
											<th>Asistencia</th>
											<th>Falta</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										include_once('../php/PhpregAsistencia.php');
										?>
										<?php
										$grupo=base64_decode($_GET['setCodGrupo']);
										$fecha=$_GET['setFecha'];
										$obj=new Asistencia();
										$reg=$obj->consultaParaModificar($grupo,$fecha);     
										while ($row = mysqli_fetch_object($reg))
										{
										?>
										<tr>
											<td><?php echo $row->cod_estudiante ?></td>
											<input type="text" name="txt_grupo" value="<?php echo $row->cod_grupo ?>" hidden="">
											<td><?php echo $row->nombre_estudiante ?></td>
											<td><?php if($row->asistencia=="Asistencia") echo "<img src='../img/Asistio.png' width='50' height='50'>"; else ?> </td>
											<td><?php if($row->asistencia=="Falta") echo "<img src='../img/Falta.png' width='50' height='50'>";  else ?> </td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</form>
						</section>
						<?php
						}
						else
						{
						?>
						<section>
							<form action="regAsistencia.php" method="POST">
								<table class="Asistencia">
									<input type="date" name="txt_fecha" class="fechaAsistencia" required="">
									<thead>
										<tr>
											<th>Nº</th>
											<th>Nombre Estudiante</th>
											<th>Asistencia</th>
											<th>Falta</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										include_once('../php/PhpregGrupo.php');
										?>
										<?php
										$grupo=base64_decode($_GET['setCodGrupo']);
										$obj=new Grupo();
										$reg=$obj->consultaGrupoReporteEstudiante($grupo);     
										while ($row = mysqli_fetch_object($reg))
										{
										?>
										<tr>
											<td><?php echo $row->cod_estudiante ?></td>
											<input type="text" name="txt_grupo" value="<?php echo $row->cod_grupo ?>" hidden="">
											<td><?php echo $row->nombre_estudiante ?></td>
											<td><input type="radio" name="<?php echo $row->cod_estudiante ?>" id="radios" value="Asistencia" required=""></td>
											<td><input type="radio" name="<?php echo $row->cod_estudiante ?>" id="radios" value="Falta" required=""></td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
								<input type="submit" name="Registrar" value="Registrar" class="btnA">
							</form>
						</section>
						<?php
						}
						?>
						</center>
						<!--CONTENIDO-->
						<!--CODIGO PHP-->
						<?php
						function guardar()
						{
							include_once('../php/PhpregGrupo.php');
							$obj = new Grupo();
							$resultado=$obj->consultaGrupoReporteEstudiante($_POST['txt_grupo']);
							foreach ($resultado as $row) {
								$cod_estudiante = $row['cod_estudiante'];
								include_once('../php/PhpregAsistencia.php');
								$obj = new Asistencia();
								$obj->setCodGrupo($_POST['txt_grupo']);
								$obj->setCodEstudiante($cod_estudiante);
								$obj->setAsistencia($_POST[$cod_estudiante]);
								$obj->setFecha($_POST['txt_fecha']);
								/*Validacion de Registro de Grupo*/
								$validado = new Asistencia();
								$resultado=$validado->validacionAsistencia($_POST['txt_grupo'],$_POST['txt_fecha']);
								if (mysqli_num_rows($resultado) > 0) 
								{
									echo '<script>
									alert ("Esta Fecha Ya Esta Registrada.....!!");
									window.history.go(-1);
									</script>';
								exit;
								}
								else
								{
								include_once('../php/PhpregGrupo.php');
								$obj = new Grupo();
								$resultado=$obj->consultaGrupoReporteEstudiante($_POST['txt_grupo']);
								foreach ($resultado as $row) 
								{
								$cod_estudiante = $row['cod_estudiante'];
								include_once('../php/PhpregAsistencia.php');
								$obj = new Asistencia();
								$obj->setCodGrupo($_POST['txt_grupo']);
								$obj->setCodEstudiante($cod_estudiante);
								$obj->setAsistencia($_POST[$cod_estudiante]);
								$obj->setFecha($_POST['txt_fecha']);
								$obj->guardar();
									echo '<script>
									alert ("Registrado Exitosamente...!!");
									window.history.go(-1);
									</script>';
								}	
								}
								exit;
							}

						}

						function modificar()
						{
							include_once('../php/PhpregAsistencia.php');
							$obj = new Asistencia();
							$resultado=$obj->consultaParaModificar($_POST['txt_grupo'],$_POST['txt_fecha']);
							foreach ($resultado as $row) 
							{
							$cod_estudiante = $row['cod_estudiante'];
							$cod_asistencia = $row['cod_asistencia'];
							

							$obj->setCodAsistencia($cod_asistencia);
							$obj->setCodGrupo($_POST['txt_grupo']);
							$obj->setCodEstudiante($cod_estudiante);
							$obj->setAsistencia($_POST[$cod_estudiante]);
							$obj->setFecha($_POST['txt_fecha']);
								if ($obj->modificar()) 
								{
									echo '<script>
									alert ("Modificado Exitosamente...!!");
									window.history.go(-1);
									</script>';
								}	
								else
								{
									echo '<script>
									alert ("Error Al Modificar...!!");
									window.history.go(-1);
									</script>';
									exit;
								}
							
							}		
						}
						

						if (isset($_POST['Registrar'])) {
							guardar();
						}

						if (isset($_POST['Modificar'])) {
							modificar();
						}
						?>
						<!--CODIGO PHP-->
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
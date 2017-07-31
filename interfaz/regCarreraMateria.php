<?php
	session_start();
	$_SESSION['nick_admin'];
	$_SESSION['cod_admin'];
	$_SESSION['loggedin_admin'] = true;

	if (isset($_SESSION['cod_admin']) && $_SESSION['loggedin_admin'] == true) 
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
<link rel="stylesheet" type="text/css" href="../css/estilos.css">
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
							<!--CARRERAS-->
							<li class="icon icon-arrow-left">
								<a class="icon icon-study" href="#">Carreras</a>
								<div class="mp-level">
									<h2 >Carreras</h2>
									<a class="mp-back" href="#">Atras</a>
									<ul>
										<li>
											<a href="regCarrera.php">Registrar Carrera</a>
										</li>
										<li>
											<a href="consultaCarrera.php">Consultar Carreras</a>
										</li>
										<li>
											<a href="regCarreraMateria.php">Asignar Carrera-Materia</a>
										</li>
										<li>
											<a href="consultaCarreraMateria.php">Consultar Por Semestre</a>
										</li>
									</ul>
								</div>
							</li>
							<!--MATERIAS-->
							<li class="icon icon-arrow-left">
								<a class="icon icon-note" href="#">Materias</a>
								<div class="mp-level">
									<h2 class="icon icon-display">Materias</h2>
									<a class="mp-back" href="#">Atras</a>
									<ul>
										<li>
											<a href="regMateria.php">Registrar Materia</a>
										</li>
										<li>
											<a href="consultaMateria.php">Consultar Materias</a>
										</li>
										<li>
											<a href="regGrupo.php">Registrar Grupo</a>
										</li>
										<li>
											<a href="consultaGrupo.php">Consultar Grupos</a>
										</li>
									</ul>
								</div>
							</li>
							<!--DOCENTES-->
							<li class="icon icon-arrow-left">
								<a class="icon icon-user" href="#">Docentes</a>
								<div class="mp-level">
									<h2 class="icon icon-display">Docentes</h2>
									<a class="mp-back" href="#">Atras</a>
									<ul>
										<li>
											<a href="regDocente.php">Registrar Docentes</a>
										</li>
										<li>
											<a href="consultaDocente.php">Consultar Docentes</a>
										</li>
									</ul>
								</div>
							</li>
							<!--ESTUDIANTES-->
							<li class="icon icon-arrow-left">
								<a class="icon icon-user" href="#">Estudiantes</a>
								<div class="mp-level">
									<h2 class="icon icon-display">Estudiantes</h2>
									<a class="mp-back" href="#">Atras</a>
									<ul>
										<li>
											<a href="regEstudiante.php">Registrar Estudiante</a>
										</li>
										<li>
											<a href="consultaEstudiante.php">Consultar Estudiantes</a>
										</li>
										<li>
											<a href="regEstudianteGrupo.php">Asignar Grupo</a>
										</li>
										<li>
											<a href="consultaEstudianteGrupo.php">Consultar Por Grupos</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>	
					</div>
				</nav>
				<!-- /mp-menu -->

				<div class="scroller"><!-- this is for emulating position fixed of the nav -->
					<div class="scroller-inner">
						<!-- Top Navigation -->
						<div class="codrops-top clearfix">
							<a class="codrops-icon codrops-icon-prev" href=""><span>BIENVENID@ <?php echo $_SESSION['nick_admin']; ?></span></a>
							<span class="right"><a class="codrops-icon codrops-icon-drop" href="LogoutAdmin.php"><span>SALIR</span></a></span>
						</div>
						<header class="codrops-header">
							<h1>Sistema De Asistencia Estudiantil<span>Universidad Autonoma Gabriel Rene Moreno</span></h1>
						</header>
						<!--CONTENIDO-->
						<?php
						if ($_GET['setCodCarreraMateria']) {

						?>
						<section>
							<div class="centrado">
								<form method="POST" action="regCarreraMateria.php" class="formCarrera">
									<h3 class="titulo"><strong>Asignar Carrera a Materia</strong></h3>
									<div class="contenedor">
										<!--ESTE CODIGO PHP ES PARA LA CARRERA-->

										<?php 
										include_once('../php/PhpregCarrera.php');
										?>
										<?php
										$obj=new Carrera();
										$reg=$obj->buscar();
										?>
										<h3 class='textSelect'>Asignar Carrera</h3>     
										<select name='txt_carrera' class='optionBD'/>
										<option value='0'>Seleccionar Carrera</option>
										<?php
										while ($row = mysqli_fetch_object($reg))
										{?>
										<option <?php if($_GET['setCodCarrera']==$row->cod_carrera) echo "selected";  else ?>  value="<?php echo $row->cod_carrera ?>"><?php echo $row->nombre_carrera ?></option>
										<?php
										}
										echo "</select>"; 
										?>

										<!--ESTE CODIGO PHP ES PARA LA CARRERA-->
										<!--ESTE CODIGO PHP ES PARA EL MATERIA-->

										<?php 
										include_once('../php/PhpregMateria.php');
										?>
										<?php
										$obj=new Materia();
										$reg=$obj->buscar();
										?>
										<h3 class='textSelect'>Materias Registradas</h3>     
										<select name='txt_materia' class='optionBD'/>
										<option value='0'>Seleccionar Materia</option>
										<?php
										while ($row = mysqli_fetch_object($reg))
										{?>
										<option <?php if($_GET['setCodMateria']==$row->cod_materia) echo "selected";  else ?>  value="<?php echo $row->cod_materia ?>"><?php echo $row->nombre_materia?></option>
										<?php
										}
										echo $html;
										echo "</select>"; 
										?>

										<!--ESTE CODIGO PHP ES PARA EL MATERIA-->
										<input type="text" name="cod_carrera_materia" value="<?php echo $_GET['setCodCarreraMateria'] ?>" hidden="">
										<h4 class="textSelect"><strong>Semestre-Año</strong></h4>
										<input type="text" name="txt_semestre" placeholder="Semestre-Año" class="input-100" value="<?php echo $_GET['setSemestre'] ?>">
										<input type="submit" name="Nuevo" value="Nuevo" class="btn">
										<input type="submit" name="Modificar" value="Modificar" class="btn">
										<input type="submit" name="Eliminar" value="Eliminar" class="btn">

									</div>
								</form>
							</div>
						</section>
						<?php
						}
						else
						{
						?>
						<section>
							<div class="centrado">
								<form method="POST" action="regCarreraMateria.php" class="formCarrera">
									<h3 class="titulo"><strong>Asignar Carrera a Materia</strong></h3>
									<div class="contenedor">
										<!--ESTE CODIGO PHP ES PARA LA CARRERA-->

										<?php 
										include_once('../php/PhpregCarrera.php');
										?>
										<?php
										$obj=new Carrera();
										$reg=$obj->buscar();
										?>
										<h3 class='textSelect'>Asignar Carrera</h3>     
										<select name='txt_carrera' class='optionBD'/>
										<option value='0'>Seleccionar Carrera</option>
										<?php
										while ($row = mysqli_fetch_object($reg))
										{?>
										<option <?php if($_GET['setCodCarrera']==$row->cod_carrera) echo "selected";  else ?>  value="<?php echo $row->cod_carrera ?>"><?php echo $row->nombre_carrera ?></option>
										<?php
										}
										echo "</select>"; 
										?>

										<!--ESTE CODIGO PHP ES PARA LA CARRERA-->
										<!--ESTE CODIGO PHP ES PARA EL MATERIA-->

										<?php 
										include_once('../php/PhpregMateria.php');
										?>
										<?php
										$obj=new Materia();
										$reg=$obj->buscar();
										?>
										<h3 class='textSelect'>Materias Registradas</h3>     
										<select name='txt_materia' class='optionBD'/>
										<option value='0'>Seleccionar Materia</option>
										<?php
										while ($row = mysqli_fetch_object($reg))
										{?>
										<option <?php if($_GET['setCodMateria']==$row->cod_materia) echo "selected";  else ?>  value="<?php echo $row->cod_materia ?>"><?php echo $row->nombre_materia?></option>
										<?php
										}
										echo $html;
										echo "</select>"; 
										?>

										<!--ESTE CODIGO PHP ES PARA EL MATERIA-->
										<h4 class="textSelect"><strong>Semestre-Año</strong></h4>
										<input type="text" name="txt_semestre" placeholder="Semestre-Año" class="input-100" value="<?php echo $_GET['setSemestre'] ?>">
										<input type="submit" name="Nuevo" value="Nuevo" class="btn">
										<input type="submit" name="Registrar" value="Registrar" class="btn">

									</div>
								</form>
							</div>
						</section>
						<?php
						}
						?>
						<!--CONTENIDO-->
						<!--CODIGO PHP-->
						<?php 
							//incluendo la clase carrera para obtener constructores y metodos
							include_once('../php/PhpregCarreraMateria.php');
							//FUNCION GUARDAR
								function guardar()
								{
									if($_POST['txt_carrera'])
									{
										$obj= new CarreraMateria();
										$obj->setCodCarrera($_POST['txt_carrera']);
										$obj->setCodMateria($_POST['txt_materia']);
										$obj->setSemestre($_POST['txt_semestre']);
										if ($obj->guardar())
											echo '<script>
													alert ("Registrado Exitosamente");
													</script>';
										else
											echo '<script>
													alert ("Error Al Registrar");
													</script>';
									}
									else
											echo '<script>
													alert ("Por Favor Introdusca Datos");
													</script>';
								}

								function eliminar()
								{
									if (isset($_POST['cod_carrera_materia'])) {
										$obj = new CarreraMateria();
										$obj->setCodCarreraMateria($_POST['cod_carrera_materia']);
										if ($obj->eliminar()) {
											echo '<script>
													alert ("Eliminado Exitosamente");
													</script>';
										}
										else
										{
											echo '<script>
												alert ("Error Al Eliminar");
												</script>';
										}
									}
									else
									{
										echo '<script>
												alert ("Datos Vacios");
												</script>';
									}
								}

								function modificar()
								{
									if ($_POST['cod_carrera_materia']) {
										$obj = new CarreraMateria();
										$obj->setCodCarreraMateria($_POST['cod_carrera_materia']);
										$obj->setCodCarrera($_POST['txt_carrera']);
										$obj->setCodMateria($_POST['txt_materia']);
										$obj->setSemestre($_POST['txt_semestre']);
										if ($obj->modificar()) {
											echo '<script>
													alert ("Modificado Exitosamente");
													</script>';
										}
										else
										{
											echo '<script>
													alert ("Error Al Modificar");
													</script>';
										}
									}
									else
									{
										echo '<script>
												alert ("Datos Vacios");
												</script>';
									}
								}
							//FUNCION PARA LOS BOTONES
							if (isset($_POST['Registrar'])) {
								guardar();
							}
							else if (isset($_POST['Nuevo'])) {
								
							}
							else if (isset($_POST['Modificar'])) {
								modificar();
							}
							else if (isset($_POST['Eliminar'])) {
								eliminar();
							}
						?>
						<!--CODIGO PHP-->
						<!--MENU DESPEGABLE-->
						<div class="content clearfix">
							<div class="block block-40 clearfix">
								<p><a href="" id="trigger" class="menu-trigger"></a></p>
							</div>
						</div>
						<!--MENU DESPEGABLE-->
					</div><!-- /scroller-inner -->
				</div><!-- /scroller -->

			</div><!-- /pusher -->
		</div><!-- /container -->

<script src="../js/classie.js"></script>
<script src="../js/mlpushmenu.js"></script>
<script>
new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
</script>
</body>
</html>
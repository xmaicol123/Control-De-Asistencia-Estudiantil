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
<!--SCRIPT PARA EL SELECTOR INDEPENDIENTE-->
<script src="../js/jquery-3.1.1.min.js"></script>
<script language="javascript">
			//para pedir las CARRERAS
			$(document).ready(function(){
				$("#txt_carrera").change(function () {
					//ESTO ES PARA REINICIAR EL TXT DE LA MATERIA
					$('#txt_materia').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					//ESTO ES PARA REINICIAR EL TXT DEL DOCENTE
					$('#txt_semestre').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					//ESTO ES PARA REINICIAR EL TXT DEL DOCENTE
					$('#txt_grupo').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

					$("#txt_carrera option:selected").each(function () {
						cod_carrera = $(this).val();
						$.post("../php/PhpAjaxMateria.php", { cod_carrera: cod_carrera }, function(data){
							$("#txt_materia").html(data);
						});            
					});
				})
			});
			//OBTENIENDO EL VALUE DE DOS VALORES CARRERA Y MATERIA A LA VEZ AJAX SOLUCIONADO
			$(document).ready(function(){
				$("#txt_materia").change(function () {
					$("#txt_materia option:selected").each(function () {
						cod_materia = $(this).val();
						cod_carrera = $(document.getElementById("txt_carrera")).val();
						$.post("../php/PhpAjaxCarreraMateria.php", { cod_materia: cod_materia, cod_carrera: cod_carrera }, function(data){
							$("#txt_semestre").html(data);
						});            
					});
				})
			});
			//OBTENIENDO EL VALUE DE TXT SEMESTRE PARA CONSULTAR LOS GRUPOS
			$(document).ready(function(){
				$("#txt_semestre").change(function () {
					$("#txt_semestre option:selected").each(function () {
						cod_carrera_materia = $(this).val();
						$.post("../php/PhpAjaxGrupo.php", { cod_carrera_materia: cod_carrera_materia}, 
							function(data){
							$("#txt_grupo").html(data);
						});            
					});
				})
			});
</script>
<!--SCRIPT PARA EL SELECTOR INDEPENDIENTE-->
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
						if ($_GET['setCodEstudianteGrupo']) {

						?>
						<section>
							<div class="centrado">
								<form method="POST" action="regEstudianteGrupo.php" class="formCarrera">
									<h3 class="titulo"><strong>Asignar Grupo a Estudiante</strong></h3>
									<div class="contenedor">
										<!--ESTE CODIGO PHP ES PARA EL ESTUDIANTE-->
										<?php 
										include_once('../php/PhpregEstudiante.php');
										?>
										<?php
										$obj=new Estudiante();
										$reg=$obj->buscar();
										?>
										<h3 class='textSelect'>Asignar Estudiante</h3>    
										<select name='txt_estudiante' id='txt_estudiante' class='optionBD'/>
										<option value='0'>Seleccionar Estudiante</option>
										<?php
										while ($row = mysqli_fetch_object($reg))
										{?>
											<option <?php if($_GET['setCodEstudiante']==$row->cod_estudiante) echo "selected";  else ?> value="<?php echo $row->cod_estudiante ?>"><?php echo $row->nombre_estudiante ?></option>
										<?php
										}
										echo "</select>";

										?>
										<!--ESTE CODIGO PHP ES PARA EL ESTUDIANTE-->

										<!--ESTE CODIGO PHP ES PARA EL CARRERA-->
										<?php 
										include_once('../php/PhpregCarrera.php');
										?>
										<?php
										$obj=new Carrera();
										$reg=$obj->buscar();
										?>
										<h3 class='textSelect'>Seleccionar Carrera</h3>     
										<select name='txt_carrera' id='txt_carrera' class='optionBD'/>
										<option value='0'>Seleccionar Carrera</option>
										<?php
										while ($row = mysqli_fetch_object($reg))
										{?>
											<option value="<?php echo $row->cod_carrera ?>"><?php echo $row->nombre_carrera ?></option>
										<?php
										}
										echo $html;
										echo "</select>";

										?>
										<!--ESTE CODIGO PHP ES PARA EL CARRERA-->
										<!--CARRERA SELECT MATERIA-->
										<h3 class='textSelect'>Seleccionar Materia</h3>
										<select name="txt_materia" id="txt_materia" class="optionBD"></select>
										<!--CARRERA SELECT MATERIA-->
										<!--CARRERA SELECT SEMESTRE-->
										<h3 class='textSelect'>Seleccionar Semestre</h3>
										<select name="txt_semestre" id="txt_semestre" class="optionBD"></select>
										<!--CARRERA SELECT SEMESTRE-->
										<!--CARRERA SELECT GRUPO-->
										<h3 class='textSelect'>Seleccionar Grupo</h3>
										<select name="txt_grupo" id="txt_grupo" class="optionBD"></select>
										<!--CARRERA SELECT GRUPO-->

										<input type="date" name="txt_fecha_inscripcion" placeholder="Fecha Inscripcion" class="input-100" value="<?php echo $_GET['setFecha'] ?>">
										<input type="text" name="txt_cod" value="<?php echo $_GET['setCodEstudianteGrupo'] ?>" hidden="">
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
								<form method="POST" action="regEstudianteGrupo.php" class="formCarrera">
									<h3 class="titulo"><strong>Asignar Grupo a Estudiante</strong></h3>
									<div class="contenedor">
										<!--ESTE CODIGO PHP ES PARA EL ESTUDIANTE-->
										<?php 
										include_once('../php/PhpregEstudiante.php');
										?>
										<?php
										$obj=new Estudiante();
										$reg=$obj->buscar();
										?>
										<h3 class='textSelect'>Asignar Estudiante</h3>    
										<select name='txt_estudiante' id='txt_estudiante' class='optionBD'/>
										<option value='0'>Seleccionar Estudiante</option>
										<?php
										while ($row = mysqli_fetch_object($reg))
										{?>
											<option <?php if($_GET['setCodEstudiante']==$row->cod_estudiante) echo "selected";  else ?> value="<?php echo $row->cod_estudiante ?>"><?php echo $row->nombre_estudiante ?></option>
										<?php
										}
										echo "</select>";

										?>
										<!--ESTE CODIGO PHP ES PARA EL ESTUDIANTE-->

										<!--ESTE CODIGO PHP ES PARA EL CARRERA-->
										<?php 
										include_once('../php/PhpregCarrera.php');
										?>
										<?php
										$obj=new Carrera();
										$reg=$obj->buscar();
										?>
										<h3 class='textSelect'>Seleccionar Carrera</h3>     
										<select name='txt_carrera' id='txt_carrera' class='optionBD'/>
										<option value='0'>Seleccionar Carrera</option>
										<?php
										while ($row = mysqli_fetch_object($reg))
										{?>
											<option value="<?php echo $row->cod_carrera ?>"><?php echo $row->nombre_carrera ?></option>
										<?php
										}
										echo $html;
										echo "</select>";

										?>
										<!--ESTE CODIGO PHP ES PARA EL CARRERA-->
										<!--CARRERA SELECT MATERIA-->
										<h3 class='textSelect'>Seleccionar Materia</h3>
										<select name="txt_materia" id="txt_materia" class="optionBD"></select>
										<!--CARRERA SELECT MATERIA-->
										<!--CARRERA SELECT SEMESTRE-->
										<h3 class='textSelect'>Seleccionar Semestre</h3>
										<select name="txt_semestre" id="txt_semestre" class="optionBD"></select>
										<!--CARRERA SELECT SEMESTRE-->
										<!--CARRERA SELECT GRUPO-->
										<h3 class='textSelect'>Seleccionar Grupo</h3>
										<select name="txt_grupo" id="txt_grupo" class="optionBD"></select>
										<!--CARRERA SELECT GRUPO-->

										<input type="date" name="txt_fecha_inscripcion" placeholder="Fecha Inscripcion" class="input-100">
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
							include_once('../php/PhpregEstudianteGrupo.php');
							//FUNCION GUARDAR
								function guardar()
								{
									if($_POST['txt_fecha_inscripcion'])
									{
										$obj= new EstudianteGrupo();
										$obj->setCodEstudiante($_POST['txt_estudiante']);
										$obj->setCodGrupo($_POST['txt_grupo']);
										$obj->setFechaInscripcion($_POST['txt_fecha_inscripcion']);
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

								function modificar()
								{
									if ($_POST['txt_cod']) {
										$obj = new EstudianteGrupo();
										$obj->setCodEstudianteGrupo($_POST['txt_cod']);
										$obj->setCodEstudiante($_POST['txt_estudiante']);
										$obj->setCodGrupo($_POST['txt_grupo']);
										$obj->setFechaInscripcion($_POST['txt_fecha_inscripcion']);
										if ($obj->modificar()) {
											echo '<script>
													alert ("Modificado Exitosamente");
													</script>';
										}
										else
										{
											echo '<script>
													alert ("Error al Modificar");
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

								function eliminar()
								{
									if ($_POST['txt_cod']) {
										$obj = new EstudianteGrupo();
										$obj->setCodEstudianteGrupo($_POST['txt_cod']);
										if ($obj->eliminar()) {
											echo '<script>
													alert ("Eliminado Exitosamente");
													</script>';
										}
										else
										{
											echo '<script>
													alert ("Error al Eliminar");
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
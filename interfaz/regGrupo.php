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
						if ($_GET['setCodGrupo']) {

						?>
						<section>
							<div class="centrado">
								<form method="POST" action="regGrupo.php" class="formCarrera">
									<h3 class="titulo"><strong>Registrar Grupo</strong></h3>
									<div class="contenedor">
										<!--ESTE CODIGO PHP ES PARA LA CARRERA-->

										<?php 
										include_once('../php/PhpregCarrera.php');
										?>
										<?php
										$obj=new Carrera();
										$reg=$obj->buscar();
										echo "<h3 class='textSelect'>Asignar Carrera</h3>";     
										echo "<select name='txt_carrera' id='txt_carrera' class='optionBD'/>";
										$html= "<option value='0'>Seleccionar Carrera</option>";
										while ($row = $reg->fetch_assoc())
										{
											$html.= "<option value='".$row['cod_carrera']."'>".$row['nombre_carrera']."</option>";
										}
										echo $html;
										echo "</select>"; 
										?>

										<!--ESTE CODIGO PHP ES PARA LA CARRERA-->
										<!--ESTE CODIGO AJAX-->
										<h3 class='textSelect'>Seleccionar Materia</h3>
										<select name="txt_materia" id="txt_materia" class="optionBD"></select>

										<h3 class='textSelect'>Seleccionar Semestre</h3>
										<select name="txt_semestre" id="txt_semestre" class="optionBD"></select>
										<!--ESTE CODIGO AJAZ-->
										<!--ESTE CODIGO PHP ES PARA PROFESOR-->

										<?php 
										include_once('../php/PhpregDocente.php');
										?>
										<?php
										$obj=new Docente();
										$reg=$obj->buscar();
										echo "<h3 class='textSelect'>Asignar Docente</h3>";     
										echo "<select name='txt_docente' id='txt_docente' class='optionBD'/>";
										$html= "<option value='0'>Seleccionar Docente</option>";
										while ($row = $reg->fetch_assoc())
										{
											$html.= "<option value='".$row['cod_profesor']."'>".$row['nombre_profesor']."</option>";
										}
										echo $html;
										echo "</select>"; 
										?>

										<!--ESTE CODIGO PHP ES PARA LA PROFESOR-->
										<!--CHANCHULLA-->
										<input type="text" name="cod_grupo" value="<?php echo $_GET['setCodGrupo'] ?>" hidden="">
										<!--CHANCHULLA-->
										<input type="text" name="txt_nombre" class="input-100" placeholder="Nombre De Grupo" value="<?php echo $_GET['setNombre'] ?>">
										<input type="text" name="txt_aula" class="input-100" placeholder="Nro De Aula" value="<?php echo $_GET['setAula'] ?>">
										<h4 class="textSelect"><strong>Seleccionar Dia</strong></h4>
										<select name="txt_dia" class="optionBD">
											<option style="background: skyblue;"><?php echo $_GET['setDia']; ?></option>
											<option>Lunes</option>
											<option>Martes</option>
											<option>Miercoles</option>
											<option>Jueves</option>
											<option>Viernes</option>
											<option>Sabado</option>
										</select>
										<input type="time" name="txt_inicio" class="input-100" placeholder="Hora Inicio" value="<?php echo $_GET['setHoraInicio'] ?>">
										<input type="time" name="txt_salida" class="input-100" placeholder="Hora de Salida" value="<?php echo $_GET['setHoraSalida'] ?>">
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
								<form method="POST" action="regGrupo.php" class="formCarrera">
									<h3 class="titulo"><strong>Registrar Grupo</strong></h3>
									<div class="contenedor">
										<!--ESTE CODIGO PHP ES PARA LA CARRERA-->

										<?php 
										include_once('../php/PhpregCarrera.php');
										?>
										<?php
										$obj=new Carrera();
										$reg=$obj->buscar();
										echo "<h3 class='textSelect'>Asignar Carrera</h3>";     
										echo "<select name='txt_carrera' id='txt_carrera' class='optionBD'/>";
										$html= "<option value='0'>Seleccionar Carrera</option>";
										while ($row = $reg->fetch_assoc())
										{
											$html.= "<option value='".$row['cod_carrera']."'>".$row['nombre_carrera']."</option>";
										}
										echo $html;
										echo "</select>"; 
										?>

										<!--ESTE CODIGO PHP ES PARA LA CARRERA-->
										<!--ESTE CODIGO AJAX-->
										<h3 class='textSelect'>Seleccionar Materia</h3>
										<select name="txt_materia" id="txt_materia" class="optionBD"></select>

										<h3 class='textSelect'>Seleccionar Semestre</h3>
										<select name="txt_semestre" id="txt_semestre" class="optionBD"></select>
										<!--ESTE CODIGO AJAZ-->
										<!--ESTE CODIGO PHP ES PARA PROFESOR-->

										<?php 
										include_once('../php/PhpregDocente.php');
										?>
										<?php
										$obj=new Docente();
										$reg=$obj->buscar();
										echo "<h3 class='textSelect'>Asignar Docente</h3>";     
										echo "<select name='txt_docente' id='txt_docente' class='optionBD'/>";
										$html= "<option value='0'>Seleccionar Docente</option>";
										while ($row = $reg->fetch_assoc())
										{
											$html.= "<option value='".$row['cod_profesor']."'>".$row['nombre_profesor']."</option>";
										}
										echo $html;
										echo "</select>"; 
										?>

										<!--ESTE CODIGO PHP ES PARA LA PROFESOR-->

										<input type="text" name="txt_nombre" class="input-100" placeholder="Nombre De Grupo">
										<input type="text" name="txt_aula" class="input-100" placeholder="Nro De Aula">
										<h4 class="textSelect"><strong>Seleccionar Dia</strong></h4>
										<select name="txt_dia" class="optionBD">
											<option>Lunes</option>
											<option>Martes</option>
											<option>Miercoles</option>
											<option>Jueves</option>
											<option>Viernes</option>
											<option>Sabado</option>
										</select>
										<input type="time" name="txt_inicio" class="input-100" placeholder="Hora Inicio">
										<input type="time" name="txt_salida" class="input-100" placeholder="Hora de Salida">
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
							include_once('../php/PhpregGrupo.php');
							//FUNCION GUARDAR
								function guardar()
								{
									if(($_POST['txt_nombre'])&&(isset($_POST['txt_semestre']))&&(isset($_POST['txt_docente'])))
									{
										$obj= new Grupo();
										$obj->setCodCarreraMateria($_POST['txt_semestre']);
										$obj->setCodProfesor($_POST['txt_docente']);
										$obj->setNombre($_POST['txt_nombre']);
										$obj->setAula($_POST['txt_aula']);
										$obj->setDia($_POST['txt_dia']);
										$obj->setHoraInicio($_POST['txt_inicio']);
										$obj->setHoraSalida($_POST['txt_salida']);

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
									if(($_POST['cod_grupo'])&&(isset($_POST['txt_semestre']))&&(isset($_POST['txt_docente']))) {
										$obj = new Grupo();
										$obj->setCodGrupo($_POST['cod_grupo']);
										$obj->setCodCarreraMateria($_POST['txt_semestre']);
										$obj->setCodProfesor($_POST['txt_docente']);
										$obj->setNombre($_POST['txt_nombre']);
										$obj->setAula($_POST['txt_aula']);
										$obj->setDia($_POST['txt_dia']);
										$obj->setHoraInicio($_POST['txt_inicio']);
										$obj->setHoraSalida($_POST['txt_salida']);
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

								function eliminar()
								{
									if ($_POST['cod_grupo']) {
										$obj = new Grupo();
										$obj->setCodGrupo($_POST['cod_grupo']);
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
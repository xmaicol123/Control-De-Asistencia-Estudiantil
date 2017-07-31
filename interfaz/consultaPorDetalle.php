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
<script src="../js/jquery-1.10.2.min.js"></script>
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
						<section>
						<button id="exportButton" class="btn btn-lg btn-danger clearfix"><span class="fa fa-file-excel-o"></span> Export to Excel</button>
								<table class="Asistencia" id="Asistencia">
									<thead>
										<tr>
											<th>Numero</th>
											<th>Estudiante</th>
											<th>Asistencia</th>
											<th>Fecha</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										include_once('../php/PhpregAsistencia.php');
										?>
										<?php
										$grupo=base64_decode($_GET['setCodGrupo']);
										$obj=new Asistencia();
										$reg=$obj->porDetalle($grupo);
										$reg2=$obj->ultimoRegistro($grupo);
										while ($row = mysqli_fetch_array($reg))
										{
										?>
										<tr>
											<td><?php echo $row['cod_estudiante'] ?></td>
											<td><?php echo $row['nombre_estudiante'] ?></td>
											<td><?php echo $row['asistencia'] ?></td>
											<td><?php echo $row['fecha'] ?></td>
										</tr>


										<?php
										while ($row2 = mysqli_fetch_array($reg2)) 
										{
											$valor=$row2['cod_estudiante'];
										}
										if ($valor==$row['cod_estudiante']) {
											echo "<tr><td>*</td><td>*</td><td>*</td><td>*</td></tr>";
										}
										else
										{

										}

										/*CONTADORES DE ASISTENCIAS*/
										if ($row['asistencia']=="Asistencia") {
											$asistencia +=1;
										}
										else if ($row['asistencia']=="Falta") {
											$falta +=1;
										}
										/*CONTADORES DE ASISTENCIAS*/

										?>
										<?php
										}
										$total = $asistencia + $falta;
										$porcentaje_asistencia = ($asistencia/$total)*100;
										$porcentaje_faltas = ($falta/$total)*100;
										echo "<h3>Total Asistencias: " . $asistencia . " </br>Porcentaje: " . $porcentaje_asistencia . "%</h3>";
										echo "<h3>Total Faltas: " . $falta . " </br>Porcentaje: " . $porcentaje_faltas . "%</h3>";
										?>
									</tbody>
								</table>
						</section>
						</center>
<!--REPORTES CON PDF-->
<link rel="stylesheet" type="text/css" href="../reportExel/all.min.css" />
<script type="text/javascript" src="../reportExel/shieldui-all.min.js"></script>
<script type="text/javascript" src="../reportExel/jszip.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
        $("#exportButton").click(function () {
            // parse the HTML table element having an id=exportTable
            var dataSource = shield.DataSource.create({
                data: "#Asistencia",
                schema: {
                    type: "table",
                    fields: {
                        Numero: { type: Number },
                        Estudiante: { type: String },
                        Asistencia: { type: String },
                        Fecha: { type: String }
                    }
                }
            });

            // when parsing is done, export the data to Excel
            dataSource.read().then(function (data) {
                new shield.exp.OOXMLWorkbook({
                    author: "PrepBootstrap",
                    worksheets: [
                        {
                            name: "PrepBootstrap Table",
                            rows: [
                                {
                                    cells: [
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: Number,
                                            value: "Numero"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Estudiante"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Asistencia"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Fecha"
                                        }
                                    ]
                                }
                            ].concat($.map(data, function(item) {
                                return {
                                    cells: [
                                        { type: Number, value: item.Numero },
                                        { type: String, value: item.Estudiante },
                                        { type: String, value: item.Asistencia },
                                        { type: String, value: item.Fecha }
                                    ]
                                };
                            }))
                        }
                    ]
                }).saveAs({
                    fileName: "SisAsistencia"
                });
            });
        });
    });
</script>

<style>
    #exportButton {
        border-radius: 0;
    }
</style>
<!--REPORTES CON PDF-->
						<!--CONTENIDO-->
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
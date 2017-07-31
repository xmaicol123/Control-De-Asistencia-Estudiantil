<?php
include_once('Conection.php');

class PhpAjax extends Conexion
{

	public function materia($cod_carrera_materia)
	{
	$sql = "SELECT cod_grupo,nombre_grupo FROM carrera,materia,carrera_materia,grupo WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia and cod_carrera_materia = cod_carrera_materia_99 and cod_carrera_materia = '$cod_carrera_materia'";
	return parent::ejecutar($sql);
	}



} 

//CONSULTAS

/*-------------CONSULTA PARA CUANTAS CARRERAS TIENE UN ESTUDIANTE------------------------*/
$variable = new PhpAjax();
$reg=$variable->materia($_POST['cod_carrera_materia']);
$html= "<option value='0'>Seleccionar Grupo</option>";
while ($row = $reg->fetch_assoc())
{
	$html.= "<option value='".$row['cod_grupo']."'>".$row['nombre_grupo']."</option>";
	
}
echo $html;
/*-------------CONSULTA PARA CUANTAS CARRERAS TIENE UN ESTUDIANTE------------------------*/
?>
<?php
include_once('Conection.php');

class PhpAjax extends Conexion
{

	public function materia($cod_carrera)
	{
	$sql = "SELECT DISTINCT cod_materia, nombre_materia FROM carrera,carrera_materia,materia WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia and cod_carrera = '$cod_carrera' ";
	return parent::ejecutar($sql);
	}



} 



//CONSULTAS

/*-------------CONSULTA PARA CUANTAS CARRERAS TIENE UN ESTUDIANTE------------------------*/
$variable = new PhpAjax();
$reg=$variable->materia($_POST['cod_carrera']);
$html= "<option value='0'>Seleccionar Materia</option>";
while ($row = $reg->fetch_assoc())
{
	$html.= "<option value='".$row['cod_materia']."'>".$row['nombre_materia']."</option>";
	
}
echo $html;
/*-------------CONSULTA PARA CUANTAS CARRERAS TIENE UN ESTUDIANTE------------------------*/
?>
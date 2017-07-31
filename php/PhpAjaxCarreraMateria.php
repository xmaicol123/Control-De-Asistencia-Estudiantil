<?php
include_once('Conection.php');

class PhpAjax extends Conexion
{

	public function materia($cod_carrera,$cod_materia)
	{
	$sql = "SELECT cod_carrera_materia, semestre FROM carrera,carrera_materia,materia WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia and cod_carrera = '$cod_carrera' and cod_materia = '$cod_materia' ";
	return parent::ejecutar($sql);
	}



} 



//CONSULTAS

/*-------------CONSULTA PARA CUANTAS CARRERAS TIENE UN ESTUDIANTE------------------------*/
$variable = new PhpAjax();
$variable1 = $_POST['cod_carrera'];
$variable2 = $_POST['cod_materia'];
$reg=$variable->materia($variable1,$variable2);
$html= "<option value='0'>Seleccionar Semestre</option>";
while ($row = $reg->fetch_assoc())
{
	$html.= "<option value='".$row['cod_carrera_materia']."'>".$row['semestre']."</option>";
	
}
echo $html;
/*-------------CONSULTA PARA CUANTAS CARRERAS TIENE UN ESTUDIANTE------------------------*/
?>
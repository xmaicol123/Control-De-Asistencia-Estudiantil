<?php
include_once('Conection.php');
class Asistencia extends Conexion
{
	//atributos
	private $cod_asistencia;
	private $cod_grupo;
	private $cod_estudiante;
	private $asistencia;
	private $fecha;

	//construtor
	public function Carrera()
	{   parent::conexion();
		$this->cod_asistencia=0;
		$this->cod_grupo=0;
		$this->cod_estudiante=0;
		$this->asistencia="";
		$this->fecha="";
	}
	//propiedades de acceso
	//CODIGO DE LA CARRERA
	public function setCodAsistencia($valor)
	{
		$this->cod_asistencia=$valor;
	}
	public function getCodAsistencia()
	{
		return $this->cod_asistencia;
	}
	//CODIGO DE LA CARRERA
	public function setCodGrupo($valor)
	{
		$this->cod_grupo=$valor;
	}
	public function getCodGrupo()
	{
		return $this->cod_grupo;
	}
	//CODIGO DE LA CARRERA
	public function setCodEstudiante($valor)
	{
		$this->cod_estudiante=$valor;
	}
	public function getCodEstudiante()
	{
		return $this->cod_estudiante;
	}
	//CODIGO DE LA CARRERA
	public function setAsistencia($valor)
	{
		$this->asistencia=$valor;
	}
	public function getAsistencia()
	{
		return $this->asistencia;
	}
	//CODIGO DE LA CARRERA
	public function setFecha($valor)
	{
		$this->fecha=$valor;
	}
	public function getFecha()
	{
		return $this->fecha;
	}
	
	//metodos para el contructor
	public function guardar()
	{
     $sql="INSERT INTO asistencia (cod_grupo_2587,cod_estudiante_2587,asistencia,fecha) VALUES('$this->cod_grupo','$this->cod_estudiante','$this->asistencia','$this->fecha')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function modificar()
	{
	$sql="UPDATE asistencia SET asistencia='$this->asistencia' WHERE cod_asistencia=$this->cod_asistencia ";		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function buscar()
	{
		$sql="SELECT * FROM asistencia";
		return parent::ejecutar($sql);
	}

	public function consultaReporteAsistencia($cod_profesor)
	{
		$sql="SELECT DISTINCT fecha,nombre_materia,semestre,nombre_grupo,cod_grupo FROM carrera,materia,carrera_materia,grupo,profesor,estudiante,estudiante_grupo,asistencia WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia and cod_carrera_materia = cod_carrera_materia_99 and cod_profesor_99 = cod_profesor and cod_grupo = cod_grupo_546 and cod_estudiante_546 = cod_estudiante and cod_grupo = cod_grupo_2587 and cod_estudiante_2587 = cod_estudiante and cod_profesor='$cod_profesor' ";

		return parent::ejecutar($sql);
	}

	public function validacionAsistencia($cod_grupo,$fecha)
	{
		$sql="SELECT * FROM asistencia WHERE cod_grupo_2587 = '$cod_grupo' AND fecha = '$fecha' ";
		return parent::ejecutar($sql);	
	}

	public function consultaParaModificar($cod_grupo,$fecha)
	{
		$sql="SELECT * FROM estudiante,asistencia,grupo WHERE cod_estudiante = cod_estudiante_2587 AND cod_grupo_2587 = cod_grupo AND cod_grupo_2587='$cod_grupo' AND fecha='$fecha' ";
		return parent::ejecutar($sql);
	}

	public function consultaReporteAsistenciaDetalle($cod_profesor,$cod_grupo)
	{
		$sql="SELECT DISTINCT fecha,nombre_materia,semestre,nombre_grupo,cod_grupo FROM carrera,materia,carrera_materia,grupo,profesor,estudiante,estudiante_grupo,asistencia WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia and cod_carrera_materia = cod_carrera_materia_99 and cod_profesor_99 = cod_profesor and cod_grupo = cod_grupo_546 and cod_estudiante_546 = cod_estudiante and cod_grupo = cod_grupo_2587 and cod_estudiante_2587 = cod_estudiante and cod_profesor='$cod_profesor' AND cod_grupo = '$cod_grupo' ";

		return parent::ejecutar($sql);
	}

	public function porDetalle($cod_grupo)
	{
		$sql="SELECT * FROM estudiante,estudiante_grupo,grupo,asistencia WHERE cod_estudiante = cod_estudiante_546 and cod_grupo_546 = cod_grupo and cod_estudiante = cod_estudiante_2587 and cod_grupo_2587 = cod_grupo and cod_grupo='$cod_grupo' ORDER BY cod_asistencia ; ";
		return parent::ejecutar($sql);
	}

	public function ultimoRegistro($cod_grupo)
	{
		$sql="SELECT * FROM grupo,estudiante_grupo,estudiante WHERE cod_grupo = cod_grupo_546 and cod_estudiante_546 = cod_estudiante and cod_grupo = '$cod_grupo' ORDER BY cod_estudiante_grupo ";
		return parent::ejecutar($sql);
	}

	public function buscarEntreDosFechas($fecha_inicio,$fecha_final,$cod_grupo)
	{
		$sql="SELECT * FROM estudiante,estudiante_grupo,grupo,asistencia WHERE cod_estudiante = cod_estudiante_546 and cod_grupo_546 = cod_grupo and cod_estudiante = cod_estudiante_2587 and cod_grupo_2587 = cod_grupo and cod_grupo='$cod_grupo' AND fecha BETWEEN '$fecha_inicio' AND '$fecha_final' ORDER BY fecha,cod_estudiante_grupo ";
		return parent::ejecutar($sql);
	}

	public function consultarEstudiante($cod_grupo)
	{
		$sql="SELECT * FROM estudiante,estudiante_grupo,grupo WHERE cod_estudiante = cod_estudiante_546 and cod_grupo_546 = cod_grupo and cod_grupo='$cod_grupo' ";
		return parent::ejecutar($sql);
	}

	public function buscarPorEstudiante($cod_estudiante,$cod_grupo)
	{
		$sql="SELECT * FROM estudiante,estudiante_grupo,grupo,asistencia WHERE cod_estudiante = cod_estudiante_546 and cod_grupo_546 = cod_grupo and cod_estudiante = cod_estudiante_2587 and cod_grupo_2587 = cod_grupo and cod_grupo='$cod_grupo' and cod_estudiante = '$cod_estudiante' ";
		return parent::ejecutar($sql);
	}

	public function porAsistencia($cod_grupo)
	{
		$sql="SELECT * FROM estudiante,estudiante_grupo,grupo,asistencia WHERE cod_estudiante = cod_estudiante_546 and cod_grupo_546 = cod_grupo and cod_estudiante = cod_estudiante_2587 and cod_grupo_2587 = cod_grupo and cod_grupo='$cod_grupo' and asistencia = 'Asistencia' ORDER BY cod_asistencia ; ";
		return parent::ejecutar($sql);
	}

	public function porFalta($cod_grupo)
	{
		$sql="SELECT * FROM estudiante,estudiante_grupo,grupo,asistencia WHERE cod_estudiante = cod_estudiante_546 and cod_grupo_546 = cod_grupo and cod_estudiante = cod_estudiante_2587 and cod_grupo_2587 = cod_grupo and cod_grupo='$cod_grupo' and asistencia = 'Falta' ORDER BY cod_asistencia ; ";
		return parent::ejecutar($sql);
	}

}    
?>
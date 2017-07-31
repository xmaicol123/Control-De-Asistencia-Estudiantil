<?php
include_once('Conection.php');
class Grupo extends Conexion
{
	//atributos
	private $cod_grupo;
	private $cod_carrera_materia;
	private $cod_profesor;
	private $nombre_grupo;
	private $aula;
	private $dia;
	private $hora_inicio;
	private $hora_salida;

	//construtor
	public function Grupo()
	{   parent::conexion();
		$this->cod_grupo=0;
		$this->cod_carrera_materia=0;
		$this->cod_profesor=0;
		$this->nombre_grupo="";
		$this->aula="";
		$this->dia="";
		$this->hora_inicio="";	
		$this->hora_salida="";
	}
	//propiedades de acceso
	//CODIGO GRUPO
	public function setCodGrupo($valor)
	{
		$this->cod_grupo=$valor;
	}
	public function getCodGrupo()
	{
		return $this->cod_grupo;
	}
	//CODIGO MATERIA
	public function setCodCarreraMateria($valor)
	{
		$this->cod_carrera_materia=$valor;
	}
	public function getCodCarreraMateria()
	{
		return $this->cod_carrera_materia;
	}
	//CODIGO PROFESOR
	public function setCodProfesor($valor)
	{
		$this->cod_profesor=$valor;
	}
	public function getCodProfesor()
	{
		return $this->cod_profesor;
	}
	//NOMBRE DE GRUPO
	public function setNombre($valor)
	{
		$this->nombre_grupo=$valor;
	}
	public function getNombre()
	{
		return $this->nombre_grupo;
	}
	//AULA
	public function setAula($valor)
	{
		$this->aula=$valor;
	}
	public function getAula()
	{
		return $this->aula;
	}
	//DIA
	public function setDia($valor)
	{
		$this->dia=$valor;
	}
	public function getDia()
	{
		return $this->dia;
	}
	//HORA INICIO
	public function setHoraInicio($valor)
	{
		$this->hora_inicio=$valor;
	}
	public function getHoraInicio()
	{
		return $this->hora_inicio;
	}
	//HORA SALIDA
	public function setHoraSalida($valor)
	{
		$this->hora_salida=$valor;
	}
	public function getHoraSalida()
	{
		return $this->hora_salida;
	}
	
	//metodos para el contructor
	public function guardar()
	{
     $sql="INSERT INTO grupo (cod_carrera_materia_99,cod_profesor_99,nombre_grupo,aula,dia,hora_inicio,hora_salida) VALUES('$this->cod_carrera_materia','$this->cod_profesor','$this->nombre_grupo','$this->aula','$this->dia','$this->hora_inicio','$this->hora_salida')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function modificar()
	{
		$sql="UPDATE grupo SET cod_carrera_materia_99='$this->cod_carrera_materia', cod_profesor_99='$this->cod_profesor', nombre_grupo='$this->nombre_grupo', aula='$this->aula', dia='$this->dia', hora_inicio='$this->hora_inicio', hora_salida='$this->hora_salida' WHERE cod_grupo=$this->cod_grupo";
		if (parent::ejecutar($sql)) {
			return true;
		}
		else
		{
			return false;
		}
	}

	public function eliminar()
	{
		$sql="DELETE FROM grupo WHERE cod_grupo=$this->cod_grupo";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function buscar()
	{
		$sql="SELECT * FROM grupo";
		return parent::ejecutar($sql);
	}

	public function consultaGrupo()
	{
		$sql="SELECT * FROM carrera,materia,carrera_materia,grupo,profesor WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia and cod_carrera_materia = cod_carrera_materia_99 and cod_profesor_99 = cod_profesor";

		return parent::ejecutar($sql);
	}

	public function consultaGrupoReporte($cod_profesor)
	{
		$sql="SELECT DISTINCT * FROM carrera,materia,carrera_materia,grupo,profesor WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia and cod_carrera_materia = cod_carrera_materia_99 and cod_profesor_99 = cod_profesor and cod_profesor='$cod_profesor' ";

		return parent::ejecutar($sql);
	}

	public function consultaGrupoReporteEstudiante($cod_grupo)
	{
		$sql="SELECT * FROM estudiante,estudiante_grupo,grupo WHERE cod_estudiante = cod_estudiante_546 and cod_grupo_546 = cod_grupo and cod_grupo='$cod_grupo'";
		return parent::ejecutar($sql);
	}


}    
?>
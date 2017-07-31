<?php
include_once('Conection.php');
class EstudianteGrupo extends Conexion
{
	//atributos
	private $cod_estudiante_grupo;
	private $cod_estudiante;
	private $cod_grupo;
	private $fecha_inscripcion;

	//construtor
	public function EstudianteGrupo()
	{   parent::conexion();
		$this->cod_estudiante_grupo=0;
		$this->cod_estudiante=0;
		$this->cod_grupo=0;
		$this->fecha_inscripcion=0;	
	}
	//propiedades de acceso
	//CODGO ESTUDINATE GRUPO
	public function setCodEstudianteGrupo($valor)
	{
		$this->cod_estudiante_grupo=$valor;
	}
	public function getCodEstudianteGrupo()
	{
		return $this->cod_estudiante_grupo;
	}
	//CODGO ESTUDIANTE
	public function setCodEstudiante($valor)
	{
		$this->cod_estudiante=$valor;
	}
	public function getCodEstudiante()
	{
		return $this->cod_estudiante;
	}
	//CODIGO DEL GRUPO
	public function setCodGrupo($valor)
	{
		$this->cod_grupo=$valor;
	}
	public function getCodGrupo()
	{
		return $this->cod_grupo;
	}
	//FECHA INSCRIPCION
	public function setFechaInscripcion($valor)
	{
		$this->fecha_inscripcion=$valor;
	}
	public function getFechaInscripcion()
	{
		return $this->fecha_inscripcion;
	}

	//metodos para el contructor
	public function guardar()
	{
     $sql="INSERT INTO estudiante_grupo (cod_estudiante_546,cod_grupo_546,fecha_inscripcion) VALUES('$this->cod_estudiante','$this->cod_grupo','$this->fecha_inscripcion')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function modificar()
	{
		$sql="UPDATE estudiante_grupo SET cod_estudiante_546='$this->cod_estudiante', cod_grupo_546='$this->cod_grupo', fecha_inscripcion='$this->fecha_inscripcion' WHERE cod_estudiante_grupo=$this->cod_estudiante_grupo ";		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function eliminar()
	{
		$sql="DELETE FROM estudiante_grupo WHERE cod_estudiante_grupo=$this->cod_estudiante_grupo";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function buscar()
	{
		$sql="SELECT * FROM estudiante_grupo";
		return parent::ejecutar($sql);
	}

	public function consultaEstudiante()
	{
		$sql="SELECT * FROM carrera,materia,carrera_materia,grupo,profesor,estudiante,estudiante_grupo WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia and cod_carrera_materia = cod_carrera_materia_99 and cod_profesor_99 = cod_profesor and cod_grupo = cod_grupo_546 and cod_estudiante_546 = cod_estudiante";
		return parent::ejecutar($sql);
	}
}    
?>
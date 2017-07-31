<?php
include_once('Conection.php');
class CarreraMateria extends Conexion
{
	//atributos
	private $cod_carrera_materia;
	private $cod_carrera;
	private $cod_materia;
	private $semestre;

	//construtor
	public function CarreraMateria()
	{   parent::conexion();
		$this->cod_carrera_materia=0;
		$this->cod_carrera=0;
		$this->cod_materia=0;
		$this->semestre="";	
	}
	//propiedades de acceso
	//CODIGO DE LA CARRERA PROFESOR
	public function setCodCarreraMateria($valor)
	{
		$this->cod_carrera_materia=$valor;
	}
	public function getCodCarreraMateria()
	{
		return $this->cod_carrera_materia;
	}
	//CODIGO DE LA CARRERA
	public function setCodCarrera($valor)
	{
		$this->cod_carrera=$valor;
	}
	public function getCodCarrera()
	{
		return $this->cod_carrera;
	}
	//CODIGO DEL PROFESOR
	public function setCodMateria($valor)
	{
		$this->cod_materia=$valor;
	}
	public function getCodMateria()
	{
		return $this->cod_materia;
	}
	//SEMESTRE
	public function setSemestre($valor)
	{
		$this->semestre=$valor;
	}
	public function getSemestre()
	{
		return $this->semestre;
	}

	//metodos para el contructor
	public function guardar()
	{
     $sql="INSERT INTO carrera_materia (cod_carrera_1122,cod_materia_1122,semestre) VALUES('$this->cod_carrera','$this->cod_materia','$this->semestre')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function modificar()
	{
		$sql="UPDATE carrera_materia SET cod_carrera_1122='$this->cod_carrera', cod_materia_1122='$this->cod_materia', semestre='$this->semestre' WHERE cod_carrera_materia=$this->cod_carrera_materia";
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
		$sql="DELETE FROM carrera_materia WHERE cod_carrera_materia=$this->cod_carrera_materia";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function buscar()
	{
		$sql="SELECT * FROM carrera_materia";
		return parent::ejecutar($sql);
	}

	public function consultaSemestre()
	{
		$sql="SELECT * FROM carrera,carrera_materia,materia WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia";
		return parent::ejecutar($sql);
	}
}    
?>
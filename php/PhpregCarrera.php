<?php
include_once('Conection.php');
class Carrera extends Conexion
{
	//atributos
	private $cod_carrera;
	private $sigla_carrera;
	private $nombre_carrera;

	//construtor
	public function Carrera()
	{   parent::conexion();
		$this->cod_carrera=0;
		$this->sigla_carrera="";
		$this->nombre_carrera="";	
	}
	//propiedades de acceso
	//CODIGO DE LA CARRERA
	public function setCodCarrera($valor)
	{
		$this->cod_carrera=$valor;
	}
	public function getCodCarrera()
	{
		return $this->cod_carrera;
	}
	//SIGLA DE LA CARRERA
	public function setSigla($valor)
	{
		$this->sigla_carrera=$valor;
	}
	public function getSigla()
	{
		return $this->sigla_carrera;
	}
	//NOMBRE D ELA CARRERA
	public function setNombre($valor)
	{
		$this->nombre_carrera=$valor;
	}
	public function getNombre()
	{
		return $this->nombre_carrera;
	}

	//metodos para el contructor
	public function guardar()
	{
     $sql="INSERT INTO carrera (sigla_carrera,nombre_carrera) VALUES('$this->sigla_carrera','$this->nombre_carrera')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function buscar()
	{
		$sql="SELECT * FROM carrera";
		return parent::ejecutar($sql);
	}

	public function modificar()	
	{
		$sql="UPDATE carrera SET sigla_carrera='$this->sigla_carrera', nombre_carrera='$this->nombre_carrera' WHERE cod_carrera=$this->cod_carrera";		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function eliminar()
	{
		$sql="DELETE FROM carrera WHERE cod_carrera=$this->cod_carrera";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function carreraDocente($docente)
	{
		$sql="SELECT DISTINCT cod_carrera,nombre_carrera FROM carrera,materia,carrera_materia,grupo,profesor WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia and cod_carrera_materia = cod_carrera_materia_99 and cod_profesor_99 = cod_profesor and cod_profesor = '$docente'";
		return parent::ejecutar($sql);
	}
	

}    
?>
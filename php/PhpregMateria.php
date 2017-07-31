<?php
include_once('Conection.php');
class Materia extends Conexion
{
	//atributos
	private $cod_materia;
	private $sigla_materia;
	private $nombre_materia;
	private $creditos;
	private $descripcion;

	//construtor
	public function Materia()
	{   parent::conexion();
		$this->cod_materia=0;
		$this->sigla_materia="";
		$this->nombre_materia="";
		$this->creditos="";
		$this->descripcion="";

	}
	//propiedades de acceso
	//CODIGO MATERIA
	public function setCodMateria($valor)
	{
		$this->cod_materia=$valor;
	}
	public function getCodMateria()
	{
		return $this->cod_materia;
	}	
	//SIGLA MATERIA
	public function setSigla($valor)
	{
		$this->sigla_materia=$valor;
	}
	public function getSigla()
	{
		return $this->sigla_materia;
	}
	//NOMBRE DE LA MATERIA
	public function setNombre($valor)
	{
		$this->nombre_materia=$valor;
	}
	public function getNombre()
	{
		return $this->nombre_materia;
	}
	//CREDITOS DE LA MATERIA
	public function setCreditos($valor)
	{
		$this->creditos=$valor;
	}
	public function getCreditos()
	{
		return $this->creditos;
	}
	//DESCRIPCION MATERIA
	public function setDescripcion($valor)
	{
		$this->descripcion=$valor;
	}
	public function getDescripcion()
	{
		return $this->descripcion;
	}


	//metodos para el contructor
	public function guardar()
	{
     $sql="INSERT INTO materia (sigla_materia,nombre_materia,creditos,descripcion) VALUES('$this->sigla_materia','$this->nombre_materia','$this->creditos','$this->descripcion')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function buscar()
	{
		$sql="SELECT * FROM materia";
		return parent::ejecutar($sql);
	}

	public function modificar()	
	{
	$sql="UPDATE materia SET sigla_materia='$this->sigla_materia', nombre_materia='$this->nombre_materia', creditos='$this->creditos', descripcion='$this->descripcion' WHERE cod_materia=$this->cod_materia";		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function eliminar()
	{
		$sql="DELETE FROM materia WHERE cod_materia=$this->cod_materia";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
}    
?>